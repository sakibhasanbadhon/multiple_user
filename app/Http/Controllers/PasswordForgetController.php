<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\BackupGlobals;

class PasswordForgetController extends Controller
{
    public function forgetPasswordForm()
    {
        return view('page.forget-password');
    }


    public function forgetPasswordStore(Request $request)
    {
        // dd($request->email);
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);

        $user = User::where('email',$request->email)->first();

        if($user){
            // $token = Str::random(64);
            // $data = DB::table('password_resets')->insert([
            //     'email'=>$request->email,
            //     'token'=>$token,
            //     'created_at'=>Carbon::now()
            // ]);

            // $request['token'] = $token;
            // $data = $request;


            Mail::to($request->email)->send(new ForgetPassword($user));

            return Back()->with('success','Please Check Your Email');
        }else {
            return Back()->with('error','Your Mail Does\'t match');
        }





    }


    public function resetPasswordForm($id)
    {
        return view('page.password-reset');
    }



    public function resetStore(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'old_password'          => 'required',
            'new_password'          => 'required',
            'password_confirmation' => 'required'
        ]);


        $old_password = User::where(Hash::check('password'),$request->old_password);

        if ($old_password) {
            return "password Match";
        }else {
            return 'password mot match';
        }



    }



    public function resetPasswordStore()
    {



    }

}
