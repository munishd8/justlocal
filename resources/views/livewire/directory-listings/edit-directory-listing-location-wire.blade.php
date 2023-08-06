<div class="col-md-10">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Edit- {{ $name }}</h3>
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
     <form wire:submit.prevent="updateLocation">
        @csrf
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
      @error('name')
    <span style="padding-left: 0;color: red;font-size: 14px;"
        id="name-error" class="alert error">* {{ $message }}</span>
    @enderror
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Parent Location</label>
    <select wire:model="parent_location" class="form-control">
    @forelse($directoryListingLocations as $location)
    <option value="{{ $location->id }}">{{ $location->name }}</option>
    @empty
    <option value="none">None</option>
    @endforelse
    </select>
      @error('parent_location') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
       <div class="card-body-wapper">
      <div wire:ignore>
                                              <textarea data-note="@this" wire:model.defer="description" class="form-control" rows="5" id="editornote1">
                                                {{ $description }}
                                              </textarea>
                                          </div>
                                           </div>
                                           @error('description')
                                          <span style="padding-left: 0;color: red;font-size: 14px;"
                                              id="text-error" class="alert error">* {{ $message }}</span>
                                      @enderror
      
      </div>
    
      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" wire:model="image" 
                    id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3 card me-1 mb-1">
                <img src="{{ asset('upload/'.$img) }}">
            </div>
        </div>
        @if ($image)
            Photo Preview:
            <div class="row">
                <div class="col-3 card me-1 mb-1">
                    <img src="{{ $image->temporaryUrl() }}">
                </div>
            </div>
        @endif
        
    
    </div>
    
    </div>
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
    
    </div>
    
    
    </div>
    
    @section('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#editornote1'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection