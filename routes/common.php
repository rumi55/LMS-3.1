<?php

use App\Http\Controllers\Common\AffiliateController;
use App\Http\Controllers\Common\FollowController;
use App\Http\Controllers\Common\WalletController;
use App\Http\Controllers\Instructor\SaasController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['as' => 'affiliate.','prefix'=>'affiliate'], function () {

    Route::get('become-an-affiliate', [AffiliateController::class, 'becomeAffiliate'])->name('become-an-affiliate');
    Route::post('create-affiliate-request', [AffiliateController::class, 'becomeAffiliateApply'])->name('create-affiliate-request');
    Route::group(['middleware' => ['affiliate']], function () {
        Route::get('dashboard', [AffiliateController::class, 'dashboard'])->name('dashboard');
    });
    Route::get('my-affiliate-list',[AffiliateController::class, 'myAffiliations'])->name('my-affiliate-list');


//    Route::get('request-list', [AffiliateController::class, 'requestList'])->name('request-list');
//    Route::post('become-affiliate-apply', [AffiliateController::class, 'becomeAffiliateApply'])->name('become-affiliate.apply');


//    Route::get('your-application', function(){
//        return view('frontend.affiliator.your-application');
//    });
//
//    Route::get('affiliate-add-payment-method', function(){
//        return view('frontend.affiliator.affiliate-add-payment-method');
//    });
// Suraiya Static for Affiliate Pages End
});

Route::group(['middleware' => ['common']],function(){
    Route::get('follow', [FollowController::class,'follow'])->name('follow');
    Route::get('unfollow', [FollowController::class,'unfollow'])->name('unfollow');
    Route::get('saas-list', [SaasController::class, 'saasList'])->name('saas_panel');
    Route::get('saas-plan', [SaasController::class, 'saasPlan'])->name('saas_plan');
    Route::get('saas-plan-details/{id}', [SaasController::class, 'saasPlanDetails'])->name('saas_plan_details');
});

Route::group(['as' => 'wallet.','prefix'=>'wallet','middleware' => ['common']], function () {
    Route::get('/', [WalletController::class, 'index'])->name('/');
    Route::get('transaction-history', [WalletController::class, 'transactionHistory'])->name('transaction-history');
    Route::get('withdrawal-history', [WalletController::class, 'WithdrawalHistory'])->name('withdrawal-history');
    Route::post('process-withdraw', [WalletController::class, 'withdrawProcess'])->name('process-withdraw')->middleware('isDemo');
    Route::get('my-card', [WalletController::class, 'myCard'])->name('my-card');
    Route::post('save-my-card', [WalletController::class, 'saveMyCard'])->name('save.my-card')->middleware('isDemo');
    Route::post('save-paypal', [WalletController::class, 'savePaypal'])->name('save.paypal')->middleware('isDemo');
    Route::get('download-receipt/{uuid}', [WalletController::class, 'downloadReceipt'])->name('download-receipt')->middleware('isDemo');

});






