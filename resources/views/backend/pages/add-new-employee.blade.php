@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Employee</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Forms</a>
                    <span class="breadcrumb-item active">Add New</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Infomation</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <h6 class="m-b-5 font-size-18">Employee Avatar</h6>
                        <p class="opacity-07 font-size-13 m-b-3">Recommended Dimensions: 120x120 Max fil size: 5MB</p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <hr class="m-v-25">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="userName">User Name:</label>
                            <input type="text" class="form-control" placeholder="User Name" value="Marshall Nichols">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="email">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold">Birthday</label>
                            <div class="input-affix m-b-10">
                                <i class="prefix-icon anticon anticon-calendar"></i>
                                <input type="text" class="form-control datepicker-input" placeholder="Pick a date">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="language">Language</label>
                            <select id="language" class="form-control">
                                <option>English</option>
                                <option>France</option>
                                <option>German</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="nationality">Nationality</label>
                            <select id="language" class="form-control">
                                <option>nationality</option>
                                <option>nationality</option>
                                <option>nationality</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Personal Infomation</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">Middle Name:</label>
                            <input type="text" class="form-control" placeholder="Middle Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">Iqamah Number:</label>
                            <input type="text" class="form-control" placeholder="Iqamah Number">
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Address Details</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="font-weight-semibold" for="fullAddress">Full Address:</label>
                            <input type="text" class="form-control" id="fullAddress" placeholder="Full Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="stateCity">State & City:</label>
                            <input type="text" class="form-control" id="stateCity" placeholder="State & City">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="language">Language</label>
                            <select id="language-2" class="form-control">
                                <option>United State</option>
                                <option>United Kingdom</option>
                                <option>France</option>
                                <option>German</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="m-t-25">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="language">Job Title</label>
                            <div class="m-b-15">
                                <select class="select2" name="states[]" multiple="multiple">
                                    <option value="AP">Apples</option>
                                    <option value="NL">Nails</option>
                                    <option value="BN">Bananas</option>
                                    <option value="HL">Helicopters</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="language">Company Name</label>

                            <div class="m-b-15">
                                <select class="select2" name="states[]" multiple="multiple">
                                    <option value="AP">Apples</option>
                                    <option value="NL">Nails</option>
                                    <option value="BN">Bananas</option>
                                    <option value="HL">Helicopters</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>File Browser</h4>
                <p>The file input is the most gnarly of the bunch and requires additional JavaScript if you’d like to hook them up with functional Choose file… and selected file name text.</p>
                <div class="m-t-25">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <button class="btn btn-default m-r-5">Save</button>
                <button class="btn btn-primary m-r-5">Submit</button>
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