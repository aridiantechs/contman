@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Company</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Forms</a>
                    <span class="breadcrumb-item active">Add New Company</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-18">Auto</h4>
            </div>
            <div class="card-body">

                <form>
                    <div class="form-group ">
                        <div class="checkbox">
                            <input type="checkbox" id="gridCheck1">
                            <label for="gridCheck1">
                                Example checkbox
                                </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">select</label>
                                </div>
                                <div class="col-md-8">
                                    <select id="language-2" class="form-control">
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                        </select>

                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">label name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">select</label>
                                </div>
                                <div class="col-md-8">
                                    <select id="language-2" class="form-control">
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                        </select>

                                </div>
                            </div>

                        </div>
                        <h3 class="col-md-12 m-b-15 m-t-30">Header Here</h3>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">select</label>
                                </div>
                                <div class="col-md-8">
                                    <select id="language-2" class="form-control">
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                        </select>

                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">select</label>
                                </div>
                                <div class="col-md-8">
                                    <select id="language-2" class="form-control">
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                            <option>option</option>
                        </select>

                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8 text-right">

                            <button class="btn btn-primary">Add Button Here</button>
                        </div>
                        <h3 class="col-md-12 m-b-15 m-t-30">Header Here</h3>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">label name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <label class="font-weight-semibold m-0" for="userName">label name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-right">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="input value Here" value="input value Here">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-8 text-right">

                            <button class="btn btn-primary">Add Button Here</button>
                        </div>
                    </div>



                </form>
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
@endsection