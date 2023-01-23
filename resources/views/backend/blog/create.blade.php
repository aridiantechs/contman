
@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('backend/assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">

<link href="{{asset('backend/assets/vendors/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('backend/assets/vendors/summernote/summernote-bs4.css')}}" rel="stylesheet">
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
                    <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Forms</a>
                    <span class="breadcrumb-item active">Add New Company</span>
                </nav>
            </div>
        </div>
        @include('backend.partials.errors')
        @php 
            $route = route('backend.blog.store');
            if(isset($blog)){
                $route = route('backend.blog.update',$blog->id);
            }
        @endphp
        <form method="post" action="{{$route}}" enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
               {{ method_field('PATCH') }}
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                           <br />
                           <div class="form-group">
                              <label class="col-md-3 col-sm-3 col-xs-12">Add Title</label>
                              <div class="col-md-11 col-sm-11 col-xs-12">
                                 <input type="text" class="form-control" name="title" value="{{ old('title') ?? ( isset($blog) ? $blog->title : '' )}}"/> 
                                  @error('title')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                             
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-sm-3 col-xs-12">Add Slug</label>
                              <div class="col-md-11 col-sm-11 col-xs-12">
                                 <input type="text" class="form-control" name="slug" value="{{old('slug') ?? (isset($blog) ? $blog->slug : '')}}"/> 
                                 @error('slug')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-sm-3 col-xs-12">Short Description</label>
                              <div class="col-md-11 col-sm-11 col-xs-12">
                                 <input type="text" class="form-control" name="short_desc"  value="{{isset($blog)?$blog->short_desc : ''}}"/> 
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <div class="col-md-11 col-sm-11 col-xs-12">
                                        <textarea name="long_desc" id="summernote" class="summernote">
                                    {!!isset($blog)?html_entity_decode($blog->long_desc) : ''!!}</textarea>
                                    @error('long_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                           
                           <div class="form-group">
                               <h3 class="col-md-12 col-sm-3 col-xs-12">Categories</h3>
                              <div class="col-md-12 col-sm-9 col-xs-12">
                                <select class="select2" id="company_empls" name="blog_cat[]" multiple="multiple">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name ?? ''}}</option>
                                    @endforeach
                                </select>
                                 @error('blog_cat')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>
                           
                           <div class="form-group">
                               <h3 class="col-md-12 col-sm-12 col-xs-12">Image</h3>
                               <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                   <div class="row">
                                       <div class="col-xs-12 col-md-12">
                                           <a href="#" class="thumbnail">
                                           <img width="200" src="{{ asset(isset($blog) && $blog->image ? $blog->image : 'backend/assets/images/rec2.jpg') }}" id="cat_image" alt="...">
                                           </a>
                                       </div>
                                   </div>
                                   <input type="file" onchange="changeImageView(this, 'cat_image',250000)" name="image" class="form-control">
                                   <sm><code>Image size should be 720 x 660 Pixels</code></sm>
                               </div>
   
                         @error('image')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                               <br>
                           </div>
                           <div class="ln_solid"></div>
                           <div class="form-group">
                              <div class="col-md-12 col-sm-9 col-xs-12">
                                 <button type="submit" style="background-color: #5867dd;" class="btn btn-primary btn-xs" role="button" style="font-size:13px" ><b>Save</b></button>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                </div>
            </div>

            {{-- <div class="card">
                <div class="card-body">

                    <button class="btn btn-default m-r-15">Save</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div> --}}

        </form>

    </div>
    <!-- Content Wrapper END -->

@endsection
@section('scripts')
    <script src="{{asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-elements.js')}}"></script>
    
    <script src="{{asset('backend/assets/vendors/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/summernote/summernote-bs4.min.js')}}"></script>
    <!--Page Active Scripts(used by this page)-->
    <script src="{{asset('backend/assets/vendors/summernote/summernote.active.js')}}"></script>
    <script>
        $(document).ready(function() {

            @if(isset($blog) && $blog->categories()->count())
                $('#company_empls').val( {!!$blog->categories->pluck('cat_id')->toJson()!!} );
                $('#company_empls').trigger('change');
            @endif
        });

        function changeImageView(input, id,max_size) {
   
            var FileUploadPath = input.value;
            
            if (FileUploadPath == '') {
                alert("Please upload an image");
            
            } 
            else 
            {
                var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (Extension == "jpg" || Extension == "png")
                {
                    if (input.files && input.files[0]) {
                        var size = input.files[0].size;
                        
                        // if(size > max_size){
                        //     alert("Maximum file size exceeds");
                        //     return;
                        // }else{
                            var reader = new FileReader();
                            /* alert(input.files[0].size); */
                            reader.onload = function (e) {
                                $('#'+id).attr('src', e.target.result).fadeIn('slow');
                            }
                            reader.readAsDataURL(input.files[0]);
                        // }
                    }
                }
                else{
                    alert("Photo only allows file types of GIF, PNG");
                }
                
            }   
            // alert('');
        }
    </script>
@endsection
