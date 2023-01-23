<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{isset($cat_data) ? 'Update': 'Create'}} Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
    </div>
    @php
    if (isset($cat_data)) {
        $route=route('backend.category.update',$cat_data->id);
    } else {
        $route=route('backend.category.store');
    }
    
    @endphp
    <form action="{{$route}}" method="POST">
        @csrf
        
        @if (isset($cat_data))
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="kt-scroll" data-scroll="true">
                    
                <div class="form-group">
                    <label class="form-control-label">Category Type:</label>
                    <select name="category_type" id="" class="form-control" disabled>
                        {{-- <option value="">Select Category Type</option> --}}
                        <option value="product" {{isset($cat_data) && $cat_data->category_type == 'product' ? 'selected': ''}}>Product</option>
                        <option value="blog" {{isset($cat_data) && $cat_data->category_type == 'blog' ? 'selected': ''}}>Blog</option>
                    </select>
                    @error('category_type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? ($cat_data->category_name ?? '')}}"/>
                    @error('name')
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