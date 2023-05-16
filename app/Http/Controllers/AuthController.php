<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function signupShowForm(){

        if (Auth::check()) {
            return redirect()->route('login');
        }
        return view('page.register');
    }

    public function signupStore(Request $request)
    {


        $request->validate([
            'role_id'     => 'nullable',
            'first_name'  => 'required|max:255',
            'last_name'   => 'required|max:255',
            'username'    => 'nullable|max:255',
            'email'       => 'required|email|max:255',
            'bio'         => 'nullable|max:255',
            'description' => 'nullable',
            'status'      =>'nullable',
            'password'    => 'required|max:30|confirmed',
        ]);

        // dd($request->all());
        $data = $request->except(['_token','password','password_confirmation']);
        $data['password']= Hash::make($request->password);

        if ($request->role_id) {
            $data['role_id']= $request->role_id;
        } else {
            $data['role_id']= 3;
        }



        User::create($data);



        return back()->with('success','Registration successfully');

        //dd($request->all());


    }


    // public function signin(){
    //     if (Auth::check() && Auth::user()->role->slug == 'admin') {
    //         return redirect('app');
    //         // return "This is Admin";
    //     }elseif(Auth::check() && Auth::user()->role->slug = 'provider') {
    //         return redirect('app');

    //     }elseif(Auth::check() && Auth::user()->role->slug = 'customer') {
    //         return redirect('app.portal');
    //     }
    //     return view('page.signin');
    // }

    public function forgotPassword(){
        return view('frontend.auth.forgot');
    }



}
