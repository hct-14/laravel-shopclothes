<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineCheckController extends Controller
{


    public function execPostRequest()
    {
        $selectedPayment = null;
    
        if (isset($_POST['COD'])) {
            $selectedPayment = 'COD';
        } elseif (isset($_POST['MOMO'])) {
            $selectedPayment = 'MOMO';
        } elseif (isset($_POST['VNpay'])) {
            $selectedPayment = 'VNpay';
        }
    
        // Đặt giá trị thanh toán tương ứng vào biến $paymentValue dựa vào $selectedPayment
        $paymentValue = '';
        if ($selectedPayment === 'COD') {
            $paymentValue = 'Giá trị thanh toán khi chọn COD';
        } elseif ($selectedPayment === 'MOMO') {
            $paymentValue = 'Giá trị thanh toán khi chọn MOMO';
        } elseif ($selectedPayment === 'VNpay') {
            $paymentValue = 'Giá trị thanh toán khi chọn VNpay';
        }
        else{
            echo'khong co dau em';
        }

        dd($paymentValue);
    }
    

    

}
