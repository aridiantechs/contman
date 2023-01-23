
@extends('backend.layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />
<style>
   
   .bootstrap-tagsinput{
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #e2e5ec !important;
        border-radius: 4px !important;
	}

    .bootstrap-tagsinput input{
        width: 100% !important;
    }
	
   .bootstrap-tagsinput .badge{
		margin: 2px 2px;
		background-color: #5969ff;
		border-radius: 4px;
	}

   .invalid-feedback{
      display: block;
      color: red;
   }

   .valid-feedback{
      display: block;
      color: rgb(45, 171, 11);
   }

   .hide{
      display: none;
   }

    .iti{
        width: 100%;
    }
    .select2-container {
        display: block;
    }
    .select2-container-multi .select2-choices {
        min-height: 2.5375rem;
        border: 1px solid #edf2f9;
        background-image: none;
    }

   
   .new {
   padding: 50px;
   }

   .checkbox-group {
   display: block;
   }

   .checkbox-group input {
   padding: 0;
   height: initial;
   width: initial;
   margin-bottom: 0;
   display: none;
   cursor: pointer;
   }

   .checkbox-group label {
   position: relative;
   cursor: pointer;
   }

   .checkbox-group label:before {
   content:'';
   -webkit-appearance: none;
   background-color: transparent;
   border: 2px solid #0079bf;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
   padding: 10px;
   display: inline-block;
   position: relative;
   vertical-align: middle;
   cursor: pointer;
   margin-right: 5px;
   }

   .checkbox-group input:checked + label:after {
   content: '';
   display: block;
   position: absolute;
   top: 2px;
   left: 9px;
   width: 6px;
   height: 14px;
   border: solid #0079bf;
   border-width: 0 2px 2px 0;
   transform: rotate(45deg);
   }

   .select2-search:after{
      top: 10px !important;
      font-size: 18px !important;
   }

   .select2-container--default .select2-selection--multiple{
      padding: 0.55rem 1rem !important;
      border: 1px solid #d1d7dd !important;
   }

   .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #e31c79;
    border: 1px solid #e31c79;
    color: white;
   }

   .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
      border-right: white;
      color: white;
   }
</style>
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash d-flex">
                    <a href="{{route('backend.dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-{{$alignShort}}-5"></i>Home</a>
                    <a href="{{ route('backend.user.index')}}" class="breadcrumb-item">Users</a>
                    <span class="breadcrumb-item active">Add User</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-18">Add a User</h4>
            </div>
            <div class="card-body">
                @include('backend.partials.errors')
                @php 
                  $route = route('backend.user.store');
                  if(isset($user)){
                     $route = route('backend.user.update',$user->id);
                  }
               @endphp
                <form action="{{$route}}" id="user__form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                            <h6 class="m-b-5">User Avatar</h6>
                            <p class="opacity-07 font-size-13 m-b-3">Recommended Dimensions: 120x120 Max fil size: 5MB</p>
                            <input type="file" class="form-control" name="profile_image"/>
        
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-group col-md-4">
                           <label>Role</label>
                           @php
                              $role = isset($user) && $user->roles()->exists() ? $user->roles()->first()->name :'';
                           @endphp
                           <select class="form-control" name="role" id="role">
                              <option value="">Select Role</option>
                              <option value="customer" {{$role=='endUser' ? 'selected' : ''}}>Customer</option>
                              <option value="vendor" {{$role=='vendor' ? 'selected' : ''}}>Vendor</option>
                              <option value="employee" {{$role=='employee' ? 'selected' : ''}}>Employee</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="userName">First Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{isset($user) ? $user->first_name : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="userName">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{isset($user) ? $user->last_name : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{isset($user) ? $user->email : ''}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                            {{-- <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Phone Number" value="{{isset($user) ? $user->phone : ''}}"> --}}

                            <input type="tel" maxlength="15"  class="form-control" name="phone" id="phone" value="{{ isset($user)? $user->phone : '' }}">
                              <input type="tel" class="hide" name="new_phone" id="hiden">
                              <span id="valid-msg" class="valid-feedback hide">✓ Valid</span>
                              <span id="error-msg" class="invalid-feedback hide"></span>
                              
                              @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold">Birthday</label>
                            <div class="input-affix m-b-10">
                                <i class="prefix-icon anticon anticon-calendar"></i>
                                <input type="text" class="form-control datepicker-input" value="{{isset($user) ? $user->date_of_birth : ''}}" name="date_of_birth" placeholder="Pick a date">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                           <label class="font-weight-semibold" for="email">Password:</label>
                           <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        @php
                           $display=isset($user) && $user->hasRole('employee') ? 'block' : 'none';
                        //    dd($user->getAllPermissions()->pluck('name')->toArray());
                        @endphp
                        <div id="permissions" style="display: {{$display}}" class="form-group col-md-12">
                           
                           <label class="font-weight-semibold">Permissions:</label>
                           <select class="form-control" name="permissions[]" multiple="multiple" id="permission_select">
                              @foreach ($permissions as $perm)
                                 <option value="{{$perm->name ?? ''}}" {{$perm->name=='endUser' ? 'selected' : ''}}>{{$perm->name ?? ''}}</option>
                              @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="button" id="submit-btn" class="btn btn-primary m-t-30">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- Content Wrapper END -->

@endsection
@section('scripts')
<!-- Third Party Scripts(used by this page)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
   
   $(document).ready(function(){
    $("#permission_select").select2();

      @if (isset($user) && $user->getAllPermissions()) 
        // console.log({!! json_encode($user->getAllPermissions()->pluck('name')->toArray())!!});
        $("#permission_select").val({!! json_encode($user->getAllPermissions()->pluck('name')->toArray())!!}).trigger('change');
       
      @endif

      //select on change option
      $('#role').on('change', function(){
         var role = $(this).val();
         if(role == 'employee'){
            $('#permissions').show();
         }else{
            $('#permissions').hide();
         }
      });
   })

</script>

{{-------------------------}}
    {{-- input phone setting --}}
    <script>
      /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/

      var phone = document.querySelector("#phone"),
          errorMsg = document.querySelector("#error-msg"),
          validMsg = document.querySelector("#valid-msg");
      
      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      var iti=window.intlTelInput(phone,{
          initialCountry: "us",
          separateDialCode: true,
          preferredCountries: ["fr", "us", "gb"],
          geoIpLookup: function (callback) {
              $.get('https://ipinfo.io', function () {
              }, "jsonp").always(function (resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
              });
          },
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
      });

      var hiden_phone = document.querySelector("#hiden");
      window.intlTelInput(hiden_phone,{
          initialCountry: "us",
          dropdownContainer: 'body',
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
      });

      var reset = function() {
          phone.classList.remove("error");
          errorMsg.innerHTML = "";
          errorMsg.classList.add("hide");
          validMsg.classList.add("hide");
      };

      var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);

      $(document).ready(function () {
          $('#phone').mask(mask1)
      });

      $("#phone").on("countrychange", function (e, countryData) {
         $("#phone").val('');
         // var mask1 = $("#phone").attr('placeholder').replace(/[0-9]/g, 0);
         $('#phone').mask(mask1);

      });

      // on blur: validate
      phone.addEventListener('blur', function() {
      reset();
      if (phone.value.trim()) {
          if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
          } else {
          phone.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
          }
      }
      });

      $('input.hide').parent().hide();

      // on keyup / change flag: reset
      phone.addEventListener('change', reset);
      phone.addEventListener('keyup', reset);

      $('#submit-btn').on('click',function(e){
         e.preventDefault();
         if (iti.isValidNumber()) {
               var country_data=iti.getSelectedCountryData();
               
               document.getElementById("hiden").value = JSON.stringify(country_data);
      
               $('#user__form').submit();
         } else {
               phone.classList.add("error");
               var errorCode = iti.getValidationError();
               errorMsg.innerHTML = errorMap[errorCode];
               errorMsg.classList.remove("hide");
               $('html, body').animate({
                  scrollTop: $("#phone-div").position().top
               }, 800);
               return false;
         }
      })

  </script>
  {{-- end input phone setting --}}
  {{-------------------------}}

@endsection
