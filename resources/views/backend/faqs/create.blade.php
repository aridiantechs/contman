@extends('backend.layouts.app')
{{-- {{ dd($contents) }} --}}
@section('styles')
<!--Third party Styles(used by this page)--> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<style>
   .form-group label {
   font-size: 1.2rem;
   }

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
   tags.tagify{
         height: unset !important;
   }
</style>
@endsection
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="row">
      <div class="col-md-12">
         <!--begin::Portlet-->
         <div class="kt-portlet">
            <div class="kt-portlet__head">
               <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                     {{isset($faq) ? 'Update' : 'Create'}} Faq
                  </h3>
               </div>
            </div>
            @if($errors->any())
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
               @endforeach
            @endif

            <!--begin::Form-->
            @php 
            $route = route('backend.faqs.store');
            if(isset($faq)){
               $route = route('backend.faqs.update',$faq->id);
            }
            @endphp
            <form action="{{$route}}" method="POST" id="user-content-form" enctype="multipart/form-data" class="kt-form">
               @csrf
               @if(isset($faq))
                  @method('PUT')
               @endif
               <div class="kt-portlet__body">
                  <div class="row">
                     <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <br />

                        <div class="row">
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" name="title" value="{{isset($faq)?$faq->title : ''}}"/> 
                                 
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Description</label>
                                 <input type="text" class="form-control" name="description" value="{{isset($faq)?$faq->description : ''}}"/> 
                                 
                              </div>
                           </div>
                        </div>
                        
                        {{-- <div class="form-group mt-3">
                           <div class="col-md-12 col-sm-12 col-xs-12">
							         <textarea name="description" id="summernote" class="summernote">{!!isset($user)?html_entity_decode($user->description) : ''!!}</textarea>
                           </div>
                        </div> --}}

                        <div class="form-group">
                           <div class="col-md-12 col-sm-9 col-xs-12">
                              <button type="submit" class="btn btn-info btn-xs" style="font-size:13px" ><b>Save</b></button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->			
         </div>
         <!--end::Portlet-->
      </div>
   </div>
</div>
@endsection
@section('scripts')
<!-- Third Party Scripts(used by this page)-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://unpkg.com/@yaireo/tagify/dist/jQuery.tagify.min.js" type="text/javascript"></script>
<script type="text/javascript">

   
</script>
@endsection