<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowProduct_controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OnlineCheckController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\SearchController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/trang chu', [HomeController::class,'index'])->name('trang-chu');



Route::get('/layout2', [HomeController::class,'layout'])->name('llayout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin');
Route::match(['get', 'post'], '/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin');
// Route::get('/logout', [AdminController::class, 'logout'])->name('admin');


// caterory
Route::get('/add-brand-product', [BrandProductController::class, 'logout'])->name('admin');

//brand-product
Route::get('/edit-brand-product/{brand_product_id}', [BrandProductController::class, 'editbrandProduct'])->name('add-brand');
Route::get('/delete-brand-product/{brand_product_id}', [BrandProductController::class, 'deletebrandProduct'])->name('add-brand');

Route::get('/add-brand-product', [BrandProductController::class, 'add_Brand_Product'])->name('add-brand');
Route::get('/all-brand-product', [BrandProductController::class, 'allbrandProduct'])->name('all-brand');
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProductController::class, 'unactive_brand_product'])->name('unactive-brand-product');
Route::get('/active-brand-product/{brand_product_id}', [BrandProductController::class, 'active_brand_product'])->name('active');
 
Route::match(['get', 'post'], '/save-brand-product', [BrandProductController::class, 'save_brand_product'])->name('save_brand');
Route::match(['get', 'post'], '/update-brand-product/{brand_product_id}', [BrandProductController::class, 'update_brand_product'])->name('save_brand');
// product
Route::get('/add-category-product', [ProductController::class, 'addCategoryProduct'])->name('add-brand');

Route::match(['get', 'post'], '/save-category-product', [ProductController::class, 'save_category_product'])->name('save_brand');
Route::get('/all-category-product', [ProductController::class, 'allCategoryProduct'])->name('add-brand');
Route::get('/edit-category-product/{category_product_id}', [ProductController::class, 'editCategoryProduct'])->name('add-category');
Route::match(['get', 'post'], '//update-category-product/{category_product_id}', [ProductController::class, 'update_category_product'])->name('save_brand');
Route::get('/delete-category-product/{category_product_id}', [ProductController::class, 'deleteCategoryProduct'])->name('add-category');


// show
Route::get('/show-product', [ShowProduct_controller::class, 'index'])->name('all-brand');
Route::get('/chi-tiet-sp/{product_id}', [ShowProduct_controller::class, 'chitiet'])->name('all-brand');
Route::get('/danh-muc-san-pham/{category_id}', [ShowProduct_controller::class, 'show_category_home'])->name('all-brand');


//cart
Route::get('/show-cart1', [CartController::class, 'xemgiohang'])->name('cart');
Route::get('/delete-cart/{id}', [CartController::class, 'xoasanpham'])->name('dalete-cart');

Route::match(['get', 'post'],'/show-cart', [CartController::class, 'giohang'])->name('show-cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart1', [CartController::class, 'xemgiohang'])->name('cart');


///user


Route::get('/user-login', [UserController::class, 'showLoginForm'])->name('admin');
Route::get('/user-logout', [UserController::class, 'userlogout'])->name('admin');

Route::match(['get', 'post'],'/user-login', [UserController::class, 'Login'])->name('login');
Route::match(['get', 'post'], '/user-res', [UserController::class, 'register'])->name('res');
// Route::get('/user-login', [UserController::class, 'index'])->name('admin');
Route::get('/user-res', [UserController::class, 'index1'])->name('admin');


///payment
Route::match(['get', 'post'], '/payment', [PaymentController::class, 'CheckOut'])->name('res');
Route::match(['get', 'post'], '/save-checkout', [PaymentController::class, 'Save_Checkout'])->name('res');
Route::get('/order-finall', [PaymentController::class, 'ThongTin'])->name('ASDFGNB');



Route::match(['get', 'post'], '/kiem-tra-hang/{userId}', [OrderController::class, 'CheckHang'])->name('check');
Route::match(['get', 'post'], '/test', [OrderController::class, 'test'])->name('IndexSearch');
Route::get('/check-order', [OrderController::class, 'OderCheck'])->name('admin');

    Route::get('/unactive/{order_id}', [OrderController::class, 'unactive'])->name('un');
    Route::get('/active/{order_id}', [OrderController::class, 'active'])->name('ac');


    Route::match(['get', 'post'], '/kiem-tra-hang', [OrderController::class, 'CheckHang'])->name('IndexSearch');

    Route::match(['get', 'post'], '/sua-thong-tin', [OrderController::class, 'SuaThongTin'])->name('SuaThongTin');

    Route::get('/Xoa-order/{order}', [OrderController::class, 'deleteOrder'])->name('un');
    // Route::delete('/orders/{order}','OrderController@delete')->name('deleteOrder');


    
    Route::get('/unactive1/{product_id}', [OrderController::class, 'unactive1'])->name('un');
    Route::get('/active1/{product_id}', [OrderController::class, 'active1'])->name('ac');


    // $Route['online-checkout']['POST'] = 'OnlineCheckController/execPostRequest';
    // Route::get('/checkout-onl', [OnlineCheckController::class, 'execPostRequest'])->name('ac');

    Route::match(['get', 'post'], '/online-checkout', [OnlineCheckController::class, 'execPostRequest'])->name('IndexSearch');



    ///gg
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::match(['get', 'post'], '/search', [SearchController::class, 'IndexSearch'])->name('IndexSearch');
    Route::get('/search', [SearchController::class, 'IndexSearch'])->name('un');

    Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
        $categories = DB::table('tblcategory')->orderBy('category_id', 'desc')->get();

        return view('pages.home', ['categories' => $categories]);
    })->name('/');
      
    Route::controller(LoginWithGoogleController::class)->group(function(){
        Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
        Route::get('authorized/google/callback', 'handleGoogleCallback');
    });