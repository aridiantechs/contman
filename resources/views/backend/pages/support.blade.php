@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Support</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{route('/')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Forms</a>
                    <span class="breadcrumb-item active">Add New</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Support employee</th>
                                <th>Rate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/others/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Customer Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>12 May 2022</span>
                                </td>
                                <td>
                                    <span>16:56</span>
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/avatars/user.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Employee Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="m-l-auto text-primary">
                                        <i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="far fa-star m-l-5"></i>
                                    </div>
                                </td>
                                <td>

                                    <a href="{{route('backend.backend-pages','chat')}}" class="btn btn-primary m-r-10">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </a>

                                    <button class="btn btn-danger" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </button>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/others/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Customer Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>12 May 2022</span>
                                </td>
                                <td>
                                    <span>16:56</span>
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/avatars/user.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Employee Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="m-l-auto text-primary">
                                        <i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="far fa-star m-l-5"></i>
                                    </div>
                                </td>
                                <td>

                                    <a href="{{route('backend.backend-pages','chat')}}" class="btn btn-primary m-r-10">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </a>

                                    <button class="btn btn-danger" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </button>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/others/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Customer Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>12 May 2022</span>
                                </td>
                                <td>
                                    <span>16:56</span>
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/avatars/user.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Employee Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="m-l-auto text-primary">
                                        <i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="far fa-star m-l-5"></i>
                                    </div>
                                </td>
                                <td>

                                    <a href="{{route('backend.backend-pages','chat')}}" class="btn btn-primary m-r-10">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </a>

                                    <button class="btn btn-danger" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </button>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/others/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Customer Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>12 May 2022</span>
                                </td>
                                <td>
                                    <span>16:56</span>
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/avatars/user.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Employee Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="m-l-auto text-primary">
                                        <i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="far fa-star m-l-5"></i>
                                    </div>
                                </td>
                                <td>

                                    <a href="{{route('backend.backend-pages','chat')}}" class="btn btn-primary m-r-10">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </a>

                                    <button class="btn btn-danger" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </button>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image  rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/others/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Customer Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>12 May 2022</span>
                                </td>
                                <td>
                                    <span>16:56</span>
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded-circle border border-primary">
                                            <img src="{{asset('backend/assets/images/avatars/user.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">Employee Name Here</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="m-l-auto text-primary">
                                        <i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="fas fa-star m-l-5"></i><i class="far fa-star m-l-5"></i>
                                    </div>
                                </td>
                                <td>

                                    <a href="{{route('backend.backend-pages','chat')}}" class="btn btn-primary m-r-10">
                                        <i class="anticon anticon-eye"></i>
                                        <span class="m-l-10">View</span>
                                    </a>

                                    <button class="btn btn-danger" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </button>

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
<script src="{{asset('backend/assets/js/pages/project-list.js')}}"></script>
@endsection