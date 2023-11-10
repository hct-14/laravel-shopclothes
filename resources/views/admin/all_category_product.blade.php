@extends('admin_layout')
@section('admin_content')
<style>
  .soanngu{
    width: 100%;
    display:flex;
    justify-content: flex-end;
    margin-right: 30px; 
    }
  </style>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">

        <div class="soanngu">
          <button>
            <a href="{{asset('/add-category-product')}}">
            <span type="submit">
              theem sp
            </span>
          </a>
          </button>

        </div>


        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<p style="color: red;">' . $message . '</p>';
            Session::put('message', null);
        }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên Sản Phẩm</th>
              <th>Giá</th>
              <th>Hình Ảnh1</th>
              <th>Hình Ảnh2</th>
              <th>Hình Ảnh3</th>

              <th>Giá</th>
              {{-- <th>Thể Loại</th> --}}
              <th>Số lượng</th>

              <th>Hiện Thị</th>
              <th>Sửa, Xóa</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $cate_pro->product_name }}</td>
              <td>{{ $cate_pro->product_price }}</td>
              <td><img src="{{ asset('/uploads/product/'. $cate_pro->product_img1) }}" width="100"></td>
              <td><img src="{{ asset('/uploads/product/'. $cate_pro->product_img2) }}" width="100"></td>
              <td><img src="{{ asset('/uploads/product/'. $cate_pro->product_img3) }}" width="100"></td>
              <td>{{ $cate_pro->product_price }}</td>
              <td>{{ $cate_pro->product_quantity }}</td>
              {{-- <td>{{ $cate_pro->product_author}}</td> --}}
              <td>
                <span class="text-ellipsis">
                  <?php
                  if ($cate_pro->product_status == 0) {
                  ?>
                    <a href="{{ URL::to('/unactive1/' . $cate_pro->product_id) }}">
                      <span class="fa-thumb-styling fa fa-thumbs-up" style="font-size: 40px; color: green;"></span>
                    </a>
                  <?php
                  } else {
                  ?>
                    <a href="{{ URL::to('/active1/'.$cate_pro->product_id) }}">
                      <span class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 40px; color: red;"></span>
                    </a>
                  <?php
                  }
                  ?>
                </span>
              </td>
              <td><span class="text-ellipsis">
                <a href="{{ URL::to('/edit-category-product/'.$cate_pro->product_id) }}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a href="{{ URL::to('/delete-category-product/'.$cate_pro->product_id) }}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection
