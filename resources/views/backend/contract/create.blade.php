
@extends('backend.layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" />
<style>

    .select2-container {
        display: block;
    }
    .select2-container-multi .select2-choices {
        min-height: 2.5375rem;
        border: 1px solid #edf2f9;
        background-image: none;
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

    /* upload css */
    .file-block {
        border-radius: 10px;
        background-color: rgba(144, 163, 203, 0.2);
        margin: 5px;
        color: initial;
        display: inline-flex;
    }
    .file-block > span.name {
        padding: 4px;
        width: max-content;
        display: inline-flex;
    }
    .file-delete {
        display: flex;
        width: 34px;
        color: initial;
        background-color: #6eb4ff 0;
        font-size: large;
        justify-content: center;
        cursor: pointer;
    }
    .file-delete:hover {
        background-color: rgba(144, 163, 203, 0.2);
        border-radius: 10px;
    }
    .file-delete > span {
        transform: rotate(45deg);
    }
 
    /* Dropzone */
    .card-upload {
        background-color: #fff;
        width: 500px;
        border-radius: 0.5rem;
        box-shadow: 0px 5px 20px rgba(49, 104, 146, .25);
    }
    .card-upload .card-body {
        padding: 3.5rem 1.25rem;
    }
    .card-upload .card-body .card-title {
        color: #1689ff;
        font-size: 1.25rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 0.25rem;
    }
    .card-upload .card-body .card-subtitle {
        color: #777;
        font-weight: 500;
        text-align: center;
    }
    .file-upload {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 2rem 1.5rem;
        border: 3px dashed #9dceff;
        border-radius: 0.5rem;
        transition: background-color 0.25s ease-out;
    }
    .file-upload:hover {
        background-color: #dbedff;
    }
    .file-upload .file-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        outline: none;
        cursor: pointer;
    }
    .icon {
        width: 75px;
        margin-bottom: 1rem;
    }
    @media (max-width: 600px) {
        .icon {
            width: 50px;
        }
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
                    <a href="{{ route('backend.user.index')}}" class="breadcrumb-item">Contracts</a>
                    <span class="breadcrumb-item active">Add Contract</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-18">Add a Contract</h4>
            </div>
            <div class="card-body">
                @include('backend.partials.errors')
                @php 
                  $route = route('backend.contract.store');
                  if(isset($contract)){
                     $route = route('backend.contract.update',$contract->id);
                  }
               @endphp
                <form action="{{$route}}" id="contract__form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="form-row">
                        
                        <div class="form-group col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Upload your file here ( max 10mb)</div>
                                    <div class="file-upload">
                                        <input class="file-input" type="file" name="file[]" accept=".pdf" id="attachment" multiple>
                                        <img src="{{asset('backend/assets/images/file-upload.png')}}" alt="">
                                        <div class="card-subtitle mt-2">Drag n Drop your file here</div>                   
                                    </div>
                                    
                                    <p id="files-area">
                                        <span id="filesList">
                                            <span id="files-names"></span>
                                        </span>
                                    </p>
                                </div>
                            </div>
        
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
   
   $(document).ready(function(){
    
   })

</script>

<script>
    const dt = new DataTransfer();

    $("#attachment").on('change', function(e){
        for(var i = 0; i < this.files.length; i++){
            let fileBloc = $('<span/>', {class: 'file-block'}),
                fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
            fileBloc.append('<span class="file-delete"><span>+</span></span>')
                .append(fileName);
            $("#filesList > #files-names").append(fileBloc);
        };
        // Ajout des fichiers dans l'objet DataTransfer
        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;

        // EventListener pour le bouton de suppression créé
        $('span.file-delete').click(function(){
            let name = $(this).next('span.name').text();
            // Supprimer l'affichage du nom de fichier
            $(this).parent().remove();
            for(let i = 0; i < dt.items.length; i++){
                // Correspondance du fichier et du nom
                if(name === dt.items[i].getAsFile().name){
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            document.getElementById('attachment').files = dt.files;
        });
    });
</script>

@endsection
