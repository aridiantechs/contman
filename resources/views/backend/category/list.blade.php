@extends('backend.layouts.app')
@section('meta')
<title>{{ config('app.name') }} | Dashboard</title>

@section('styles')
<link href="{{asset('backend/assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style type="text/css">

</style>
@endsection

@section('content')
<div class="main-content">

    <div class="page-header">
        <h2 class="header-title">Categories</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{route('backend.category.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Categories</a>
                <span class="breadcrumb-item active">List</span>
            </nav>
        </div>
    </div>
        
    <div class="card">
        <div class="card-body">
            <h2>Categories</h2>

            <div class="row m-v-30">
                @if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('Add Data'))
                    <div class="col-md-12 mt-1">
                        <button  class="btn btn-primary" type="button" data-toggle="modal" data-target="#categoryModal">Create Category</button>
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category name</th>
                            <th>Type</th>
                            @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['Update Data', 'Delete Data']))
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cats as $key => $cat)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $cat->category_name ?? '' }}</td>
                                <td>{{ $cat->category_type ?? '' }}</td>
                                <td>
                                    @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['Update Data', 'Delete Data']))
                                    <span class="dropdown">
                                        <a href="#" class="btn btn-sm" data-toggle="dropdown" aria-expanded="true">
                                          <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('Update Data'))
                                                <a class="dropdown-item edit_category" data-cat-id="{{$cat->id}}" href="{{route('backend.category.edit',$cat->id)}}"><i class="fa fa-edit"></i> update</a>
                                            @endif
                                            {{-- <a class="dropdown-cat" href="#" name="update_status" data-userid="{{$user->id}}"  data-toggle="modal" data-target="#kt_modal_status"><i class="la la-leaf" data-toggle="modal" data-target="#kt_modal_status"></i> Update Status</a> --}}
                                            @if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('Delete Data'))
                                                <form id="delete_form_{{$cat->id ?? ''}}" method="POST" action="{{ route('backend.category.destroy', $cat->id) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button title="Delete record" onclick="deleteConfirm(null,'{{$cat->id}}')" type="button" class="dropdown-item"><i class="far fa-trash-alt mr-2"></i> Delete</button>
                                                </form>
                                            @endif
                                            
    
                                        </div>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg category_modal_div" role="document">
        @include('backend.category.component.modal')
    </div>
</div>

@endsection


@section('scripts')
<!--begin::Page Vendors(used by this page) -->
    {{-- <script src="{{ asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> --}}
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/datatables/extensions/select.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

<script>
    $(document).ready(function(){
        $('[name="delete_user"],[name="update_status"]').click(function(e){
            $('[name="user_id"]').val($(this).data('userid'));
            
        });

        @if ($errors->any())
            $('#categoryModal').modal('show');
        @endif
    })

    $(document).on('click','.edit_category',function(e){
        e.preventDefault();
        // fullPageLoader(true);
        var cat_id=$(this).data('cat-id');

        $.ajax({
            url: "{{ url('/') }}/backend/category/"+cat_id,
            type: 'GET',
            success: function (res) {
                // fullPageLoader(false);
                if (res.status=='success') {
                    $(' .category_modal_div').html(res.data);
                    $('#categoryModal').modal('toggle');
                }
                else if(res.status=='error') {
                    toastr.success(res.message)
                }
            }
        });
        
    });
</script>
@endsection