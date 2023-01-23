@extends('backend.layouts.app')
{{-- {{ dd($contents) }} --}}
@section('styles')
<!--Third party Styles(used by this page)--> 
<link href="{{asset('backend/assets/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('backend/assets/css/tagsinput.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

   .select2-selection--multiple{
      border: 1px solid #e2e5ec !important;
   }

   .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice .select2-selection__choice__remove {
      color: #ffffff;
   }

   .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
      color: #ffffff;
      background: #4a8de7;
      border: 1px solid #ebedf2;
   }

   .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 16px;
   }

   .select2-container .select2-selection--single{
      height: 38px;
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
                     Add Item
                  </h3>
               </div>
            </div>
            <!--begin::Form-->
            @php 
            $route = route('backend.menu.store');
            if(isset($item)){
            $route = route('backend.menu.update',$item->id);
            }
            @endphp
            <form action="{{$route}}" method="POST" id="user-content-form" enctype="multipart/form-data" class="kt-form">
               @csrf
               @if(isset($item))
               {{ method_field('PATCH') }}
               @endif
               <div class="kt-portlet__body">
                  <div class="row">
                     <div class="col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <br />

                        <div class="form-group">
                           <label class="col-md-12">Add Category</label>
                           <div class="col-md-12">
                           <select class="form-control multi-role" name="category_id">
                              <option value="">Select category</option>
                              @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}" {{isset($item)&& $item->category()->exists() && $item->category->first()->id==$cat->id?'selected' : ''}}>{{$cat->category_name}}</option>
                              @endforeach
                           </select>
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Title</label>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="text" class="form-control" name="title" value="{{isset($item)?$item->title : ''}}"/> 
                              @error('title')
                                  <div class="error">{{$message}}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Description</label>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="text" class="form-control" name="description" value="{{isset($item)?$item->description : ''}}"/> 
                              @error('description')
                                  <div class="error">{{$message}}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Price</label>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="number" class="form-control" name="price" value="{{isset($item)?$item->price : ''}}"/> 
                              @error('price')
                                  <div class="error">{{$message}}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-sm-3 col-xs-12">Image</label>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="file" class="form-control" name="image"/>
                              @error('image')
                                  <div class="error">{{$message}}</div>
                              @enderror
                           </div>
                        </div>
                        
                        {{-- <div class="form-group mt-3">
                           <div class="col-md-12 col-sm-12 col-xs-12">
							         <textarea name="description" id="summernote" class="summernote">{!!isset($item)?html_entity_decode($item->description) : ''!!}</textarea>
                           </div>
                        </div> --}}

                        <div class="form-group">
                           <div class="col-md-12 col-sm-9 col-xs-12">
                              <button type="submit" {{-- onclick="formSubmitWithTextEditor('editor-post_content','long_desc','post-content-form')" --}} class="btn btn-info btn-xs" role="button" style="font-size:13px" ><b>Save</b></button>
                              
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
<script src="{{asset('backend/assets/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="{{asset('backend/assets/plugins/summernote/summernote.active.js')}}"></script>
<script src="{{ asset('backend/assets/js/tagsinput.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

   $(document).ready(function(){

      $('.multi-role').select2();

      @if(isset($item) && $item->category()->exists())
         var cat_id={!!$item->category->id!!};
         
         $('[name="category_id"]').val(cat_id);
         $('[name="category_id"]').trigger('change');
      @endif

		$(".taginput").tagsinput({
			maxTags: 5,
		})
		
	})
   
</script>
@endsection