<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{isset($cat_data) ? 'Update': 'Create'}} Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
    </div>
    @php
    if (isset($cat_data)) {
        $route=route('backend.banner.update',$cat_data->id);
    } else {
        $route=route('backend.banner.store');
    }
    
    @endphp
    <form action="{{$route}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if (isset($cat_data))
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="kt-scroll" data-scroll="true">
                    
                <div class="form-group">
                    <label class="form-control-label">Upload banner</label>
                    <input type="file" class="form-control" name="image"/>

                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">{{isset($cat_data) ? 'Update': 'Create'}}</button>
        </div>
    </form>
</div>