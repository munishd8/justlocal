

<div class="row">
    
    <div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Planning Application</h3>
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
 <form wire:submit.prevent="savePlanningApplication">
    @csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text"  wire:model="name" class="form-control" placeholder="Name">
        @error('name')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>



<div class="form-group">
<label for="exampleInputEmail1">Details</label>
<div class="card-body-wapper">
<div wire:ignore>
                                        <textarea data-note="@this" wire:model.defer="details" class="form-control @error('details') is-invalid @enderror" rows="5" id="editornote1"></textarea>
                                    </div>
                                     </div>
                                     @error('details')
                                    <span style="padding-left: 0;color: red;font-size: 14px;"
                                        id="text-error" class="alert error">* {{ $message }}</span>
                                @enderror

</div>

<div class="form-group">
    <label for="exampleInputEmail1">Applicant Name</label>
    <input type="text"  wire:model="applicant_name" class="form-control" placeholder="Applicant Name">
    @error('applicant_name')
    <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Planning Reference</label>
        <input type="text"  wire:model="planning_reference" class="form-control" placeholder="Planning Reference">
        @error('planning_reference')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Registration Date</label>
        <input type="date" wire:model="registration_date" 
        class="form-control" placeholder="Registration Date">
        @error('registration_date')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Due date to submit observations</label>
            <input type="date" wire:model="due_submit_date" 
            class="form-control" placeholder="Due date to submit observations">
            @error('due_submit_date')
            <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
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
                                @error('image')
                                <span style="padding-left: 0;color: red;font-size: 14px;"
                                    id="image-error" class="alert error">* {{ $message }}</span>
                                @enderror
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

</div>

</div>


</div>
   
  


</form>
    
  

</div>

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editornote1'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('details', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
   

     @endsection