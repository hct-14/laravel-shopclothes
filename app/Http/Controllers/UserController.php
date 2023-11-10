<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlogout(Request $request)
    {
        // Đảm bảo rằng người dùng đã đăng nhập trước khi đăng xuất.
        if (Auth::check()) {
            Auth::logout(); // Đăng xuất người dùng
            Session::flush(); // Xóa tất cả dữ liệu phiên
        }

        // Chuyển hướng đến trang đăng nhập hoặc trang chính (tùy thuộc vào logic của bạn).
        return Redirect::to('/user-login'); // Thay '/login' bằng đường dẫn mà bạn muốn người dùng được chuyển hướng sau khi đăng xuất.
    }
    
    public function Login(Request $request)
    {
        if ($request->isMethod("POST")) {
            $user_loginname = $request->input('user_loginname');
            $user_password = $request->input('user_password');
        
            $result = DB::table('tbl_user')
                ->where('user_loginname', $user_loginname)
                ->where('user_password', md5($user_password))
                ->first();
            
            if ($result) {
                
                // Set the 'UserId' and 'fullName' session variables
                session(['UserId' => $result->user_id,
                 'fullName' => $result->user_fullname,
                 'address' => $result->user_address,
                 'phone' => $result->user_phone,
                 'email' => $result->user_gmail,
                ]);
                // dd($result);
                return redirect('/trang chu');
            } else {
                Session::flash('message', 'Vui lòng nhập thông tin đúng');
                return Redirect::to('/user-login');
            }
        }
        return view('user.login');
    }
    


    // public function index()
    // {
    //     return view('user.login_1');
    // }

    
    public function logout(Request $request)
    {
        // Đảm bảo rằng hàm AuthLogin() đã được định nghĩa ở đây nếu cần thiết.
        // $this->AuthLogin();

        Session::put('user_fullname', null);
        Session::put('user_id', null);
        return Redirect::to('/user');
    }
 
    public function Register(Request $request)
    {
        $user_password = md5($request->input('user_password'));
    
        $data = [
            // 'user_loginname' => $request->input('user_loginname'),
            'user_fullname' => $request->input('user_fullname'),
            'user_gmail' => $request->input('user_gmail'),
            'user_loginname' => $request->input('user_loginname'),

            'user_password' => $user_password,
            'user_phone' => $request->input('user_phone'),
            'user_address' => $request->input('user_address'),
        ];
    
    
        $userlogin_id = DB::table('tbl_user')->insertGetId($data);
    
        Session::put('message', 'Đăng Ký thành công');
        Session::put('user_id', $userlogin_id);
        Session::put('user_fullname', $request->input('user_fullname'));

    
        return Redirect::to('/user-login');  
      }

    
    public function index1()
    {   
        // $this->AuthLogin();
        $user_by = DB::table('tblproduct')->orderBy('product_id', 'desc')->get();

        // return view('user.Login', ['user_by' => $user_by,]);
        return view('user.login');

    }
    
    
}
