<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role->slug == 'admin' || Auth::check() && Auth::user()->role->slug == 'provider') {
            return view('page.dashboard');
        }else {
            return redirect()->route('login');
        }

    }


    public function provider()
    {
        $provider = User::where('role_id',2)->get();

        // dd($provider)->toArray();
        return view('page.provider',['provider'=>$provider]);
    }


    public function status(Request $request)
    {
        if($request->ajax()){

            $status = User::find($request->row_id);
            $status->update([
                'status' => $request->status_id,
            ]);
            $output =['status'=>'success','message'=>'Brand status update successfully'];
            return response()->json($output);
        }
    }
}
