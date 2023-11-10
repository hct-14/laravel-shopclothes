@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Cập nhập Thương Hiệu Sản Phẩm
                </header>

                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<p style="color: red;">' . $message . '</p>';
                            Session::put('message', null);
                        }
                        ?>     
                 <div class="panel-body"> 
                    @foreach($editbrandProduct as $key => $edit_value)  
                    <div class="position-center">
                        <form role="form" action="{{ url('update-brand-product/'.$edit_value->category_id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_desc"> Thể loại</label>
                                <input type="text" class="form-control" name="category_desc" id="category_desc" placeholder="Mô Tả Danh Mục"></textarea>
                            </div>

                        <button type="submit" name ="add_brand_product" class="btn btn-info">Cập nhập</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
    {{-- <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Horizontal Forms
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-danger">Sign in</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>

    </div>
</div> --}}
<div class="row">
    @endsection