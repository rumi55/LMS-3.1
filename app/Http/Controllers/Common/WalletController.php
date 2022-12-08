<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CardRequest;
use App\Models\Transaction;
use App\Models\User_card;
use App\Models\User_paypal;
use App\Models\Withdraw;
use App\Traits\General;
use App\Traits\SendNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class WalletController extends Controller
{
    use General, SendNotification;
    public function index()
    {
        if (Auth::user()->is_affiliator == AFFILIATOR || (Auth::user()->role == USER_ROLE_INSTRUCTOR && @Auth::user()->instructor->status == 1) || (Auth::user()->role == USER_ROLE_ORGANIZATION && @Auth::user()->organization->status == 1))
        {
            $data['pageTitle'] = 'Wallet';
            $data['myBalance'] = int_to_decimal(Auth::user()->balance);
            return view('frontend.wallet.my-wallet', $data);
        }
        $this->showToastrMessage('warning', __('You are not an affiliator'));
        return redirect()->back();
    }
    public function transactionHistory(Request $request)
    {
        if($request->ajax()) {
            $aff = Transaction::where(['user_id' => Auth::id()]);
            return datatables($aff)
                ->addColumn('type', function ($item) {
                    return transactionTypeText($item->type);
                })->addColumn('amount', function ($item) {
                    if(get_currency_placement() == 'after') {
                        return $item->amount . ' ' . get_currency_symbol();
                    } else {
                        return get_currency_symbol() . ' ' . $item->amount;
                    }

                })->addColumn('date', function ($item) {
                    return $item->created_at->format('Y-m-d H:i:s');
                })->make(true);
        }
    }
    public function WithdrawalHistory(Request $request)
    {
        if($request->ajax()) {
            $aff = Withdraw::where(['user_id'=>Auth::id()]);
            return datatables($aff)
                ->addColumn('amount', function ($item) {
                    if(get_currency_placement() == 'after') {
                        return $item->amount . ' ' . get_currency_symbol();
                    } else {
                        return get_currency_symbol() . ' ' . $item->amount;
                    }

                })
                ->addColumn('status', function ($item) {
                    if($item->status == WITHDRAWAL_STATUS_PENDING){
                        return '<span class="text-info">'. statusWithdrawalStatus($item->status).'</span>';
                    }elseif ($item->status == WITHDRAWAL_STATUS_REJECTED){
                        return '<span class="text-danger">'. statusWithdrawalStatus($item->status).'</span>';
                    }else{
                        return '<span class="color-green">'. statusWithdrawalStatus($item->status).'</span><a href="'.route('wallet.download-receipt', [$item->uuid]).'"><span class="iconify" data-icon="bxs:file-pdf"></span></a>';
                    }
                })
                ->addColumn('date', function ($item) {
                    return $item->created_at->format('Y-m-d H:i:s');
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }

    public function withdrawProcess(Request $request)
    {
        if ($request->amount > int_to_decimal(Auth::user()->balance))
        {
            $this->showToastrMessage('warning', __('Insufficient balance'));
            return redirect()->back();
        } else {
            DB::beginTransaction();
            try {
                $withdrow = new Withdraw();
                $withdrow->transection_id = Str::uuid()->getHex();
                $withdrow->amount = $request->amount;
                $withdrow->payment_method = $request->payment_method;
                $withdrow->save();
                Auth::user()->decrement('balance', decimal_to_int($request->amount));
                createTransaction(Auth::id(),$request->amount,TRANSACTION_WITHDRAWAL,'Withdrawal via '.$request->payment_method);

                $text = __("New Withdraw Request Received");
                $target_url = route('payout.new-withdraw');
                $this->send($text, 1, $target_url, null);

                $this->showToastrMessage('warming', __('Withdraw request has been saved'));
                DB::commit();
                return redirect()->back();
            }catch (\Exception $e){
                DB::rollBack();
                $this->showToastrMessage('warning', __('Something Went Wrong'));
                return redirect()->back();
            }
        }

    }

    public function myCard()
    {
        $data['title'] = 'My Card';
        $data['navPaymentActiveClass'] = 'active';
        return view('frontend.wallet.my-card', $data);
    }

    public function saveMyCard(CardRequest $request)
    {
        User_card::updateOrCreate([
            'user_id' => Auth::id()
        ],[
            'user_id' => Auth::id(),
            'card_number' => $request->card_number,
            'card_holder_name' => $request->card_holder_name,
            'month' => $request->month,
            'year' => $request->year,
        ]);

        $this->showToastrMessage('success', __('Update Successfully'));
        return redirect()->back();
    }

    public function savePaypal(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        User_paypal::updateOrCreate([
            'user_id' => Auth::id()
        ],[
            'user_id' => Auth::id(),
            'email' => $request->email
        ]);

        $this->showToastrMessage('success', __('Update Successfully'));
        return redirect()->back();
    }

    public function downloadReceipt($uuid)
    {
        $withdraw = Withdraw::whereUuid($uuid)->first();
        $invoice_name = 'receipt-' . $withdraw->transection_id. '.pdf';
        // make sure email invoice is checked.
        $customPaper = array(0, 0, 612, 792);
        $pdf = PDF::loadView('instructor.finance.receipt-pdf', ['withdraw' => $withdraw])->setPaper($customPaper, 'portrait');
        $pdf->save(public_path() . '/uploads/receipt/' . $invoice_name);
        // return $pdf->stream($invoice_name);
        return $pdf->download($invoice_name);
    }
}
