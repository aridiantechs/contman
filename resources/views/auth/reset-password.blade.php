

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Kaushan+Script&family=Noto+Serif:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: white;
            font-family: Poppins, "Helvetica Neue", sans-serif;
        }
        .error-message {
            color: #f22;
        }
        .bg {
            background-image: linear-gradient(to right bottom, #9a9a9a, #848484, #6f6f6f, #5a5a5a, #464646, #3b3b3b, #303030, #252525, #1f1f1f, #191919, #141414, #0c0c0c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        .columns {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            max-height: 100vh;
            background-color: #e6e6e6;
            background-size: contain;
            background-repeat: no-repeat;
            animation-name: MOVE-BG;
            animation-duration: 2s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-fill-mode: forwards;
            animation-direction: alternate;
        }
        
        .login-box {
            animation: fadeIn 1s;
            z-index: 10;
            border-radius: 5px;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            min-width: 400px;
            min-height: 200px;
            padding: 4rem 3rem;
            background-color: white;
        }
        .login-box a {
            text-decoration: none;
        }
        .login-box .login {
            display: none;
        }
        .login-box .signin {
            animation: fadeIn 0.8s;
        }
        .login-box .signup {
            animation: fadeIn 0.8s;
        }
        .login-box .action p {
            display: inline;
        }
        .login-box .action .signup {
            float: right;
            font-weight: 700;
        }
        .login-box .input-field {
            width: 76%;
            position: relative;
        }
        .login-box .input-field i {
            position: relative;
            position: absolute;
            top: 10px;
            left: 50px;
        }
        .login-box .input-field #password {
            background: url(https://res.cloudinary.com/www-santhoshthomas-xyz/image/upload/v1620796331/portfolio/lock_dnkpk8.png) no-repeat 5%;
            background-size: 20px;
            z-index: 50;
        }
        .login-box .input-field #email {
            background: url(https://res.cloudinary.com/www-santhoshthomas-xyz/image/upload/v1620796341/portfolio/name_1_rgo5hw.png) no-repeat 5%;
            background-size: 20px;
            z-index: 50;
        }
        .login-box .input-field #tel {
            background: url("../../../assets/telephone.png") no-repeat 5%;
            background-size: 20px;
            z-index: 50;
        }
        .login-box .input-field input {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            width: 100%;
            display: block;
            padding: 15px 35px;
            padding-left: 55px;
            margin: 20px 0;
            border: none;
            border-left: 4px solid #0e1776;
            border-radius: 4px;
        }
        .login-box-button {
            position: relative;
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box-button button {
            padding: 0.8rem 2rem;
            background: #0e1776;
            color: white;
            font-weight: 800;
            border: none;
            transition: all 1s ease-in;
            background-position: 0;
        }
        .login-box-button button:active {
            background-image: linear-gradient(to right top, #0e1776, #091b97, #031db9, #011edc, #081dff);
            background-position: 400%;
            transform: scale(1.1);
        }
        .login-box .topline {
            display: inline-block;
            position: relative;
            position: relative;
        }
        .login-box .topline:after {
            content: "";
            position: absolute;
            width: 40%;
            transform: scaleX(1);
            height: 5px;
            top: -5px;
            left: 0;
            background-color: #0e1776;
        }
        @media screen and (max-width: 776px) {
            .login-box {
                padding: 4rem 2rem !important;
                right: unset !important;
                width: 50px !important;
                max-width: 100px;
            }
        }
 
        .navbar-brand {
            display: inline-block;
            padding-top: .3125rem;
            padding-bottom: 1.3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap;
        }

        .w-100{
            width: 100%;
        }

        .bg-gradient{
            background: linear-gradient(90deg, #49aeff, #ff4c89) !important;
        }

        .txt-center{
            text-align: center;
        }

        .logo-text{
            font-family: 'Architects Daughter', cursive;
            font-weight: 800;
        }

        .font-3r{
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
      </head>
      
      <div class="bg">
      
        <div class="columns bg-gradient">
      
          <div class="login-box">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
              <div class="signin">
                <a class="navbar-brand w-100" href="/">
                    <div class="txt-center logo-text font-3r">Forgot Password</div>
                   {{--  <img
                        src="{{ asset('backend-assets/assets/theme/img/am-logo_.svg') }}"
                        width="400"
                        title="AM PMT"
                    > --}}
                </a>
                <br />
                
                
                <div class="input-field">
                    
                    <x-label class="block mt-1 w-full form-control" for="password_confirmation" :value="__('Email')" />
                    <x-input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email', $request->email)" required autofocus />
      
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                <div class="input-field">

                    <x-label class="block mt-1 w-full form-control" for="password_confirmation" :value="__('New Password')" />
                    <x-input id="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
        
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
      
                <div class="input-field">

                    <x-label class="block mt-1 w-full form-control" for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="login-box-button">
                  <button class="w-100 bg-gradient" type="submit">
                    <i class="fas fa-sign-in-alt"></i>
                    {{ __('Reset Password') }}
                  </button>
                </div>
              </div>
            </form>
      
          </div>
        </div>
      </div>
</body>
</html>
  
<script>
    
</script>