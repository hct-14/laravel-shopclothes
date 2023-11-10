<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="{{asset("../FE/style.css")}}" rel="stylesheet"> 

    <title>Document</title>
</head>
<style>
  .search-box {
    display:flex;
    align-items: center;

    width: 200px; 
    background-color: white;
    border: 1px solid #ccc;
    z-index: 1;
}

#search-input {
    width: 100%;
    border: none;
    padding: 5px;
    box-sizing: border-box;
}

</style>
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
              </a>
            </div>
            <div class="header-right">
                <div class="topnav" id="myTopnav">
                    <div class="dropdown">
                        <button class="dropbtn">SẢN PHẨM
                          <i class="fa fa-caret-down"></i>
                        </button>
                            
          
                        <div class="dropdown-content">
                          @foreach ($categories as $item)

                          <a href="{{asset("/danh-muc-san-pham/".$item->category_id)}}">
                             {{$item->category_desc}} </a>
     
                          @endforeach

                        </div>
                      </div>
                      <a href="{{ url('show-product') }}" class="active">SẢN PHẨM MỚI</a>
                      <a href="#news">BỘ SƯU TẬP</a>
                    <a href="#contact">NEM ONLINE</a>
                   
                    <a href="#about">SALE</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                  </div>
                  
                
                
            </div>
            <div class="topnav2">
              <ul type="none">
                <form action="{{ URL::to('/search') }}" method="GET">
                  @csrf
                  <li class="search-box">
                      <input type="text" id="search-input" name="keyword_submit" placeholder="Tìm kiếm...">
                      <i class="fas fa-search"></i>
                  </li>
              </form>
              
              
              
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
                          <a href="{{ '/kiem-tra-hang/' . session('UserId') }}">Đơn Mua</a>
                          <a href="{{url('user-logout')}}">Đăng xuất</a>
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
        <div class="banner-img">
          <div class="banner-img1"></div>
          <img src="{{asset("../FE/images/home_new_banner_1.webp")}}" alt="">
        </div>
        <div class="banner-img2">
          <div class="banner1">
            <img src="{{asset("../FE/images/home_new_banner_1.webp")}}" alt="">
          </div>
          <div class="banner2">
            <img src="{{asset("../FE/images/home_new_banner_2.webp")}}" alt="">
          </div>
        </div>

        <div class="sanphammoi">
          <div class="text-sp">
            <h2>Sản Phẩm mới</h2>
          </div>
          <div class="slider">
            <div class="slider-container">
              @foreach ($products as $item)
                  

              <div class="slider-item"><img src="{{ asset('/uploads/product/'. $item->product_img1) }}" alt="Sản phẩm 1">
                <span>{{$item->product_name}}  </span>
                <p>
                  {{$item->product_price}}
                </p>
              
              </div>
              @endforeach

            </div>
            <button class="prev-btn">Trước</button>
            <button class="next-btn">Tiếp theo</button>
          </div>
          
        </div>
        <div class="sanphammoi">
          <div class="text-sp">
            <h2>ÁO LEN CAO CẤP</h2>
          </div>
          <div class="slider">
            <div class="slider-container">
              @foreach ($products as $item)
                  

              <div class="slider-item"><img src="{{ asset('/uploads/product/'. $item->product_img1) }}" alt="Sản phẩm 1">
                <span>{{$item->product_name}}  </span>
                <p>
                  {{$item->product_price}}
                </p>
              
              </div>
              @endforeach
        

            </div>
            <button class="prev-btn">Trước</button>
            <button class="next-btn">Tiếp theo</button>
          </div>
          
        </div>
        <div class="footer">
          <div class="foot-img">
            <img src="{{("../FE/images/hb_image1.webp")}}" alt="">
          </div>
          <div class="foot-text">
         <span> banquyen@phamvietem</span>
          </div>
        </div>
    </div> <!-- appp-->
</body>
<script src="{{asset("../FE/main.js")}}"></script>

</html>