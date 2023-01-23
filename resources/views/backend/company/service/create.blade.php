
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
                    <a href="{{isset($cs) ? route('backend.company.services',$cs->company_id) : ''}}" class="breadcrumb-item">Services</a>
                    <span class="breadcrumb-item active">Add service</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-18">Add Service</h4>
            </div>
            <div class="card-body">
                <div class="m-t-25">
                    {{-- show validation errors --}}
                    @include('backend.partials.errors')
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($cs)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-md-12">
                                <div class="radio m-b-30">
                                    <span><input id="radio1" name="type" type="radio" value="one_time" {{ old('type')=="one_time" || (isset($cs) && $cs->type =='one_time') ? 'checked' : ''}}>
                                    <label class="m-{{$alignShort}}-50" for="radio1">One time</label></span>
                                    <span><input id="radio2" name="type" value="stay_in" type="radio" {{ old('type')=="stay_in" || isset($cs) && $cs->type =='stay_in' ? 'checked' : ''}}>
                                    <label for="radio2">Stay in </label></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-semibold" for="language">Choose a service</label>

                                <div class="m-b-15">
                                    <select id="service" class="form-control" name="service">
                                        @foreach ($services as $service)
                                            @php
                                                $s_sel= old('service')==$service->id || (isset($cs) && $cs->service==$service->id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{$service->id}}" {{$s_sel}}>{{$service->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Service Price</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') ?? (isset($cs) ? $cs->price : '')}}" placeholder="Service Price">
                            </div>
                            <div class="col-md-4">
                                <label class="font-weight-semibold" for="language">Workers</label>

                                <div class="m-b-15">
                                    <select class="select2" id="company_empls" name="employees[]" multiple="multiple">
                                        @foreach ($employees as $emp)
                                            <option value="{{$emp->id}}">{{$emp->user->first_name ?? ''}} {{$emp->user->last_name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber">Service Time</label>
                                <select class="form-control" name="shift">
                                    <option value="day" {{ old('shift')=='day' || (isset($cs) && $cs->shift =='day') ? 'selected' : ''}}>Day</option>
                                    <option value="night" {{ old('shift')=="night" || (isset($cs) && $cs->shift =='night') ? 'selected' : ''}}>Night</option>
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="phoneNumber"> Visit Duration</label>
                                <select class="form-control" name="duration">
                                    <option value="3" {{isset($cs) && $cs->duration =='3' ? 'selected' : ''}}>3 Hours</option>
                                    <option value="4" {{isset($cs) && $cs->duration =='4' ? 'selected' : ''}}>4 Hours</option>
                                    <option value="5" {{isset($cs) && $cs->duration =='5' ? 'selected' : ''}}>5 Hours</option>
                                </select>
                            </div> --}}
                            <div class="form-group col-md-12">
                                <label class="font-weight-semibold" for="phoneNumber">Service Description</label>
                                <textarea class="form-control" name="description">{{ old('description') ?? (isset($cs) ? $cs->description : '')}}</textarea>

                                <button type="submit" class="btn btn-primary m-t-30">Add Service</button>
                            </div>
                        </div>
                    </form>
                </div>

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
    <script>
        $(document).ready(function() {
            console.log({!!collect(old('employees'))->toJson() !!});
            //set default select2 option
            @if(isset($cs) && $cs->employees()->count())
                $('#company_empls').val( {!!$cs->employees()->pluck('ce_id')->toJson()!!} );
                $('#company_empls').trigger('change');
            @elseif(old('employees'))
                $('#company_empls').val( {!!collect(old('employees'))->toJson()!!});
                $('#company_empls').trigger('change');
            @endif
        });
    </script>
@endsection
