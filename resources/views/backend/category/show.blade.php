@extends('backend.layouts.app')
@section('meta')
<title>{{ app_name() }} | Dashboard</title>

@section('styles')
<link href="{{ asset('backend/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">

.location-details
{
    font-size: 14px;
    font-weight: 600;
    color: #4f4f4f;
    margin-bottom: 2rem
}

</style>
@endsection

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title jumper-primary-title">
                    Inquiry Details
                </h3>
            </div>
            
        </div>
        <div class="kt-portlet__body">
                
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-sm-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2704.002849783378!2d-95.02256773624204!3d36.478312346447986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c9d52824500a9d%3A0x88a060dbe98bf42b!2sMax%20Motorsports!5e1!3m2!1sen!2s!4v1604758971880!5m2!1sen!2s" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                     <div class="col-sm-3">
                        <div class="locaion-d">
                            <h4>Location: </h4>
                            <p class="ml-4 location-details">Max Motorsports, W. Main, Disney, OK, USA</p>
                            <h4>Lotitude: </h4>
                            <p class="ml-4 location-details">37.65152</p>
                            <h4>Longitude: </h4>
                            <p class="ml-4 location-details">42.65152</p>
                            <h4>City: </h4>
                            <p class="ml-4 location-details">W. Main</p>
                            <h4>Zip: </h4>
                            <p class="ml-4 location-details">654132</p>
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="locaion-d">
                            <h4>Name: </h4>
                            <p class="ml-4 location-details">Max Motorsports, W. Main, Disney, OK, USA</p>
                            <h4>Email: </h4>
                            <p class="ml-4 location-details">37.65152</p>
                            <h4>Phone: </h4>
                            <p class="ml-4 location-details">42.65152</p>
                        </div>
                    </div>
                     <div class="col-sm-2">
                        <div class="locaion-d">
                            <h4>Previous Report File: </h4>
                            <p class="ml-0">
                                <a href="" class="btn btn-primary">Download</a>
                            </p>
                            <h4>Images of house: </h4>
                            <p class="ml-0">
                                <a href="#" class="kt-media kt-media--xl">
                                    <img src="{{ url('/') }}/images/home-protection.jpg" alt="image">
                                </a>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
                    
    </div>
</div>
@endsection


@section('scripts')
<!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('backend/assets/js/demo1/pages/crud/datatables/extensions/select.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->
@endsection