@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Danh Mục Sản Phẩm
            </header>
            <div class="panel-body">
                {{-- @if($message)
                    <p style="color: red;">{{ $message }}</p>
                @endif --}}

                <div class="position-center">
                    <form role="form" action="{{ url('save-category-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm">
                        </div>
                        

                        <div class="form-group">
                            <label for="product_price">Giá</label>
                            <input type="text" name="product_price" class="form-control" id="product_price">
                        </div>
                        <div class="form-group">
                            <label for="product_img1">Hình Ảnh 1</label>
                            <input type="file" name="product_img1" class="form-control" id="product_img1">
                        </div>
                        <div class="form-group">
                            <label for="product_img2">Hình Ảnh 2</label>
                            <input type="file" name="product_img2" class="form-control" id="product_img2">
                        </div>                       
                         <div class="form-group">
                            <label for="product_img3">Hình Ảnh 3</label>
                            <input type="file" name="product_img3" class="form-control" id="product_img3">
                        </div>
                        
                        <div class="form-group">
                            <label  for="product_description">Nội Dung</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_description" id="product_description" placeholder="Nhập nội dung"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="product_brand">Thương Hiệu </label>
                            <select name="product_brand" id="product_brand"class="form-control input-sm m-bot15">
                                @foreach ($categories as $cate_pro)
                                    <option value="{{ $cate_pro->category_id }}">{{ $cate_pro->category_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="product_author">Nhà Xuất Bản</label>
                            <input type="text" class="form-control" name="product_author" id="product_author">
                        </div> --}}
                        
                        <div class="form-group">
                            <label for="product_quantity">Số Lượng</label>
                            <input type="text" class="form-control" name="product_quantity" id="product_quantity">
                        </div>
                        

                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection