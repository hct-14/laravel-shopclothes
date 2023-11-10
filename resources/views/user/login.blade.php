<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="{{asset("../FE/login.css")}}">
</head>
<body>
    <div class="container">
   
            <form action="/user-login" method="POST" class="form" id="login-2">
                @csrf
        
                @if(Session::has('message'))
                    <p style="color: red;">{{ Session::get('message') }}</p>
                @endif
                <h3 class="heading">Đăng nhập</h3>
        
                <div class="spacer"></div>
        
            <div class="form__input-group">
                <label for="user_loginname" class="form-label">Tài Khoản</label>
                <input class="form__input" id="user_loginname" name="user_loginname" 
                type="text" placeholder="Nhập email hoặc tài khoản" class="form-contr  ol"required="">
                <span class="form-message"></span>
            </div>
    
            <div class="form__input-group">
                <label for="user_password" class="form-label">Mật khẩu</label>
                <input class="form__input" id="user_password" name="user_password" 
                type="password" placeholder="Nhập mật khẩu" class="form-control"required="">
                <span class="form-message"></span>
            </div>
        
       
            <button class="form__button" type="submit">Đăng nhập</button>
            <div class="flex items-center justify-end mt-4" style="width: 100%">
                <a href="{{ url('authorized/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
            </div>
                <p class="form__text">
                    <a href="#" class="form__link">Quên mật khẩu?</a>
                </p>
            <p class="form__text">
                <a class="form__link" href="./" id="linkCreateAccount">Tạo tài khoản mới</a>
            </p>
        </form>
        
        
        <form action="{{ URL::to('user-res') }}" class="form form--hidden" id="createAccount" method="POST">
            @csrf
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input name="user_fullname" type="text" id="signupUsername" class="form__input" autofocus placeholder="Username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_gmail" type="text" class="form__input" autofocus placeholder="Email Address">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_loginname" type="text" class="form__input" autofocus placeholder="userlogin">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_password" type="password" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_phone" type="text" class="form__input" autofocus placeholder="numberphone">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_address" type="text" class="form__input" autofocus placeholder="Address">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input name="user_password"type="password" class="form__input" autofocus placeholder="Confirm password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const loginForm = document.querySelector("#login-2");
            const createAccountForm = document.querySelector("#createAccount");
    
            const linkCreateAccount = document.querySelector("#linkCreateAccount");
            const linkLogin = document.querySelector("#linkLogin");
    
            linkCreateAccount.addEventListener("click", (e) => {
                e.preventDefault();
                loginForm.classList.add("form--hidden");
                createAccountForm.classList.remove("form--hidden");
            });
    
            linkLogin.addEventListener("click", (e) => {
                e.preventDefault();
                loginForm.classList.remove("form--hidden");
                createAccountForm.classList.add("form--hidden");
            });
        });
    </script>
</body>