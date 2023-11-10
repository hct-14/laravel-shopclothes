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
                <img src="/images/logo.webp" alt="">
            </div>
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
                    <a href="#home" class="active">SẢN PHẨM MỚI</a>
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
                      <i class="fas fa-user"></i><span>Tai khoan</span>
                      <div class="dropdown-content">
                          <a href="#">Trang cá nhân</a>
                          <a href="#">Cài đặt</a>
                          <a href="#">Đăng xuất</a>
                      </div>
                  </li>
                  <li><i class="fas fa-shopping-cart"></i><span>gio hang</span></li>
              </ul>
          </div>
        </div>  <!--header-->
<!-- ------------------------------------ -->

          <!-- --------------------------------------------------- -->
          <div class="footer">
  
            <div class="foot-text">
           <span> banquyen@phamvietem</span>
            </div>
          </div>
    </div> <!-- appp-->
</body>
<script src="{{asset("../FE/main.js")}}"></script>

<script>
    function changeImage(imageSrc) {
  var largeImage = document.getElementById('largeImage');
  largeImage.src = imageSrc;
}

</script>

</html>