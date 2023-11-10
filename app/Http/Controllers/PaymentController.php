<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{
    public function CheckOut(){
        $User = DB::table('tbl_user')->orderBy('user_id', 'desc')->get();

        $brand_product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
        $userId = DB::table('tbl_user')->orderBy('user_id', 'desc')->get();
        $cart = session()->get('cart', []); // Lấy dữ liệu giỏ hàng từ session

        return view('user.payment', compact('brand_product', 'categories', 'userId', 'cart', 'User'));
    }

    public function Save_Checkout(Request $request) {
        // $this->AuthLogin();
        $UserId = $request->input('UserId');

        // Lấy product_id từ giỏ hàng
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
    
        
        // Tạo một mảng dữ liệu từ biểu mẫu
        $data = [
            'user_id' => $UserId,
            'product_id' => implode(',', $productIds), 
            'order_name' => $request->input('kh_ten'),
            'oder_address' => $request->input('kh_diachi'),
            'order_total' => $request->input('oder_value'),
            'order_gmail' => $request->input('kh_email'),
            'order_note' => $request->input('kh_cmnd'),
            'order_phone' => $request->input('kh_dienthoai'),
            'order_payment' => $request->input('httt_ma'),
            'order_status' => 0,
        ];
    
        $shipping = DB::table('tblorder')->insert($data);
        
    
        // Lưu ID đơn hàng trong phiên
        Session::put('shipping', $shipping);
        $cart = session()->get('cart', []);
        if (!empty($cart)) {
            foreach ($cart as $productId => $item) {
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
        }
        // Chuyển hướng người dùng đến trang kiểm tra
        // return redirect('/');

        return redirect('/order-finall');
    }
    public function ThongTin(Request $request) {
        $UserId = $request->session()->get('UserId'); // Assuming 'UserId' is stored in the session
    
        $brand_product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
    
        $checkthongtin = DB::table('tblorder')
        ->join('tbl_user', 'tblorder.user_id', '=', 'tbl_user.user_id')
        ->join('tbl_product', 'tblorder.product_id', '=', 'tbl_product.product_id')
        ->where('tblorder.user_id', $UserId)
        ->orderBy('tblorder.order_id', 'desc')
        ->select('tblorder.*', 'tbl_user.user_fullname', 'tbl_product.product_name')
        ->get();

         
    $groupedProducts = [];

    foreach ($checkthongtin as $order) {
        $productId = $order->product_id;

        // Check if the product_id is already in the grouped array
        if (isset($groupedProducts[$productId])) {
            $groupedProducts[$productId]['product_name'][] = $order->product_name;
        } else {
            $groupedProducts[$productId] = [
                'product_titles' => [$order->product_name],
                // Add other order-related fields here if needed
            ];
        }
    }

    // dd($checkthongtin);
        return view('user.order_finall', compact('brand_product', 'categories', 'checkthongtin'));
    }

    
}
