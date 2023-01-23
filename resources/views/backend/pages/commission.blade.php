@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">

        <div class="page-header">
            <h2 class="header-title">Website commission</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Website commission</span>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Website commission</th>

                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>Company Name</td>
                                <td>20%</td>
                                <td>
                                    <button class="btn btn-success m-r-5">Edit</button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Wrapper END -->

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-elements.js')}}"></script>
@endsection