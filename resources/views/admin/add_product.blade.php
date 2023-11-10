@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Sản Phẩm
            </header>
            <div class="panel-body">
                {{-- Display any success or error message --}}
                @if ($message = Session::get('message'))
                    <p style="color: red;">{{ $message }}</p>
                    {{ Session::put('message', null) }}
                @endif

                <div class="position-center">
                    <form role="form" action="{{ url('save-product') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product name">
                        </div>

                        <div class="form-group">
                            <label for="product_price">Giá</label>
                            <input type="text" name="product_price" class="form-control" id="product_price">
                        </div>

                        <div class="form-group">
                            <label for="product_image">Hình Ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="product_image">
                        </div>

                        <div class="form-group">
                            <label for="product_desc">Mô Tả Sản Phẩm</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="product_desc" placeholder="Mô tả nội dung sản phẩm"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_content">Nội Dung</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="product_content" placeholder="Nhập nội dung"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_theloai">Thể loại</label>
                            <input type="text" class="form-control" name="product_theloai" id="product_theloai">

                        </div>

                        <div class="form-group">
                            <label for="product_publisher">Nhà Xuất Bản</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                <option value="Kim đồng">Kim đồng</option>
                                <option value="HoangThanh">HoangThanh</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_status">Hiện Thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện Thị</option>
                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
