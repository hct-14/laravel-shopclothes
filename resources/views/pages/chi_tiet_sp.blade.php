<!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        

                                <link href="{{ asset('../FE/style.css') }}" rel="stylesheet"> 
                                <link href="{{ asset('../FE/product.css') }}" rel="stylesheet"> 
                                <link href="{{ asset('../FE/main.js') }}" rel="stylesheet"> 

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                <title>Document</title>
                                <style>
                                    </style>
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
                                                <a href="#news">BỘ SƯU TẬP</a>
                                                <a href="#contact">NEM ONLINE</a>
                                            
                                                <a href="#about">SALE</a>
                                                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <<div class="topnav2">
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
                                    <div class="product">
                                        <div class="protext">
                                            <h3>chi tiet san pham</h3>

                                        </div>

                                        <form action="{{url('show-cart')}}" method="POST" class="display-flex mb-3">
                                @csrf
                                <div class="chitiet">
                                    @foreach ($products as $item)
                                    <div class="chitiet1">
                                        <div class="chitiet1-img" onclick="changeImage('{{ asset('/uploads/product/'. $item->product_img1) }}')">
                                            <img src="{{ asset('/uploads/product/'. $item->product_img1) }}" alt="">
                                        </div>
                                        <div class="chitiet1-img" onclick="changeImage('{{ asset('/uploads/product/'. $item->product_img2) }}')">
                                            <img src="{{ asset('/uploads/product/'. $item->product_img2) }}" alt="">
                                        </div>
                                        <div class="chitiet1-img" onclick="changeImage('{{ asset('/uploads/product/'. $item->product_img3) }}')">
                                            <img src="{{ asset('/uploads/product/'. $item->product_img3) }}" alt="">
                                        </div>
                                    </div>
                                            
                                            <div class="chitiet2">
                                                <div class="chitiet2-img">
                                                <img id="largeImage" src="{{ asset('/uploads/product/'. $item->product_img1) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="chitiet3">
                                                <div class="chitiet3-text">
                                                    <span>{{$item->product_name}} </span>
                                                </div>
                                                <div class="chitiet3-text2">
                                                    <ul type="none">
                                                        <li>
                                                            <span>Thương hiệu: Nem </span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                            Mã sản phẩm: {{$item->product_code}}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="chitiet3-text">
                                                    <span> 
                                                        {{$item->product_price}}
                                                    </span>
                                                </div>
                                                <div class="size">
                                                    <span>Size</span>
                                                    <ul type="none">
                                                        <li>
                                                            <input type="radio" id="size_s" name="size" value="S" {{ session('size') == 'S' ? 'checked' : '' }}>
                                                            <label for="size_s">S</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="size_l" name="size" value="L" {{ session('size') == 'L' ? 'checked' : '' }}>
                                                            <label for="size_l">L</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="size_xl" name="size" value="XL" {{ session('size') == 'XL' ? 'checked' : '' }}>
                                                            <label for="size_xl">XL</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            
                                                <div class="soluong">
                                                    <span>
                                                        còn {{$item->product_quantity}} sản phẩm
                                                    </span>
                                                </div>  
                                                    
                                                <div class="quantity">
                                                    <span>Số lượng:</span>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="{{ $item->product_quantity }}" value="1">
                                                </div>
                                                <div id="quantity-warning" style="color: red; display: none;">
                                                    Sản phẩm vượt quá số lượng trong cửa hàng!
                                                </div>
                                                <div class="addcart">
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        
                                            
                                                
                                                    <input class="addcart1" type="submit" value="Thêm vào giỏ hàng">
                                                </div>
                                                <!-- <div class="addcart">
                                                    <input class="addcart1" type="submit" value="Thêm vào giỏ hàng">
                                                </div> -->
                                            </div>
                                            </form>

                                            @endforeach 


                                        </div>
                                        <div class="sanphamtuongtu">
                                            <div class="sp-text">
                                                <h3>San Pham Tuong Tu</h3>

                                            </div>
                                            <div class="spcontainer">
                                                @foreach ($related_product as $item)
                                                    
                                                <div class="col">
                                                    <div class="col-img">
                                                        <img src="{{ asset('/uploads/product/'. $item->product_img1)}}" alt="">
                                                    
                                                    </div>
                                                    <div class="col-text">
                                                        <span>{{$item->product_name}} </span>
                                                        <p>{{$item->product_price}}</p>
                                                    </div>
                                                </div>
                                                
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
                                function changeImage(newImageUrl) {
                                    document.getElementById('largeImage').src = newImageUrl;
                                }
                    
                                document.querySelector('form').addEventListener('submit', function (event) {
                                    event.preventDefault(); // Ngăn form tự động gửi đi
                            
                                    // Lấy số lượng sản phẩm từ trường input
                                    var quantity = parseInt(document.getElementById('quantity').value);
                                    // Lấy số lượng sản phẩm trong cửa hàng từ biến mô phỏng
                                    var productQuantityInStore = parseInt(document.getElementById('quantity').max);                            
                                    // Kiểm tra nếu số lượng sản phẩm vượt quá
                                    if (quantity > productQuantityInStore) {
                                        // Hiển thị thông báo cảnh báo
                                        document.getElementById('quantity-warning').style.display = 'block';
                                    } else {
                                        // Nếu không vượt quá, thêm sản phẩm vào giỏ hàng
                                        document.querySelector('form').submit();
                                    }
                                });
                            </script>
                            
                            </html> 