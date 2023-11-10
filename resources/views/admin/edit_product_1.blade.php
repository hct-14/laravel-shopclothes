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
                <div class="position-center">
                    <form role="form" action="{{ url('update-product-1/'.$editProduct_1->product_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_title">Tên Sản Phẩm</label>
                            <input type="text" value="{{ $editProduct_1->product_title }}" name="product_title" class="form-control" id="product_title" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="product_price">Giá</label>
                            <input type="text" value="{{ $editProduct_1->product_price }}" name="product_price" class="form-control" id="product_price">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Hình Ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="product_image">
                            <img src="{{ asset('uploads/product/' . $editProduct_1->product_image) }}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Noi Dung</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_description" id="product_description" placeholder="Mô tả nội dung sản phẩm">{{ $editProduct_1->product_description }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="category_name">Thể loại</label>
                            <input type="text" class="form-control" value="{{ $editProduct_1->category_name }}" name="category_name" id="category_name">
                        </div>
                        <div class="form-group">
                            <label for="product_author">Nhà Xuất Bản</label>
                            <input type="text" class="form-control" value="{{ $editProduct_1->product_author }}" name="product_author" id="product_1_theloai">
                        </div>
                        {{-- <div class="form-group">
                            <label for="product_1_status">Hiện Thị</label>
                            <select name="product_1_status" class="form-control input-sm m-bot15">
                                <option value="0" @if ($editProduct_1->product_1_status == 0) selected @endif>Ẩn</option>
                                <option value="1" @if ($editProduct_1->product_1_status == 1) selected @endif>Hiện Thị</option>
                            </select>
                        </div> --}}
                        <button type="submit" name="add_product" class="btn btn-info">Cập Nhập</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
