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
        <h2 class="header-title">Banners</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{route('backend.banner.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Banners</a>
                <span class="breadcrumb-item active">List</span>
            </nav>
        </div>
    </div>
        
    <div class="card">
        <div class="card-body">
            <h2>Banners</h2>

            <div class="row m-v-30">
                @if(auth()->user()->hasRole('superadmin') || auth()->user()->hasPermissionTo('add-data'))
                    <div class="col-md-12 mt-1">
                        <button  class="btn btn-primary" type="button" data-toggle="modal" data-target="#bannerModal">Add Banner</button>
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>banner</th>
                            @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['edit-data', 'delete-data', 'add-data']))
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $key => $ban)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><img class="kt-media" style="width: 30%" src="{{ $ban->filename ?? '' }}" alt=""></td>
                                <td>
                                    @if (auth()->user()->hasRole('superadmin') ||auth()->user()->hasAnyPermission(['edit-data', 'delete-data', 'add-data']))
                                        @include('backend.components.delete',[
                                            'data' => $ban->id, 
                                            'route' =>route('backend.banner.destroy',$ban->id), 
                                        ])
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


<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg banner_modal_div" role="document">
        @include('backend.banner.component.modal')
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
        @error('image')
            $('#bannerModal').modal('show');
        @enderror
    })

</script>
@endsection