
@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<style>
    .select2-container {
        display: block;
    }
    .select2-container-multi .select2-choices {
        min-height: 2.5375rem;
        border: 1px solid #edf2f9;
        background-image: none;
    }
</style>
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Company</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{route('backend.company.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Forms</a>
                    <span class="breadcrumb-item active">Add New Company</span>
                </nav>
            </div>
        </div>
        @include('backend.partials.errors')
        @php
            if (isset($company)) {
                $route=route('backend.company.edit',$company->id);
            } else {
                $route=route('backend.company.store');
            }
            
        @endphp
        <form method="post" action="{{$route}}" enctype="multipart/form-data">
            @csrf
            @isset($company)
                @method('PUT')
            @endisset
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title font-size-18">Basic Infomation</h4>
                </div>
                <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold">Company logo</label>
                                <input type="file" class="form-control" name="logo"/>
            
                                @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="userName">Company Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="User Name" value="{{old('name') ?? $company->name ?? ''}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="email">Email:</label>
                                <input type="email" name="company_email" value="{{old('company_email') ?? $company->email ?? ''}}" class="form-control" id="email" placeholder="email">
                                @error('company_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                <input type="text" name="contact" value="{{old('contact') ?? $company->contact ?? ''}}" class="form-control" id="phoneNumber" placeholder="Phone Number">
                                @error('contact')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="font-weight-semibold" for="fullAddress">Full Address:</label>
                                <input type="text" class="form-control" value="{{old('location') ?? $company->location ?? ''}}" name="location" id="fullAddress" placeholder="Full Address">
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="state">State:</label>
                                <input type="text" class="form-control" name="state" value="{{old('state') ?? $company->state ?? ''}}" id="state" placeholder="State">
                                @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="City">City:</label>
                                <input type="text" class="form-control" name="city" value="{{old('city') ?? $company->city ?? ''}}" id="City" placeholder="City">
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="language">Country</label>
                                <select id="country" name="country" value="{{old('country') ?? $company->country ?? ''}}" class="form-control">
                                    <option>United </option>
                                    <option>United Kingdom</option>
                                    <option>France</option>
                                    <option>German</option>
                                </select>
                                @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title font-size-18">Add an Employee</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h6 class="m-b-5">Employee Avatar</h6>
                            <p class="opacity-07 font-size-13 m-b-3">Recommended Dimensions: 120x120 Max fil size: 5MB</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <form>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="userName">Employee Name:</label>
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
                            <button class="btn btn-primary m-t-30">Add Employee</button>

                        </form>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title font-size-18">Add Service</h4>
                </div>
                <div class="card-body">
                    <div class="m-t-25">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="radio m-b-30">
                                    <span><input id="radio1" name="radioDemo" type="radio" checked>
                                    <label class="m-r-50" for="radio1">On time</label></span>
                                    <span><input id="radio2" name="radioDemo" type="radio">
                                    <label for="radio2">Stay in </label></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-semibold" for="language">Choose a service</label>

                                <div class="m-b-15">
                                    <select class="select2" name="states[]" multiple="multiple">
                                        <option value="AP">Driver</option>
                                        <option value="d">Driver</option>
                                        <option value="sddf">Driver</option>
                                        <option value="ff">Driver</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Service Price</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Service Price">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Number of services</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-semibold" for="language">Workers</label>

                                <div class="m-b-15">
                                    <select class="select2" name="states[]" multiple="multiple">
                                        <option value="AP">Worker</option>
                                        <option value="Wrker">Worker</option>
                                        <option value="Woker">Worker</option>
                                        <option value="Work">Worker</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Service Time</label>
                                <select class="form-control">
                                    <option>Day</option>
                                    <option>Night</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber"> Visit Duration</label>
                                <select class="form-control">
                                    <option>3 Hours</option>
                                    <option>4 Hours</option>
                                    <option>5 Hours</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-semibold" for="phoneNumber">Service Description</label>
                                <textarea class="form-control"></textarea>

                                <button class="btn btn-primary m-t-30">Add Service</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
            {{-- <div class="card">
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
            </div> --}}

            <div class="card">
                <div class="card-body">

                    {{-- <button class="btn btn-default m-r-15">Save</button> --}}
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

    </div>
    <!-- Content Wrapper END -->

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-elements.js')}}"></script>
@endsection
