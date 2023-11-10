@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Thương Danh Mục Sản Phẩm
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
                        <form role="form" action="{{ url('save-brand-product') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="category_desc"> Thể loại</label>
                            <input type="text" class="form-control" name="category_desc" id="category_desc" placeholder="Mô Tả Danh Mục"></textarea>
                        </div>
                        <button type="submit" name ="add_brand_product" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
 
<div class="row">
    @endsection