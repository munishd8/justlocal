<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Category</h3>
</div>
 
<div class="card-body">
    @if ($successMessage)
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
@endif
 <form wire:submit.prevent="saveCategory">
    @csrf
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text"  wire:model="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Name">
  @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Parent Category</label>
<select wire:model="parent_category" class="form-control  @error('parent_category') is-invalid @enderror" >
@foreach($postCategories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select>
  @error('parent_category') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea wire:model="description" class="form-control   @error('description') is-invalid @enderror"   rows="3" placeholder="Enter Description"></textarea>
 @error('description') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
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
    @if($image)
        Photo Preview:
        <img height="100px" width="100px" src="{{ $image->temporaryUrl() }}">
    @endif
@error('image') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

</div>


</div>