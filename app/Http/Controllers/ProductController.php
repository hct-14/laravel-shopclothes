<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function addCategoryProduct()
    {
        // $this->AuthLogin();
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
        return view('admin.add_category_product', ['categories' => $categories]);
    }

    public function allCategoryProduct()
    {
        // $this->AuthLogin();
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
        $products = DB::table('tbl_product')->get();
        return view('admin.all_category_product', ['categories' => $categories, 'products' => $products]);
    }
    public function allProduct_1()
    {
        $this->AuthLogin();
        $brand_product = DB::table('tblproduct')->orderBy('product_id', 'desc')->get();

        return view('admin.all_product_1', ['brand_product' => $brand_product,]);
    }
    
    public function save_category_product(Request $request)
    {
        // $this->AuthLogin(); // Giả sử đây là phương thức xác thực tùy chỉnh.
        
        $data = [
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'category_id' => $request->input('product_brand'),
            'product_quantity' => $request->input('product_quantity'),
            'product_code' => rand(1000, 9999),
            'product_status' => 0,
        ];
    
        for ($i = 1; $i <= 3; $i++) {
            $imageFieldName = 'product_img' . $i;
            $image = $request->file($imageFieldName);
    
            if ($image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/product'), $new_image);
                $data[$imageFieldName] = $new_image;
            } else {
                $data[$imageFieldName] = '';
            }
        }
    
        DB::table('tbl_product')->insert($data); // Giả sử 'tblproduct' là tên bảng đúng.
        Session::put('message', 'Thêm thành công');
        return redirect()->to('add-category-product'); // Sửa phương thức 'redirect()' thành 'redirect()->to()'.
    }
    public function active_category_product($product_id)
    {
        // $this->AuthLogin();

        DB::table('tblproduct')
            ->where('product_id', $product_id)
            ->update(['product_status' => 0]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function editCategoryProduct($ProductId)
    {
        // $this->AuthLogin();
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
        $editCategoryProduct = DB::table('tbl_product')->get();
        return view('admin.edit_category_product', ['categories' => $categories, 'editCategoryProduct' => $editCategoryProduct]);
    
    }

    public function update_category_product(Request $request, $productId)
{
    $data = [
        'product_name' => $request->input('product_name'),
        'product_price' => $request->input('product_price'),
        'category_id' => $request->input('product_brand'),
        'product_status' => $request->input('product_status', 0),
    ];

    for ($i = 1; $i <= 3; $i++) {
        $imageFieldName = 'product_img' . $i;
        $existingImage = $request->input('existing_image' . $i);
        $newImage = $request->file($imageFieldName);

        if ($newImage) {
            $get_name_image = $newImage->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads/product'), $new_image);
            $data[$imageFieldName] = $new_image;
        } else {
            // Nếu không tải lên ảnh mới, sử dụng ảnh cũ
            $data[$imageFieldName] = $existingImage;
        }
    }

    DB::table('tbl_product')->where('product_id', $productId)->update($data);
    Session::put('message', 'Cập nhật sản phẩm thành công');
    return redirect()->to('edit-category-product/' . $productId);
}


public function deleteCategoryProduct($product_id)
{
    // $this->AuthLogin();

    DB::table('tbl_product')
        ->where('product_id', $product_id)
        ->delete();
    Session::flash('message', 'Xóa sản phẩm thành công');
    return Redirect::to('all-category-product');
}

        ///end admin


        public function processData(Request $request) {
            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            
            
            $data = [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'comment_content' => $request->input('user_comment'),
            ];
            
            $image = $request->file('comment_images');
            
            if ($image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/avt'), $new_image);
                $data['comment_images'] = $new_image;
            } else {
                $data['comment_images'] = '';
            }
            
            // Thêm dữ liệu vào bảng "tblcomment"
            DB::table('tblcomment')->insert($data);
            
            return redirect()->back();
        }
        
            // Tiếp tục thực hiện xử lý khác nếu cần thiết.
        
            // return redirect()->back();
        
        
            public function detail_product($product_id, Request $request) {
                $brand_product = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
                $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();
                
                // Lấy thông tin chi tiết của sản phẩm dựa trên product_id
                $product_detail = DB::table('tblproduct')
                    ->where('product_id', $product_id)
                    ->get();
                
                $category_ids = []; // Mảng để lưu các category_id
                
                foreach ($product_detail as $detail) {
                    $category_ids[] = $detail->category_id;
                }
                
                // Lấy sản phẩm liên quan bằng cách sử dụng mảng category_ids
                $related_product = DB::table('tblproduct')
                    ->whereIn('category_id', $category_ids)
                    ->get();
                
                $product_id_to_check = $product_id;
                $checkcomment = DB::table('tblcomment')
                    ->join('tbluser', 'tblcomment.user_id', '=', 'tbluser.user_id')
                    ->join('tblproduct', 'tblcomment.product_id', '=', 'tblproduct.product_id')
                    ->where('tblcomment.product_id', $product_id_to_check)
                    ->orderBy('tblcomment.comment_id', 'desc')
                    ->select('tblcomment.*', 'tbluser.user_fullname', 'tblproduct.product_title', 'tbluser.user_avt')
                    ->get();
            
                return view('category.book_page_1', [
                    'brand_product' => $brand_product,
                    'product_detail' => $product_detail,
                    'categories' => $categories,
                    'related_product' => $related_product,
                    'checkcomment' => $checkcomment,
                ]);
            }
               
        public function checkcomment(Request $request){
            $product_id = $request->input('product_id');

            $product_id_to_check = $product_id; // Thay 1 bằng giá trị `product_id` bạn muốn kiểm tra
            $checkcomment = DB::table('tblcomment')
                ->join('tbluser', 'tblcomment.user_id', '=', 'tbluser.user_id')
                ->join('tblproduct', 'tblcomment.product_id', '=', 'tblproduct.product_id')
                ->where('tblcomment.product_id', $product_id_to_check)
                ->orderBy('tblcomment.comment_id', 'desc')
                ->select('tblcomment.*', 'tbluser.user_fullname', 'tblproduct.product_title', 'tbluser.user_avt')
                ->get();
            
        
        dd($checkcomment);
            // return view('ten-view', ['checkcomment' => $checkcomment]);
        }
        
        
     }  
