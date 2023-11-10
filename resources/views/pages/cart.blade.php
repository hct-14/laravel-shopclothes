<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="{{asset("../FE/style.css")}}" rel="stylesheet"> 
    <link href="{{asset("../FE/product.css")}}" rel="stylesheet"> 
    <link href="{{asset("../FE/cart.css")}}" rel="stylesheet"> 



    <title>Document</title>
</head>
<body>
    <div class="app">
        <div class="head">
            <ul type ="none">
                <li > <i class="fas fa-home"></i> <span>Hệ thống showroom</span> </li>
                <li><i class="fas fa-phone"></i> <span> Mua hàng online:0123456788</span> </li>
            </ul>
        </div> <!--head-->
        <div class="header">
            <div class="header-left">
                <a href="{{url('trang chu')}}">
                    <img src="{{asset("../FE/images/logo.webp")}}" alt="">
                  </a>            </div>
            <div class="header-right">
                <div class="topnav" id="myTopnav">
                    <div class="dropdown">
                        <button class="dropbtn">SẢN PHẨM
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="#">Đầm</a>
                          <a href="#">Áo sơ mi</a>
                          <a href="#">Áo kiểu</a>
                          <a href="#">Quần</a>
                          <a href="#">Chân váy</a>
                          <a href="#">Set bộ</a>
                          <a href="#">Áo dài</a>
                          <a href="#">Áo len</a>                          <a href="#">Áo len</a>
                          <a href="#">Áo Khoắc</a>

                        </div>
                      </div>
                      <a href="{{ url('show-product') }}" class="active">SẢN PHẨM MỚI</a>
                    <a href="#news">BÔJ SƯU TẬP</a>
                    <a href="#contact">NEM ONLINE</a>
                   
                    <a href="#about">SALE</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                  </div>
            </div>
            <div class="topnav2">
              <ul type="none">
                  <li><i class="fas fa-search"></i></li>
                  <li id="account">
                      <i class="fas fa-user"></i>
                      <span>
                        @if(session('fullName'))
                            {{ session('fullName') }}
           
                        @else
                        Tài Khoản
                        @endif
                    </span>
                      <div class="dropdown-content">
                          <a href="#">Trang cá nhân</a>
                          <a href="#">Cài đặt</a>
                          <a href="#">Đăng xuất</a>
                      </div>
                  </li>
                  <li>
                    <a href="{{('cart1')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Giỏ hàng</span>
                    <span id="cart-count">{{ count((array) session('cart')) }}</span> 
                  </a>
                </li>              </ul>
          </div>
        </div>  <!--header-->
<!-- ------------------------------------ -->

            <div class="cart">
                <div class="cart-header">
                    <h1>Giỏ Hàng </h1>
                </div>

                <table>
                    <tr>
                        <th>Ảnh</th>
                        <th colspan="3">Sản phẩm</th> <!-- Sử dụng colspan="2" để nối chặt 2 ô -->
                        <th>Giá</th>
                        <th>Size</th>

                        <th>Sô lượng</th>
                        <th>Tổng tiền</th>

                    </tr>

                    @php
                    $totalPrice = 0;
                @endphp
                    @foreach ($cart as $item)
                    <form action="{{URL::to('/payment')}}" method="post">
                    @php
                        $itemTotal = $item['product_price'] * $item['quantity'];
                        $totalPrice += $itemTotal;
                    @endphp
                    <tr>
                        <td><img src="{{ asset('/uploads/product/'. $item['image']) }}" alt="" width="100px"></td>
                        <td colspan="3">{{ $item['name'] }}</td>
                        <td>{{ $item['product_price'] }}</td>
                        <td>{{ $item['size'] }}</td>

                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $itemTotal }}</td>
                    </tr>
                @endforeach
                
                
                </table>

            
                <div class="tongtien">
                    <span>Tổng tiền: {{ $totalPrice }}</span>
                </div>
                
                <div class="thanhtoanngay">
                    <a href="{{asset('payment')}}">
                   <input type="submit" name="" id="" value="THANH TOÁN">
                </a>
                </div>
            </form>
            </div>


          <!-- --------------------------------------------------- -->
          <div class="footer">
  
            <div class="foot-text">
           <span> banquyen@phamvietem</span>
            </div>
          </div>
    </div> <!-- appp-->
</body>


</html>