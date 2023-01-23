<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sanad - Admin Dashboard </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/logo/favicon.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{asset('backend/assets/images/others/login-3.png')}}')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="{{asset('backend/assets/images/logo/logo.svg')}}">
                                        <h2 class="m-b-0">Verify OTP</h2>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="otp">enter the code you received to log in</label>
                                            <div class="otp-inputs">
                                                <input maxlength="1" class="form-control" id="otp" placeholder="0">
                                                <input maxlength="1" class="form-control" id="otp" placeholder="0">
                                                <input maxlength="1" class="form-control" id="otp" placeholder="0">
                                                <input maxlength="1" class="form-control" id="otp" placeholder="0">
                                                <input maxlength="1" class="form-control" id="otp" placeholder="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Don't received? 
                                                    <a href="sign-up.html"> resend</a>
                                                </span>
                                                <button class="btn btn-primary">Verify</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2021 Sanad.sa</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{asset('backend/assets/js/vendors.min.js')}}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

</body>

</html>