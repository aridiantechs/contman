@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Services</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash d-flex">
                    <a href="{{route('backend.company.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                    <span class="breadcrumb-item active">services</span>
                </nav>
            </div>
        </div>

        <div class="card p-r-15 p-l-15">
            <div class="row align-items-md-center">
                <div class="col-md-6">
                    <div class="media m-v-10">
                        <div class="avatar avatar-cyan avatar-icon avatar-square">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body m-{{$alignShortRev}}-15">
                            <h6 class="mb-0">All Services ({{$company->services->count()}})</h6>
                            {{-- <span class="text-gray font-size-13">Sanad Team</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-{{$alignreverse}} m-v-10">
                        <a href="{{route('backend.company.services',['id'=>$company->id,'q'=>'create'])}}" class="btn btn-primary m-{{$alignShortRev}}-15">
                            <span>Add new service</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Card View -->
                <div class="row" id="list-view">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>service</th>
                                                <th>type</th>
                                                <th>shift</th>
                                                {{-- <th>duration</th> --}}
                                                <th>price</th>
                                                <th>employees</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($company->services as $serv)
                                                <tr>
                                                    <td>
                                                        <div class="media-body m-l-15">
                                                            <h6 class="mb-0">{{$serv->service_data->category_name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$serv->type ?? ''}}
                                                    </td>
                                                    <td>
                                                        {{$serv->shift ?? ''}}
                                                    </td>
                                                    {{-- <td>
                                                        {{$serv->duration ?? ''}}
                                                    </td> --}}
                                                    <td>
                                                        {{$serv->price ?? ''}}
                                                    </td>
                                                    <td>
                                                        @foreach ($serv->employees() as $emp)
                                                            <span class="badge badge-primary">{{$emp->emp->user->first_name}}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-right">
                                                        @include('backend.components.delete',[
                                                            'data' => $serv->id, 
                                                            'route' =>route('backend.company.deleteService',['id'=>$company->id,'service_id'=>$serv->id]), 
                                                        ])
                                                        <a href="{{route('backend.company.updateService',['id'=>$company->id,'service_id'=>$serv->id])}}" class="btn btn-success btn-tone">
                                                            <i class="fas fa-edit "></i>
                                                            <span class="m-{{$alignShortRev}}-5">Edit</span>
                                                        </a>
                                                    </td>
                                                </tr> 
                                            @endforeach
                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Search Start-->
    <div class="modal modal-left fade search" id="search-drawer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-between align-items-center">
                    <h5 class="modal-title">Search</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body scrollable">
                    <div class="input-affix">
                        <i class="prefix-icon anticon anticon-search"></i>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="m-t-30">
                        <h5 class="m-b-20">Files</h5>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-cyan avatar-icon">
                                <i class="anticon anticon-file-excel"></i>
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                <p class="m-b-0 text-muted font-size-13">by Finance</p>
                            </div>
                        </div>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-blue avatar-icon">
                                <i class="anticon anticon-file-word"></i>
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                <p class="m-b-0 text-muted font-size-13">by Developers</p>
                            </div>
                        </div>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-purple avatar-icon">
                                <i class="anticon anticon-file-text"></i>
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                            </div>
                        </div>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-red avatar-icon">
                                <i class="anticon anticon-file-pdf"></i>
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <h5 class="m-b-20">Members</h5>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/avatars/thumb-1.jpg" alt="">
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                            </div>
                        </div>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                            </div>
                        </div>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/avatars/thumb-3.jpg" alt="">
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <h5 class="m-b-20">News</h5>
                        <div class="d-flex m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/img-1.jpg" alt="">
                            </div>
                            <div class="m-l-15">
                                <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                <p class="m-b-0 text-muted font-size-13">
                                    <i class="anticon anticon-clock-circle"></i>
                                    <span class="m-l-5">25 Nov 2018</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End-->

    <!-- Quick View START -->
    <div class="modal modal-right fade quick-view" id="quick-view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-between align-items-center">
                    <h5 class="modal-title">Theme Config</h5>
                </div>
                <div class="modal-body scrollable">
                    <div class="m-b-30">
                        <h5 class="m-b-0">Header Color</h5>
                        <p>Config header background color</p>
                        <div class="theme-configurator d-flex m-t-10">
                            <div class="radio">
                                <input id="header-default" name="header-theme" type="radio" checked value="default">
                                <label for="header-default"></label>
                            </div>
                            <div class="radio">
                                <input id="header-primary" name="header-theme" type="radio" value="primary">
                                <label for="header-primary"></label>
                            </div>
                            <div class="radio">
                                <input id="header-success" name="header-theme" type="radio" value="success">
                                <label for="header-success"></label>
                            </div>
                            <div class="radio">
                                <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                <label for="header-secondary"></label>
                            </div>
                            <div class="radio">
                                <input id="header-danger" name="header-theme" type="radio" value="danger">
                                <label for="header-danger"></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h5 class="m-b-0">Side Nav Dark</h5>
                        <p>Change Side Nav to dark</p>
                        <div class="switch d-inline">
                            <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                            <label for="side-nav-theme-toogle"></label>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h5 class="m-b-0">Folded Menu</h5>
                        <p>Toggle Folded Menu</p>
                        <div class="switch d-inline">
                            <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                            <label for="side-nav-fold-toogle"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View END -->

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/js/pages/profile.js')}}"></script>
@endsection