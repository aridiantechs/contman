
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
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash d-flex">
                    <a href="{{route('backend.company.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                    <a href="{{isset($ce) ? route('backend.company.employees',$ce->company_id) : ''}}" class="breadcrumb-item">Employees</a>
                    <span class="breadcrumb-item active">Add employee</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-18">Add an Employee</h4>
            </div>
            <div class="card-body">
                @include('backend.partials.errors')
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($ce)
                        @method('PUT')
                    @endisset
                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                            <h6 class="m-b-5">Employee Avatar</h6>
                            <p class="opacity-07 font-size-13 m-b-3">Recommended Dimensions: 120x120 Max fil size: 5MB</p>
                            <input type="file" class="form-control" name="profile_image"/>
        
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="userName">First Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{isset($ce) ? $ce->user->first_name : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="userName">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{isset($ce) ? $ce->user->last_name : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{isset($ce) ? $ce->user->email : ''}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Phone Number" value="{{isset($ce) ? $ce->user->phone : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold">Birthday</label>
                            <div class="input-affix m-b-10">
                                <i class="prefix-icon anticon anticon-calendar"></i>
                                <input type="text" class="form-control datepicker-input" value="{{isset($ce) ? $ce->user->date_of_birth : ''}}" name="date_of_birth" placeholder="Pick a date">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="language">Language</label>
                            <select id="language" class="form-control" name="lang" value="{{isset($ce) ? $ce->user->lang : ''}}">
                                <option value="english" {{isset($ce) && $ce->user->lang =='english' ? 'selected' : ''}}>English</option>
                                <option value="french" {{isset($ce) && $ce->user->lang =='french' ? 'selected' : ''}}>France</option>
                                <option value="german" {{isset($ce) && $ce->user->lang =='german' ? 'selected' : ''}}>German</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="nationality">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" {{isset($ce) && $ce->user->gender =='male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{isset($ce) && $ce->user->gender =='female' ? 'selected' : ''}}>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="nationality">Nationality</label>
                            <select id="nationality" class="form-control" name="nationality">
                                @foreach ($nationalities as $nat)
                                    @php
                                        $n_sel=isset($ce) && $ce->user->nationality==$nat->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{$nat->id}}" {{$n_sel}}>{{$nat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary m-t-30">Submit</button>
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
