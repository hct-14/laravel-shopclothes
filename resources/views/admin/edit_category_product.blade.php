@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập Nhập Sản Phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<p style="color: red;">' . $message . '</p>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    @foreach($editCategoryProduct as $key => $edit_value)  

    
                    <div class="position-center">
                        <form role="form" action="{{ url('update-category-product/'.$edit_value->product_id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Tên Sản Phẩm</label>
                                <input type="text" value="{{$edit_value->product_name}}"  name="product_name" class="form-control" id="product_name" placeholder="Enter product name">
                            </div>
    
                            <div class="form-group">
                                <label for="product_price">Giá</label>
                                <input type="text"  value="{{$edit_value->product_price}}" name="product_price" class="form-control" id="product_price">
                            </div>
                            <div class="form-group">
                                <label for="product_img1">Hình Ảnh 1</label>
                                <input type="file" name="product_img1" class="form-control" id="product_img1">
                                @if ($edit_value->product_img1)
                                    <img src="{{ asset('uploads/product/' . $edit_value->product_img1) }}" width="100">
                                    <input type="hidden" name="existing_image1" value="{{ $edit_value->product_img1 }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_img2">Hình Ảnh 2</label>
                                <input type="file" name="product_img2" class="form-control" id="product_img2">
                                @if ($edit_value->product_img2)
                                    <img src="{{ asset('uploads/product/' . $edit_value->product_img2) }}" width="100">
                                    <input type="hidden" name="existing_image2" value="{{ $edit_value->product_img2 }}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_img3">Hình Ảnh 3</label>
                                <input type="file" name="product_img3" class="form-control" id="product_img3">
                                @if ($edit_value->product_img3)
                                    <img src="{{ asset('uploads/product/' . $edit_value->product_img3) }}" width="100">
                                    <input type="hidden" name="existing_image3" value="{{ $edit_value->product_img3 }}">
                                @endif
                            </div>
                            
    
{{-- 
                            <div class="form-group">
                                <label for="product_description">Nội Dung</label>
                                <textarea style="resize: none;" rows="5" class="form-control" name="product_description" id="product_description" placeholder="Nhập nội dung">{{$edit_value->product_description}}</textarea>
                            </div> --}}
                            <div class="form-group">
                                <label for="product_brand">Thể Loại</label>
                                <select name="product_brand" id="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($categories as $cate_pro)
                                        <option value="{{ $cate_pro->category_id }}" 
                                            @if ($cate_pro->category_id == $edit_value->category_id) selected 
                                            @endif>{{ $cate_pro->category_desc }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
    
                            
    
                            <div class="form-group">
                                <label for="product_status">Hiện Thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện Thị</option>
                                </select>
                            </div>
    
      
                        <button type="submit" name ="add_product" class="btn btn-info">Cập Nhập</button>
                    </form>
                    </div>
                    @endforeach

                </div>
            </section>

    </div>

    </div>
</div>
<div class="row">
    @endsection