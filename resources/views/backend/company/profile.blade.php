@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Company Profile</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                    <a class="breadcrumb-item" href="companies.html">All companies</a>
                    <span class="breadcrumb-item active">{{$company->name ?? ''}}</span>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="media align-items-center">
                        <div class="avatar avatar-image rounded">
                            <img src="{{asset($company->logo)}}" alt="">
                        </div>
                        <div class="m-{{$alignShortRev}}-20">
                            <h4 class="m-b-0">{{$company->name ?? ''}}</h4>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('backend.company.employees',$company->id)}}" class="btn btn-primary"> New member</a>
                        <a href="{{route('backend.company.services',$company->id)}}" class="btn btn-success"> New Service</a>
                        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#create-new-coupone"> New coupon</a>
                    </div>
                </div>
                <div class="m-t-40">
                    <h6>Description:</h6>
                    {{$company->additional_info ?? ''}}
                </div>
            </div>
            <div class="m-t-30">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#company-orders">Orders list </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company-tasks">Services ({{$services->count()}})</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company-coupons">Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company-attachment">Team Members ({{$employees->count()}})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#company-comments">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content m-t-15 p-25">
                    <div class="tab-pane fade show active" id="company-orders">
                        <div class="table-responsive">
                            <table class="table table-hover e-commerce-table">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Requester</th>
                                        <th>Service name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company->orders as $item)
                                        <tr>
                                            <td> {{$item->order->order_id ?? ''}}</td>
                                            <td>
                                                <h6 class="m-b-0">{{$item->order->user->first_name ?? ''}} {{$item->order->user->last_name ?? ''}}</h6>
                                            </td>
                                            <td>{{$item->service->service_data->category_name ?? ''}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->order->created_at)->format('d M Y')}}</td>
                                            <td>SAR {{$item->order->total_amount ?? ''}}</td>
                                            <td>
                                                @php
                                                    $status=$item->order->statuss->last() ? $item->order->statuss->last()->status : false;
                                                @endphp
                                                @if($status)
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge badge-{{$status=='completed' ? 'success' :($status=='rejected' ? 'danger' : 'warning')}}  badge-dot m-{{$alignShort}}-10"></div>
                                                        <div>{{\Str::upper($status) }}</div>
                                                    </div>
                                                @endif
                                            </td>
                                            {{-- <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                                <i class="anticon anticon-edit"></i>
                                                            </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                                <i class="anticon anticon-delete"></i>
                                                            </button>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="company-coupons">
                        <div class="row">
                            @foreach ($company->coupons() as $coupon)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between p-b-20 border-bottom">
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-gold avatar-icon" style="height: 55px; width: 55px;">
                                                        <i class="fas fa-tags font-size-25" style="line-height: 55px"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <h4 class="m-b-0">%{{$coupon->discount_percentage ?? ''}} OFF</h4>
                                                        <h2 class="font-weight-bold font-size-30 m-t-0 text-primary">
                                                            {{$coupon->code ?? ''}}
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled m-v-30">
                                                {{-- <li class="m-b-20">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-dark font-weight-semibold">All Services</span>
                                                        <div class="text-success font-size-16">
                                                            <i class="anticon anticon-check"></i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-20">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-dark font-weight-semibold">Max</span>
                                                        <div class="text-success font-size-16">
                                                            600SAR
                                                        </div>
                                                    </div>
                                                </li> --}}
                                                <li class="m-b-20">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-dark font-weight-semibold">Start Date</span>
                                                        <div class="font-size-13">
                                                            {{\Carbon\Carbon::parse($coupon->start_date)->format('d-M-Y')}}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-20">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-dark font-weight-semibold">End Date</span>
                                                        <div class="font-size-13">
                                                            {{\Carbon\Carbon::parse($coupon->end_date)->format('d-M-Y')}}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-20">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-dark font-weight-semibold">Coupons Qty.</span>
                                                        <div class="text-primary font-size-16">
                                                             {{$coupon->qty ?? ''}}
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a class="btn btn-{{$coupon->status==1 ? 'success' :'danger'}}" href="{{route('backend.coupon.deactive',$coupon->id)}}">{{$coupon->status ? 'Active' :'Deactive'}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="company-tasks">
                        <div class="row">
                            @foreach ($services as $key => $ser)
                                <div class="col-md-6">
                                    <h4>{{str_replace('_',' ',$key)}}</h4>
                                    @foreach ($ser as $item)
                                        <div class="checkbox m-b-20">
                                            <input id="task-1" type="checkbox" checked>
                                            <label for="task-1">{{$item->service_data->category_name ?? ''}}</label>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="company-comments">
                        <ul class="list-group list-group-flush">
                            @foreach ($company->rating_data as $rating)
                                
                                <li class="list-group-item p-h-0">
                                    <div class="media m-b-15">
                                        <div class="avatar avatar-image">
                                            <img src="{{asset($rating->order->user->profile_image)}}" alt="">
                                        </div>
                                        <div class="media-body m-{{$alignShortRev}}-20">
                                            <h6 class="m-b-0">
                                                <a href="" class="text-dark">{{$rating->order->user->first_name ?? ''}} {{$rating->order->user->last_name ?? ''}}</a>
                                            </h6>
                                            <span class="font-size-13 text-gray">{{\Carbon\Carbon::parse($rating->created_at)->format('d M Y')}}</span>
                                        </div>
                                        <div class="m-l-auto text-primary">
                                            @for ($i = 0; $i < $rating->services_rating; $i++)
                                                <i class="fas fa-star m-l-5"></i>
                                            @endfor
                                           
                                        </div>
                                    </div>
                                    <p><b>Order#: </b>{{$rating->order->order_id ?? ''}}</p>
                                    <p><b>Service: </b>{{$rating->order->order_items->service->service_data->category_name ?? ''}}</p>
                                    <p>{{$rating->comment ?? ''}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="company-attachment">

                        <div class="row" id="card-view">
                            @foreach ($employees as $item)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="m-t-20 text-center">
                                                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                                    <img  src="{{asset($item->user->profile_image)}}" alt="">
                                                </div>
                                                <h4 class="m-t-30">{{$item->user->first_name ?? ''}} {{$item->user->last_name ?? ''}}</h4>
                                                <p>{{$item->user->email ?? ''}}</p>

                                            </div>

                                            <div class="text-center m-t-30">
                                                @include('backend.components.delete',[
                                                    'data' => $item->id, 
                                                    'route' =>route('backend.company.deleteEmployee',['id'=>$company->id,'emp_id'=>$item->id]), 
                                                ])
                                                <a href="{{route('backend.company.updateEmployee',['id'=>$company->id,'emp_id'=>$item->id])}}" class="btn btn-success">
                                                    <i class="fas fa-edit "></i>
                                                    <span class="m-{{$alignShortRev}}-5">Edit</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create-new-coupone">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Coupon</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    
                    <form method="POST" action="{{route('backend.coupon.store')}}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="companies[]" value="{{$company->id}}">
                            <div class="form-group">
                                <label>Coupon ID</label>
                                <input type="text" class="form-control" name="code" placeholder="Please input Coupon name" value="{{old('code')}}">
                            </div>
                            <div class="form-group ">
                                <label class="font-weight-semibold">Start Date</label>
                                <div class="input-affix m-b-10">
                                    <i class="prefix-icon anticon anticon-calendar"></i>
                                    <input type="text" class="form-control datepicker-input" name="start_date" value="{{old('start_date')}}" placeholder="Pick a date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="font-weight-semibold">End Date</label>
                                <div class="input-affix m-b-10">
                                    <i class="prefix-icon anticon anticon-calendar"></i>
                                    <input type="text" class="form-control datepicker-input" name="end_date" value="{{old('end_date')}}" placeholder="Pick a date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of Coupons</label>
                                <input type="text" class="form-control" name="qty" value="{{old('qty')}}" placeholder="Please input Coupons number">
                            </div>
                            <div class="form-group">
                                <label>Discount percentage</label>
                                <input type="text" class="form-control" name="discount_percentage" value="{{old('discount_percentage')}}" placeholder="Please input Coupon number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create Coupon</button>
                        </div>
        
                    </form>
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
    <script>
        $(document).ready(function() {
            // if session has error display modal
            @if(session()->has('coupon_error'))
                $('#create-new-coupone').modal('show');
            @endif
        });
    </script>
@endsection
