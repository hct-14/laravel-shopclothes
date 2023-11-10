<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="{{asset("../FE/style.css")}}" rel="stylesheet"> 
    <link href="{{asset("../FE/show-product.css")}}" rel="stylesheet"> 


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
                          <a href="#">Áo len</a>                         
                           <a href="#">Áo len</a>
                          <a href="#">Áo Khoắc</a>

                        </div>
                      </div>
                    <a href="#home" class="active">SẢN PHẨM MỚI</a>
                    <a href="#news">BỘ SƯU TẬP</a>
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
                </li>
              </ul>
          </div>
        </div>  <!--header-->
<!-- ------------------------------------ -->
        <div class="spcontainer">
                <div class="spcontainer-left">

                    <span>Danh mục</span>
                    <span>Tất cả sản phẩm</span>
                    <p>Đầm</p>
                    <ul type="none">
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                    </ul>
                    <p>Đầm</p>
                    <ul type="none">
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                    </ul>                   
                     <p>Đầm</p>
                     <ul type="none">
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                        <li>Đầm xuông</li>
                    </ul>                  

                </div>
   

        <div class="spcontainer-right">
            <div class="spcontainer1">
                @foreach ($products as $item)
                @if ($item->product_status == 1)
                    <a href="{{ URL::to("/chi-tiet-sp/".$item->product_id) }}" >
                        <div class="spcontainer-column">
                            <div class="col-product">
                                <div class="col-product-img">
                                    <img src="{{ asset('/uploads/product/'. $item->product_img1) }}" alt="">
                                </div>
                                <div class="col-product-text">
                                    <span>{{$item->product_name}}</span>
                                    <p>{{$item->product_price}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
            

                   
            </div>
            
            </div>


        </div>


          <!-- --------------------------------------------------- -->
          <div class="footer">
  
            <div class="foot-text">
           <span> banquyen@phamvietem</span>
            </div>
          </div>
    </div> <!-- appp-->
</body>
<script>
    function changeImage(imageSrc) {
  var largeImage = document.getElementById('largeImage');
  largeImage.src = imageSrc;
}

</script>

</html>