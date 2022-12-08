<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VersionUpdateController extends Controller
{
    public function versionUpdate(Request $request)
    {
        $data['title'] = 'Version Update';

        return view('zainiklab.installer.version-update', $data);
    }

    public function processUpdate(Request $request)
    {
        $request->validate([
            'purchase_code' => 'required',
            'email' => 'bail|required|email'
        ],[
            'purchase_code.required' => 'Purchase code field is required',
            'email.required' => 'Customer email field is required',
            'email.email' => 'Customer email field is must a valid email'
        ]);

        $response = Http::acceptJson()->post('https://support.zainikthemes.com/api/745fca97c52e41daa70a99407edf44dd/active', [
            'app' => config('app.app_code'),
            'type' => 1,
            'email' => $request->email,
            'purchase_code' => $request->purchase_code,
            'version' => config('app.build_version')
        ]);

        if($response->successful()){
            $data = $response->object();
            if($data->status === 'success'){
                Artisan::call('migrate', [
                    '--force' => true
                ]);

                $data = json_decode($data->data->data);
                Log::info($data);
                foreach($data as $d){
                    if(!Artisan::call($d)){
                        break;
                    }
                }
            }else{
                return Redirect::back()->withErrors(['purchase_code' => $data->message]);
            }
        }
        else{
            return Redirect::back()->withErrors(['purchase_code' => 'Something went wrong with your purchase key.']);
        }

        return redirect()->route('main.index');
    }

}
