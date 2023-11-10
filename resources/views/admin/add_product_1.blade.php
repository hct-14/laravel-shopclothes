@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Sản Phẩm 111111
                </header>
                <div class="panel-body">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<p style="color: red;">' . $message . '</p>';
                            Session::put('message', null);
                        }
                        ?>
                    
                    <div class="position-center">
                        <form role="form" action="{{ url('save-product-1') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_1_name">Tên Sản Phẩm</label>
                                <input type="text" name="product_1_name" class="form-control" id="product_1_name" placeholder="Enter product name">
                            </div>
    
                            <div class="form-group">
                                <label for="product_1_price">Giá</label>
                                <input type="text" name="product_1_price" class="form-control" id="product_1_price">
                            </div>
    
                            <div class="form-group">    
                                <label for="product_1_image">Hình Ảnh</label>
                                <input type="file" name="product_1_image" class="form-control" id="product_1_image">
                            </div>
    
                            <div class="form-group">
                                <label for="product_1_desc">Mô Tả Sản Phẩm</label>
                                <textarea style="resize: none;" rows="5" class="form-control" name="product_1_desc" id="product_1_desc" placeholder="Mô tả nội dung sản phẩm"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="product_1_content">Nội Dung</label>
                                <textarea style="resize: none;" rows="5" class="form-control" name="product_1_content" id="product_1_content" placeholder="Nhập nội dung"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="product_1_theloai">Thể loại</label>
                                <input type="text" class="form-control" name="product_1_theloai" id="product_1_theloai">
    
                            </div>
    
                            <div class="form-group">
                                <label for="product_1_tacgia">Nhà Xuất Bản</label>

                                <input type="text" class="form-control" name="product_1_tacgia" id="product_1_theloai">

                            </div>
    
                            <div class="form-group">
                                <label for="product_1_status">Hiện Thị</label>
                                <select name="product_1_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện Thị</option>
                                </select>
                            </div>
    
      
                        <button type="submit" name ="saveProduct_1" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>

    </div>
</div>
<div class="row">
    @endsection