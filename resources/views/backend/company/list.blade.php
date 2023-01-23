@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')
<div class="main-content">
    <div class="page-header no-gutters">
        @include('backend.partials.errors')

        <div class="row align-items-md-center">
            <div class="col-md-6">
                <form action="">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-affix m-v-10">
                                <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                <input type="text" class="form-control" name="search_text" value="{{request()->query('search_text') ?? ''}}" placeholder="Search Company">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="text-md-{{$alignreverse}} m-v-10">
                    <div class="btn-group m-{{$alignShort}}-10">
                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon" data-toggle="tooltip" data-placement="bottom" title="List View">
                            <i class="fas fa-list"></i>
                        </button>
                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active" data-toggle="tooltip" data-placement="bottom" title="Card View">
                            <i class="fas fa-th"></i>
                        </button>
                    </div>
                    <a href="{{route('backend.company.create')}}" class="btn btn-primary" {{-- data-toggle="modal" data-target="#create-new-project" --}}>
                        <i class="anticon anticon-plus"></i>
                        <span class="m-{{$alignShortRev}}-5">New Company</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="card-view">
            <div class="row">
                @foreach ($companies as $company)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="media">
                                        <div class="avatar avatar-image rounded">
                                            <img src="assets/images/others/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-{{$alignShortRev}}-10">
                                            <h5 class="m-b-0">{{$company->name ?? ''}}</h5>
                                            <span class="text-muted font-size-13">{{$company->orders->count() ?? 0}} Orders</span>
                                        </div>
                                    </div>
                                    <div class="dropdown dropdown-animated scale-left">
                                        <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                            <i class="anticon anticon-ellipsis"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{route('backend.company.services',$company->id)}}" class="dropdown-item" type="button">
                                                <i class="fas fa-th"></i>
                                                <span class="m-{{$alignShortRev}}-10">Services</span>
                                            </a>
                                            <a href="{{route('backend.company.employees',$company->id)}}" class="dropdown-item" type="button">
                                                <i class="fas fa-users"></i>
                                                <span class="m-{{$alignShortRev}}-10">Employees</span>
                                            </a>
                                            <a href="{{route('backend.company.show',$company->id)}}" class="dropdown-item">
                                                <i class="fas fa-eye"></i>
                                                <span class="m-{{$alignShortRev}}-10">View</span>
                                            </a>
                                            <a class="dropdown-item" href="{{route('backend.company.edit',$company->id)}}">
                                                <i class="fas fa-edit"></i>
                                                <span class="m-{{$alignShortRev}}-10">Edit</span>
                                            </a>
                                            <form id="delete_form_{{$company->id ?? ''}}" method="POST" action="{{ route('backend.company.destroy', $company->id) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Delete record" onclick="deleteConfirm(null,'{{$company->id}}')" type="button" class="dropdown-item"><i class="far fa-trash-alt mr-2"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    @php
                                        $complete_perc=$company->orders->count() ? number_format($company->orders_count/$company->orders->count()) : 0
                                    @endphp
                                    <div class="d-flex justify-content-between">
                                        <span class="font-weight-semibold">Orders Complete</span>
                                        <span class="font-weight-semibold">{{$complete_perc}}%</span>
                                    </div>
                                    <div class="progress progress-sm m-t-10">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$complete_perc}}%"></div>
                                    </div>
                                </div>
                                <div class="m-t-20">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>Team Members</h4>
                                        </div>
                                        <div>
                                            @foreach ($company->emp()->limit(2)->get() as $emp)
                                                <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Virgil Gonzales">
                                                    <div class="avatar avatar-image avatar-sm">
                                                        <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                    </div>
                                                </a>
                                            @endforeach
                                            
                                            @if ($company->emp->skip(2)->count())
                                                <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="2 More">
                                                    <div class="avatar avatar-text avatar-sm">
                                                        <span class="text-dark">+{{$company->emp->skip(2)->count()}}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                {{-- <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="media">
                                    <div class="avatar avatar-image rounded">
                                        <img src="assets/images/others/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-{{$alignShortRev}}-10">
                                        <h5 class="m-b-0">Company Name 03</h5>
                                        <span class="text-muted font-size-13">21 Orders</span>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-animated scale-left">
                                    <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                        <i class="anticon anticon-ellipsis"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" type="button">
                                            <i class="anticon anticon-eye"></i>
                                            <span class="m-{{$alignShortRev}}-10">View</span>
                                        </button>
                                        <button class="dropdown-item" type="button">
                                            <i class="anticon anticon-edit"></i>
                                            <span class="m-{{$alignShortRev}}-10">Edit</span>
                                        </button>
                                        <button class="dropdown-item" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-{{$alignShortRev}}-10">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-semibold">Orders Complete</span>
                                    <span class="font-weight-semibold">87%</span>
                                </div>
                                <div class="progress progress-sm m-t-10">
                                    <div class="progress-bar" role="progressbar" style="width: 87%"></div>
                                </div>
                            </div>
                            <div class="m-t-20">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4>Team Members</h4>
                                    </div>
                                    <div>
                                        <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Lilian Stone">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Victor Terry">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-11.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="3 More">
                                            <div class="avatar avatar-text avatar-sm">
                                                <span class="text-dark">+3</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card d-none" id="list-view">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Company </th>
                                <th>Orders</th>
                                <th>Members</th>
                                <th>Progress</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="assets/images/others/thumb-2.jpg" alt="">
                                            </div>
                                            <div class="m-{{$alignShortRev}}-10">
                                                <h5 class="m-b-0">{{$company->name}}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>56 Orders</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                @foreach ($company->emp()->limit(2)->get() as $emp)
                                                    <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Virgil Gonzales">
                                                        <div class="avatar avatar-image avatar-sm">
                                                            <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                        </div>
                                                    </a>
                                                @endforeach
                                                @if ($company->emp->skip(2)->count())
                                                    <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="2 More">
                                                        <div class="avatar avatar-text avatar-sm">
                                                            <span class="text-dark">+{{$company->emp->skip(2)->count()}}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                            <div class="m-{{$alignShortRev}}-10">
                                                <i class="anticon anticon-check-o text-success"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-animated scale-left">
                                            <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                <i class="anticon anticon-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="{{route('backend.company.services',$company->id)}}" class="dropdown-item" type="button">
                                                    <i class="fas fa-th"></i>
                                                    <span class="m-{{$alignShortRev}}-10">Add Services</span>
                                                </a>
                                                <a href="{{route('backend.company.employees',$company->id)}}" class="dropdown-item" type="button">
                                                    <i class="fas fa-users"></i>
                                                    <span class="m-{{$alignShortRev}}-10">Add Employees</span>
                                                </a>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-eye"></i>
                                                    <span class="m-{{$alignShortRev}}-10">View</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-edit"></i>
                                                    <span class="m-{{$alignShortRev}}-10">Edit</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-delete"></i>
                                                    <span class="m-{{$alignShortRev}}-10">Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-image rounded">
                                            <img src="assets/images/others/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-{{$alignShortRev}}-10">
                                            <h5 class="m-b-0">Company Name 03</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>21 Orders</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Lilian Stone">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                                </div>
                                            </a>
                                            <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="Victor Terry">
                                                <div class="avatar avatar-image avatar-sm">
                                                    <img src="assets/images/avatars/thumb-11.jpg" alt="">
                                                </div>
                                            </a>
                                            <a class="m-{{$alignShort}}-5" href="javascript:void(0);" data-toggle="tooltip" title="3 More">
                                                <div class="avatar avatar-text avatar-sm">
                                                    <span class="text-dark">+3</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress progress-sm w-100 m-b-0">
                                            <div class="progress-bar" role="progressbar" style="width: 87%"></div>
                                        </div>
                                        <div class="m-{{$alignShortRev}}-10">
                                            87%
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-animated scale-left">
                                        <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                            <i class="anticon anticon-ellipsis"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">
                                                <i class="anticon anticon-eye"></i>
                                                <span class="m-{{$alignShortRev}}-10">View</span>
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <i class="anticon anticon-edit"></i>
                                                <span class="m-{{$alignShortRev}}-10">Edit</span>
                                            </button>
                                            <button class="dropdown-item" type="button">
                                                <i class="anticon anticon-delete"></i>
                                                <span class="m-{{$alignShortRev}}-10">Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create-new-project">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Company</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="new-project-name">Company Name</label>
                            <input type="text" class="form-control" id="new-project-name" placeholder="Please input Company name">
                        </div>
                        <div class="form-group">
                            <label for="new-project-name">Company Category</label>
                            <input type="text" class="form-control" id="new-project-Category" placeholder="Please input Company Category">
                        </div>
                        <div class="form-group">
                            <label for="new-project-desc">Description</label>
                            <textarea id="new-project-desc" class="form-control" placeholder=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Create Company</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/js/pages/project-list.js')}}"></script>
@endsection