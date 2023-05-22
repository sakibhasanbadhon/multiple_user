<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordForgetController extends Controller
{
    public function index()
    {
        return view('page.forget-password');
    }


    public function passwordSend(Request $request)
    {

        $mail_check= User::where('email','=',$request->email)->first();
        if ($mail_check) {
            $forget_mail = $request->all();
            Mail::to($request->email)->send(new ForgetPassword($forget_mail));

            return back()->with('success','Registration successfully');
        }else {
            return back()->with('error','You Have No Account on this Email');
        }

    }

}
