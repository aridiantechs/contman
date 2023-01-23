@extends('backend.layouts.app')

@section('styles')
	<style>
		.bootstrap-switch-container{
			width: 160px !important;
		}

		.name-badge{
			position: relative;
    		min-width: 175px;
			font-size: 13px;
		}
		.btn-primary{
			color: #5d78ff;
		}

		.pagination {
			display: inline-block;
			padding-left: 0;
			margin: 20px 0;
			border-radius: 4px;
		}

		.pagination>li {
			display: inline;
		}

		.blog__pagination {
			margin: 0;
			text-align: center;
		}

		.blog__pagination .pagination {
			padding: 60px 0 0;
			margin: 0;
			border-top: 1px solid #ddd;
		}

		.pagination>li:last-child>a, .pagination>li:last-child>span, .pagination>li:first-child>a, .pagination>li:first-child>span, .pagination>li>a, .pagination>li>span {
			border-radius: 0;
		}

		.pagination>li>a, .pagination>li>span {
			position: relative;
			float: left;
			padding: 6px 12px;
			margin-left: -1px;
			line-height: 1.42857143;
			color: #337ab7;
			text-decoration: none;
			background-color: #fff;
			border: 1px solid #ddd;
		}
		.pagination>li>a, .pagination>li>span {
			border: none;
			color: #3a3a54;
			font-weight: 600;
			text-transform: uppercase;
			background: #F6F6F6;
			margin-left: 17px;
			font-size: 15px;
			padding: 8px 16px;
		}


		.new-picklist{
			display: none;
		}

		.error{
			color: red;
		}

		.btn-bg-white{
			background: #fff !important;
		}

		.btn-primary{
			color: #5d78ff;
		}
	</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				@if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('add-data'))
					<h3 class="kt-portlet__head-title">
						<a href="{{route('backend.faqs.create')}}" class="btn btn-primary text-white">Create Faq</a>
					</h3>
				@endif
			</div>
			<div class="kt-portlet__head-label" style="float: right">
				<form action="" method="GET">
					<div class="form-group mb-0">
					<div class="input-group">
						<input type="text" class="form-control" name="search_text" placeholder="Search for...">
						<div class="input-group-append">
							<button class="btn btn-secondary" type="submit">Go!</button>
						</div>
					</div>
				</div>
				</form>
				
			</div>
		</div>
		<div class="kt-portlet__body">
			<!--begin::Section-->
			<div class="kt-section">
				 
				<div class="kt-section__content">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
								   <th>title</th>
								   <th>description</th>
								   @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['edit-data', 'delete-data', 'add-data']))
								   <th>Action</th>
								   @endif
								</tr>
							</thead>
							<tbody>
								@foreach($faqs as $key => $faq)
									<tr>
										<td width="10">{{++$key}}</td>
										<td width="10">{{$faq->title ?? ''}}</td>
										<td width="70">{{$faq->description ?? ''}}</td>
										<td width="10">
											@if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['edit-data', 'delete-data', 'add-data']))
											<div class="dropdown dropdown-inline">
												<button type="button" class="btn btn-default btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="flaticon-more"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													@if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('edit-data'))
														<a class="dropdown-item" href="{{route('backend.faqs.edit',$faq->id)}}" ><i class="fas fa-pencil-alt"></i>Edit</a>
													@endif
												</div>
											</div>

											@if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('delete-data'))
												@include('components.delete' , ['form_id' =>'faq_remove_form_'.$faq->id,'data' => $faq->id, 'route' => 'backend.faqs.destroy'])
											@endif
										@endif
										</td>
										
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			@include('backend.components.pagination',['data'=>$faqs])
			
			<!--end::Section-->
		</div>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

@endsection

@section('scripts')

@endsection