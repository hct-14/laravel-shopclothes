<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    { 
        if ($request->isMethod("POST")) {
        $credentials = $request->validate([
            'user_gmail' => 'required|string',
            'user_password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/trang-chu'); // Điều hướng sau khi đăng nhập thành công
        } else {
            Session::flash('message', 'Vui lòng nhập thông tin đúng');
            return redirect()->back()->withInput();
        }
    }


    
    return view('user.login');
}


}

