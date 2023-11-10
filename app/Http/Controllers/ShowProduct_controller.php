<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowProduct_controller extends Controller
{
    public function index(){
        $products = DB::table("tbl_product")->get();
        return view('pages.show_product', [ 'products' => $products]);

    }
    public function chitiet($product_id, Request $request)
    {
            $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
            
            // Lấy thông tin chi tiết của sản phẩm dựa trên product_id
            $products = DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->get();
            
            $category_ids = []; // Mảng để lưu các category_id
            
            foreach ($products as $detail) {
                $category_ids[] = $detail->category_id;
            }
            
            // Lấy sản phẩm liên quan bằng cách sử dụng mảng category_ids
            $related_product = DB::table('tbl_product')
                ->whereIn('category_id', $category_ids)
                ->get();
            
                
        return view('pages.chi_tiet_sp', ['products' => $products, 'categories' =>$categories,'related_product' =>$related_product]);
    }
    public function layout()
    {       
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();

        // Lấy tất cả sản phẩm của danh mục cụ thể
        $products = DB::table('tbl_product')
            // ->where('category_id', $product_id)
            ->get();
        return view('pages.home', ['categories' => $categories, 'products' => $products]);
    }


    public function show_category_home($product_id) {
        // Lấy danh sách các danh mục sản phẩm
        $brand_product = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
    
        // Lấy tất cả sản phẩm của danh mục cụ thể
        $all_category_product = DB::table('tbl_product')
            ->where('category_id', $product_id)
            ->get();
    
        return view('pages.danh_muc_sp  ', [
            'brand_product' => $brand_product,
            'all_category_product' => $all_category_product
        ]);
    } 

    public function show_category_chitiet($product_id) {
        // Lấy danh sách các danh mục sản phẩm
        $brand_product = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
    
        // Lấy tất cả sản phẩm của danh mục cụ thể
        $all_category_product = DB::table('tbl_product')
            ->where('category_id', $product_id)
            ->get();
    
        return view('pages.chi_tiet_sp  ', [
            'brand_product' => $brand_product,
            'all_category_product' => $all_category_product
        ]);
    } 

}
