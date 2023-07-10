

<div class="row">
    
    <div class="col-md-8">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Post</h3>
</div>
 
<div class="card-body">
        @if ($successMessage)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
<input type="text"  wire:model="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Title">
  @error('title') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Content</label>
<textarea wire:model="content" class="form-control   @error('content') is-invalid @enderror"   rows="3" placeholder="Enter Content"></textarea>
 @error('content') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputEmail1">Excerpt</label>
<textarea wire:model="excerpt" class="form-control"   rows="3" placeholder="Enter Excerpt"></textarea>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Featured Post</label>
{{-- <input type="checkbox"  wire:model="is_featured" class="form-control" id="exampleInputEmail1" value="1">  --}}
<div class="form-check">
<input class="form-check-input" wire:model="is_featured" value="1" type="checkbox">
<label class="form-check-label">Yes</label>
</div>
</div>
<div class="form-group">
<label for="exampleInputFile">Image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" wire:model="image" class="custom-file-input   @error('image') is-invalid @enderror" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>

</div>
<div class="input-group-append">
<span class="input-group-text">Upload</span>
</div>

</div>

@error('image') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</div>

</div>


</div>
    <div class="col-md-4">
        <div class="row">
        </div>
    <div class="card">
        <div class="card-header">
<h3 class="card-title">All Categories</h3>
</div>
<div class="card-body">
    <div class="form-group">
@forelse($postCategories as $category)
<div class="form-check">
<input class="form-check-input" wire:model="categories" value="{{ $category->id }}" type="checkbox">
<label class="form-check-label">{{ $category->name }}</label>
</div>
@empty

@endforelse
</div>
</div>
</form>
    </div>
    </div>

</div>