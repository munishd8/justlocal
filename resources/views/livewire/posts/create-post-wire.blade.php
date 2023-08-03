

<div class="row">
    
    <div class="col-md-8">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Post</h3>
</div>
 
<div class="card-body">
        @if ($successMessage)
    <div class="alert alert-warning alert-dismissible fade show"  role="alert">
   {{ $successMessage }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
 <form wire:submit.prevent="save">
    @csrf
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text"  wire:model="title" class="form-control" id="exampleInputEmail1" placeholder="Title">
@error('title')
<span style="padding-left: 0;color: red;font-size: 14px;"
    id="name-error" class="alert error">* {{ $message }}</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Content</label>
{{-- <textarea wire:model="content" id="editor" class="form-control   @error('content') is-invalid @enderror"   rows="3" placeholder="Enter Content"></textarea> --}}
 <div class="card-body-wapper">
<div wire:ignore>
                                        <textarea data-note="@this" wire:model.defer="content" class="form-control @error('content') is-invalid @enderror" rows="5" id="editornote1"></textarea>
                                    </div>
                                     </div>
                                     @error('content')
                                    <span style="padding-left: 0;color: red;font-size: 14px;"
                                        id="text-error" class="alert error">* {{ $message }}</span>
                                @enderror

</div>
<div class="form-group">
<label for="exampleInputEmail1">Excerpt</label>
<textarea wire:model="excerpt" class="form-control"   rows="3" placeholder="Enter Excerpt"></textarea>
</div>

<div class="form-group">
    <label for="exampleInputFile">Featured Post</label>
    <div class="input-group">
        <div class="icheck-primary d-inline">
            <input type="checkbox" id="is_featured" wire:model="is_featured" value="1">
            <label for="is_featured">Yes
            </label>
            </div>
</div>
</div>
{{-- <div class="form-group">
<label for="exampleInputEmail1">Featured Post</label>
{{-- <input type="checkbox"  wire:model="is_featured" class="form-control" id="exampleInputEmail1" value="1">  --}}
{{-- <div class="form-check">
<input class="form-check-input" wire:model="is_featured" value="1" type="checkbox">
<label class="form-check-label">Yes</label>
</div> --}}
{{-- </div> --}} 
                            <div class="form-group">
                                <label for="exampleInputFile">Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" wire:model="images" multiple
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('images')
                                <span style="padding-left: 0;color: red;font-size: 14px;"
                                    id="image-error" class="alert error">* {{ $message }}</span>
                                @enderror
                                @if ($images)
                                    Photo Preview:
                                    <div class="row">
                                        @foreach ($images as $image)
                                        <div class="col-3 card me-1 mb-1">
                                            <img src="{{ $image->temporaryUrl() }}">
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                                

                            </div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</div>

</div>


</div>
    <div class="col-md-4">
        <div class="card card-widget">
            <div class="card-header">
            <div class="user-block">
            <h5>All Categories</h5>
            </div> <!--user-block-->
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            </div><!--card-tools-->
            </div><!--card-header-->
            
            <div class="card-body" style="display: block;">
                @forelse($postCategories as $key => $category)
<div class="form-group mb-2">
<div class="icheck-primary d-inline">
    <input type="checkbox" id="{{ $category->name }}{{ $key }}" wire:model="categories" value="{{ $category->id }}">
    <label style="font-weight: 500;" for="{{ $category->name }}{{ $key }}">{{ $category->name }}
    </label>
    </div>
</div>
@empty

@endforelse  
            </div><!---card-body--> 
        </form>
            </div>    <!---card-body-->    
    {{-- <div class="card"> --}}
        {{-- <div class="card-header">
<h3 class="card-title">All Categories</h3>
</div> --}}
{{-- <div class="card-body">
    <div class="form-group">
{{-- @forelse($postCategories as $category)
{{-- <div class="form-check">
<input class="form-check-input" wire:model="categories" value="{{ $category->id }}" type="checkbox">
<label class="form-check-label">{{ $category->name }}</label>
</div> --}}
{{-- @empty

{{-- @endforelse --}}
{{-- </div> --}}
{{-- </div> --}}

    {{-- </div> --}}
    </div>

</div>

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editornote1'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection