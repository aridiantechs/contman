@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    
</style>
@endsection
@section('content')
<div class="main-content">

    <div class="page-header">
        <h2 class="header-title">Blogs</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{route('backend.blog.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Blogs</a>
                <span class="breadcrumb-item active">List</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Blogs</h2>

            <div class="row m-v-30">
                <div class="col-lg-12 text-{{$alignreverse}}">
                    <a href="{{route('backend.blog.create')}}" class="btn btn-primary">
                        <span>Create</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>blog Title</th>
                            <th>blog Image</th>
                            <th>Categories</th>
                            <th>Details</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $key => $blog)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $blog->title ?? '' }}</td>
                                <td><img class="kt-media" style="width: 50%" src="{{asset($blog->image ?? '')}}" alt=""></td>
                                <td>
                                    @foreach ($blog->categories as $cat)
                                        {{ $cat->cat_name->category_name ?? '' }}
                                        <br>
                                    @endforeach
                                    
                                </td>
                                <td>{{ $blog->short_desc ?? '' }}</td>
                                <td>
                                    <a href="{{route('backend.blog.edit',$blog->id)}}" class="btn btn-primary btn-sm btn-bg-white" style="color: #5d78ff;" >
                                        <div class="kt-demo-icon__preview">
                                            <i style="color: #5d78ff;" class="fa fa-pencil-alt"></i>
                                        </div> 
                                    </a>
                                    
                                    @include('backend.components.delete',[
                                        'data' => $blog->id, 
                                        'route' =>route('backend.blog.destroy',$blog->id), 
                                    ])
                                </td>
                            </tr>
                        @endforeach
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