<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contman - Login </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/contman-favicon.jpg')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        .text-color1{
            color: #e31c79;
        }

        .text-color2{
            color: #66554b;
        }

        body{
            font-size: 1rem !important;
        }

        .form-control {
            padding: 1rem 2.2rem !important;
        }

        .card {
            border: none !important;
        }

        h1{
            font-size: 2.5rem !important;
        }
    </style>
</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex bg-white">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card {{-- shadow-lg --}}">
                                <div class="card-body">
                                    <div class="d-flex text-center justify-content-center m-b-30">
                                        <img class="img-fluid" alt="" width="300" src="{{asset('backend/assets/images/contman-logo.jpg')}}">
                                        {{-- <h1 class="m-b-0 w-100"><span class="text-color1">Cont</span><span class="text-color2"> Man</span></h1> --}}
                                        {{-- <h2 class="m-b-0 text-color2">Sign In</h2> --}}
                                    </div>
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email">
                                                
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="{{ route('password.request') }}">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                {{-- <span class="font-size-13 text-muted">
                                                    Don't have an account? 
                                                    <a href="{{ route('register') }}"> Signup</a>
                                                </span> --}}
                                                <button class="btn btn-primary w-100 text-white">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2023 Contman</span>
                    {{-- <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{asset('backend/assets/js/vendors.min.js')}}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            @if(session()->has('error'))
                toastr.error('{{ session('error') }}')
            @endif
    
            @if(session()->has('warning'))
                toastr.warning('{{ session('warning') }}')
            @endif
    
                
            @if(session()->has('status'))
                toastr.success('{{ session('status') }}')
            @endif
        });
    </script>
</body>

</html>