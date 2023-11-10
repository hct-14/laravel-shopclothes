<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>checkout</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("../FE/vendor/bootstrap/css/bootstrap.min.css") }}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset("../FE/vendor/font-awesome/css/font-awesome.min.css") }}" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ asset("../FE/assets/css/app.css") }}" type="text/css">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://nentang.vn">Nền tảng</a>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ asset("/") }}">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="get" action="search.html">
                    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                        name="keyword_tensanpham">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="cart.html">Giỏ hàng</a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="login.html">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end header -->

    <main role="main">
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="{{URL::to('save-checkout') }}">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">{{ count($cart) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @php
                            $grandTotal = 0;
                            @endphp
                            @foreach ($cart as $cart_item)
                                @php
                                $itemTotal = $cart_item['product_price'] * $cart_item['quantity'];
                                $grandTotal += $itemTotal;
                                @endphp
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $cart_item['name'] }}</h6>
                                        <small class="text-muted">{{ $cart_item['product_price'] }} x {{ $cart_item['quantity'] }}</small>
                                    </div>
                                    <span class="text-muted">{{ $itemTotal }}</span>
                                </li>

                            @endforeach
                            <span>Tổng tiền</span>
                            <span class="text-dark"><strong>{{ $grandTotal }}đ</strong></span>
                            <input type="hidden" name="oder_value" value="{{ $grandTotal }}">
                       
                        </ul>
                        <form onsubmit="return confirm('Xác nhận đặt hàng')"method="POST" action="{{ url ('save-checkout') }}">
                            @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-8 order-md-1">   
                        <h4 class="mb-3">Kiểm tra lại thông tin</h4>

                        <div class="row">
                            <div class="col-md-12">
                                {{-- @if(session('fullName')) --}}
                                    <label for="kh_ten">Họ tên</label>
                                    <input type="text" class="form-control" name="kh_ten" id="kh_ten" value="{{ session('fullName') }}">
                                {{-- @endif --}}
                            </div>

                            <div class="col-md-12">
                                {{-- @if(session('address')) --}}
                                    <label for="kh_diachi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" value="{{ session('address') }}" required>
                                {{-- @endif --}}
                            </div>
                            <div class="col-md-12">
                                {{-- @if(session('phone')) --}}
                                    <label for="kh_dienthoai">Điện thoại</label>
                                    <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" value="{{ session('phone') }}">
                                {{-- @endif --}}
                            </div>
                            {{-- @foreach ($cart as $cart_item)

                            <input type="hidden" class="form-control" name="quantity"  value="{{ $cart_item['quantity'] }}" required>
                                @endforeach --}}
                            <div class="col-md-12">
                                @if(session('email'))
                                    <label for="kh_email">Email</label>
                                    <input type="email" class="form-control" name="kh_email" id="kh_email" value="{{ session('email') }}">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="kh_cmnd">Ghi Chú</label>
                                <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd" required>
                            </div>
                        </div>
                        

                       
                    
                        @if(session('UserId'))
                      <input type="hidden" name="UserId" value="{{ session('UserId')}}">                
                          @else
                        <span>Không có</span>
                             @endif
                        <hr class="mb-4"> 
                        <label class="mb-3" style="font-size: 22px">Hình thức thanh toán</label>     <br>             
                            <button  class="btn btn-primary btn-lg btn-default"  name="httt_ma"  type="submit" value="VNPAY" name="btnDatHang">VNpay</button>
                            <button  class="btn btn-primary btn-lg btn-danger"  name="httt_ma"  type="submit" value="MOMO" name="btnDatHang">MONO</button>
                            <button  class="btn btn-primary btn-lg btn-success"  name="httt_ma"  type="submit" value="COD" name="btnDatHang">COD</button>
                    </div>
                </div>
            </form>


        </div>
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Bản quyền © bởi <a href="https://nentang.vn">Nền Tảng</a> - <script>document.write(new Date().getFullYear());</script>.</span>
            <span class="text-muted">Hành trang tới Tương lai</span>

            <p class="float-right">
                <a href="#">Về đầu trang</a>
            </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset("../FE/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("../FE2/vendor/popperjs/popper.min.js") }}"></script>
    <script src="{{ asset("../FE/vendor/bootstrap/js/bootstrap.min.js") }}"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="{{ asset("../FE//js/app.js") }}"></script>
</body>

</html>
