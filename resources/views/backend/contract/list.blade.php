@extends('backend.layouts.app')

@section('styles')
<style>
    th{
        font-weight: 700 !important;
    }

    /* The side navigation menu */
	.sidenav {
		height: 90%; /* 100% Full-height */
		width: 0; /* 0 width - change this with JavaScript */
		position: fixed; /* Stay in place */
		z-index: 1;
		top: 80px;
		right: 0;
		background-color: #fff;
		box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
		overflow-x: hidden;
		padding-top: 60px;
		transition: 0.5s;
	}

		/* The navigation menu links */
	.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s;
	}

	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover {
		color: #f1f1f1;
	}

	/* Position and style the close button (top right corner) */
	.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
	}

	@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
	}
    @media screen and (max-width:767px){
		.sidenav {
			top:10px;
		}
	}

	@media screen and (max-width:991px){
		.sidenav {
			height: 90%;
		}
    }

    .fa, .fas{
        line-height: unset !important;
    }
</style>
@endsection

@section('content')

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Contracts</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{route('backend.contract.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                    <span class="breadcrumb-item active">Contracts</span>
                </nav>
            </div>
        </div>

        <div class="card p-r-15 p-l-15">
            <div class="row align-items-md-center">
                <div class="col-md-6">
                    <div class="media m-v-10">
                        <div class="avatar avatar-cyan avatar-icon avatar-square">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="media-body m-{{$alignShortRev}}-15">
                            <h6 class="mb-0">All Contracts</h6>
                            {{-- <span class="text-gray font-size-13">Sanad Team</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-{{$alignreverse}} m-v-10">
                        
                        <a href="{{route('backend.contract.create')}}" class="btn btn-primary m-{{$alignShortRev}}-15">
                            <span>Add new contract</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-row" action="{{ getFullUrl() }}">
                    <h3 class="col-md-12">Search contracts</h3>
                    <hr>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="search_text" name="search_text" value="{{request()->query('search_text')}}">
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-primary search__" type="button">Go</button>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <button class="btn btn-primary float-right" type="button" onclick="openNav()"><i class="fa fa-filter"></i> Filter</button>
                    </div>
                </form>
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
												<th class="bold">#</th>
                                                <th>Type</th>
											   <th>User</th>
											   <th>Start date</th>
											   <th>End date</th>
											   <th>Renewal date</th>
											   <th>Renewal Deadline date</th>
											   <th>Contract value</th>
											   {{-- <th>Active</th> --}}
											   @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['edit-data', 'delete-data', 'add-data']))
											   <th>Operation</th>
											   @endif
											</tr>
										</thead>
										<tbody>
											@foreach($contracts as $key => $contract)
												<tr>
													<td>{{++$key}}</td>
													<td class="name-badge p-3">{{ $contract->user_type ?? '' }}</td>
													<td>{{ $contract->association->name ?? '' }}</td>
													<td>{{ $contract->start_date ?? '' }}</td>
													<td>{{ $contract->end_date ?? '' }}</td>
													<td>{{ $contract->renewal_date ?? '' }}</td>
													<td>{{ $contract->renewal_deadline_date ?? '' }}</td>
													<td> $ {{$contract->contract_value ?? '' }}</td>
													<td class="d-flex">
                                                        {{-- <div class="dropdown dropdown-inline">
                                                            <button type="button" class="btn btn-default btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="flaticon-more"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                @if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('edit-data'))
                                                                    <a class="dropdown-item" href="{{route('backend.report.show',$user->id)}}" ><i class="fas fa-eye"></i>View</a>
                                                                @endif
                                                            </div>
                                                        </div> --}}
                                                        
                                                        @include('backend.components.delete',[
                                                            'data' => $contract->id, 
                                                            'route' =>route('backend.contract.destroy',$contract->id), 
                                                        ])
                                                        <a href="{{route('backend.contract.edit',$contract->order_id)}}" class="btn btn-success btn-tone ml-2 d-flex">
                                                            <i class="fas fa-edit "></i>
                                                            <span class="m-{{$alignShortRev}}-5">Edit</span>
                                                        </a>
                                                        <a href="{{route('backend.contract.show',$contract->order_id)}}" class="btn btn-info btn-tone ml-2 d-flex">
                                                            <i class="fas fa-eye "></i>
                                                            <span class="m-{{$alignShortRev}}-5">View</span>
                                                        </a>
													</td>
												</tr>
											@endforeach
										</tbody>
                                    </table>
                                </div>
                                {!!$contracts->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="filterSidenav" class="sidenav">
		
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<form class="container" method="GET">
            <input type="hidden" name="search_text" value="{{request()->query('search_text')}}">
			<div class="row mt-3">
				<div class="col-md-12 mb-2">
					<h4><i class="fa fa-filter"></i> Filter:</h4>
				</div>
				<div class="form-group col-md-12">
                    @php
                        $user_type = request()->query('type') ? request()->query('type') :'';
                    @endphp
                    <label class="font-weight-semibold" for="language">Type</label>
                    <select id="country" class="form-control" name="type" required>
                        <option value="" selected>select...</option>
                        <option value="vendor" {{ $user_type=="vendor" ? 'selected' : ''}}>Vendor </option>
                        <option value="customer" {{ $user_type=="customer" ? 'selected' : ''}}>Customer </option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    @php
                        $product_category = request()->query('product_category') ? request()->query('product_category') :'';
                    @endphp
                    <label class="font-weight-semibold" for="fullAddress">Product Category:</label>
                    <select class="form-control" name="product_category">
                        <option value="" selected>Select...</option>
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id ?? ''}}" {{ $product_category==$cat->id ? 'selected' : ''}}>{{$cat->category_name ?? ''}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group col-md-12">
                    @php
                        $contract_type = request()->query('contract_type') ? request()->query('contract_type') :'';
                    @endphp
                    <label class="font-weight-semibold">Contract Type</label>
                    <select class="form-control" name="contract_type">
                        <option value="">Select type</option>
                        <option value="normal" {{$contract_type=="normal" ? 'selected' : ''}}>Normal</option>
                        <option value="company" {{$contract_type=="company" ? 'selected' : ''}}>Company</option>
                    </select>
                    @error('contract_type')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    @php
                        $extension = request()->query('extension') ? request()->query('extension') :'';
                    @endphp
                    <label class="font-weight-semibold">Extension</label>
                    <select class="form-control" name="extension">
                        <option value="">Select type</option>
                        <option value="automatic" {{$extension=="automatic" ? 'selected' : ''}}>Automatic</option>
                    </select>
                    @error('extension')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    @php
                        $extension_period = request()->query('extension_period') ? request()->query('extension_period') :'';
                    @endphp
                    <label class="font-weight-semibold">Extension Period</label>
                    <select class="form-control" name="extension_period">
                        <option value="">Select type</option>
                        <option value="12-months" {{$extension_period=="12-months" ? 'selected' : ''}}>12 months</option>
                    </select>
                    @error('extension_period')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
				</div>
			</div>

		</form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.23/daterangepicker.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
		/* $("[name='status']").bootstrapSwitch(); */

		$("[name='status']").on('switchChange.bootstrapSwitch',function (e, state) {
			/* console.log($(this).data('userid')); */
			const that=this;
			$.get("{{ route('backend.user.updateStatus') }}",
			{
				user_id: $(this).data('userid'),
				status:state==true?1 : 0
			},
			function(status){
				
				if (status=="success") {
					$(that).bootstrapSwitch('state', state, true);
				} else {
					$(that).bootstrapSwitch('state', !state, true);
				}
			});
			
		});

		@if(request()->query())
            openNav();
		@endif
		
        $('.search__').on('click', function(){
            var search = new URLSearchParams(location.search);
            if (search.has("search_text")) {
                search.set("search_text", $('#search_text').val());
                var newSearch = search.toString();
                window.history.pushState({}, "", `${location.pathname}?${newSearch}`);
            }
            
            window.location.reload();
        })
	});

    function openNav() {
        document.getElementById("filterSidenav").style.width = "400px";
        if($('.bulkupdate').is(':checked')){
            $('#startdatediv').css('display','none');
        }else{
            $('#startdatediv').css('display','block');
        }
    }

    function closeNav() {
        document.getElementById("filterSidenav").style.width = "0";
	}
</script>

<script>
	
</script>

@endsection