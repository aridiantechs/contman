@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    
</style>
@endsection
@section('content')
<div class="main-content">

    <div class="page-header">
        <h2 class="header-title">All Order Requests</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{route('backend.orders.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Orders</a>
                <span class="breadcrumb-item active">All Order Requests</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>All Order Requests</h2>

            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="checkbox">
                                    <input id="checkAll" type="checkbox">
                                    <label for="checkAll" class="m-b-0"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Requester</th>
                            <th>Service name</th>
                            <th>Company name</th>
                            <th>Contract Type</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input id="check-item-1" type="checkbox">
                                    <label for="check-item-1" class="m-b-0"></label>
                                </div>
                            </td>
                            <td>
                                #{{$order->order_id}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar avatar-image avatar-sm m-{{$alignShort}}-10">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div> --}}
                                    <h6 class="m-b-0">{{$order->user->first_name ?? ''}} {{$order->user->last_name ?? ''}}</h6>
                                </div>
                            </td>
                            <td><a href="javascript::void(0)">
                                {{$order->order_items->service->service_data->category_name ?? ''}}
                            </a></td>
                            <td>{{$order->order_items->company->name ?? ''}}</td>
                            <td>{{$order->order_items->service->type ?? ''}}</td>
                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
                            <td>${{$order->total_amount}}</td>
                            <td>
                                @php
                                    $status=$order->statuss->last() ? $order->statuss->last()->status : false;
                                @endphp
                                @if($status)
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-{{$status=='completed' ? 'success' :($status=='rejected' ? 'danger' : 'warning')}} badge-dot m-{{$alignShort}}-10"></div>
                                        <div>{{\Str::upper($status) }}</div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td>
                                <div class="checkbox">
                                    <input id="check-item-1" type="checkbox">
                                    <label for="check-item-1" class="m-b-0"></label>
                                </div>
                            </td>
                            <td>
                                #89559
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image avatar-sm m-{{$alignShort}}-10">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <h6 class="m-b-0">1 Requester name here</h6>
                                </div>
                            </td>
                            <td><a href="order-page.html">1 Service name here</a></td>
                            <td>1 Company Name Here</td>
                            <td>Stay in service</td>
                            <td>8 May 2019</td>
                            <td>$107.00</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="badge badge-success badge-dot m-{{$alignShort}}-10"></div>
                                    <div>Completed</div>
                                </div>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input id="check-item-1" type="checkbox">
                                    <label for="check-item-1" class="m-b-0"></label>
                                </div>
                            </td>
                            <td>
                                #53231
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image avatar-sm m-{{$alignShort}}-10">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <h6 class="m-b-0">Requester name here</h6>
                                </div>
                            </td>
                            <td><a href="order-page.html">5 Service name here</a></td>
                            <td>Company Name Here</td>
                            <td>Stay in service</td>
                            <td>8 May 2019</td>
                            <td>$137.00</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="badge badge-warning badge-dot m-{{$alignShort}}-10"></div>
                                    <div>Uncompleted</div>
                                </div>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input id="check-item-1" type="checkbox">
                                    <label for="check-item-1" class="m-b-0"></label>
                                </div>
                            </td>
                            <td>
                                #53301
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-image avatar-sm m-{{$alignShort}}-10">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <h6 class="m-b-0">Requester name here</h6>
                                </div>
                            </td>
                            <td><a href="order-page.html">12 Service name here</a></td>
                            <td>Company Name Here</td>
                            <td>Stay in service</td>
                            <td>8 May 2019</td>
                            <td>$137.00</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="badge badge-danger badge-dot m-{{$alignShort}}-10"></div>
                                    <div>Rejected</div>
                                </div>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td>
                        </tr> --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- page js -->
<script src="{{asset('backend/assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/e-commerce-order-list.js')}}"></script>
@endsection