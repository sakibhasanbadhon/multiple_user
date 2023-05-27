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

            // $request['token'] = $token;  // key baniye Token ke request a dhora holo 
            // $data = $request;


            Mail::to($request->email)->send(new ForgetPassword($user));

            return Back()->with('success','Please Check Your Email');
        }else {
            return back()->with('error','Password Does\'t March');
        }





    }


    public function resetPasswordForm($id)
    {

        return view('page.password-reset',['userID'=>$id]);
    }



    public function resetPasswordStore(Request $request, $userID)
    {
        // dd($request->all());
        $validation = $request->validate([
            'email'          => 'required',
            'password'       => 'required|confirmed',
            // 'password_confirmation' => 'required'

        ]);



        $user = User::where('id',$userID)->first();
        if ($user) {

            // User::where('email', $request->email)
            //           ->update(['password' => Hash::make($request->password)]);

            User::where('email',$request->email)
                    ->update(['password' => Hash::make($request->password)]);

            return back()->with('success','Password Reset Successfully');

        } else {
            return back()->with('error','Password Does\'t March');
        }




    }




}
