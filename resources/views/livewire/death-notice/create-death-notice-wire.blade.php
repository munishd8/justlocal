

<div class="row">
    
    <div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Death Notice</h3>
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
 <form wire:submit.prevent="saveDeathNotice">
    @csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text"  wire:model="title" class="form-control" placeholder="Title">
        @error('title')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>



<div class="form-group">
<label for="exampleInputEmail1">Content</label>
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
<label for="exampleInputEmail1">Date of Birth</label>
<input type="date" wire:model="date_of_birth" 
class="form-control" placeholder="Date of Birth">
@error('date_of_birth')
<span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
@enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Date of Death</label>
    <input type="date" wire:model="date_of_death" 
    class="form-control" placeholder="Date of Death">
    @error('date_of_death')
    <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Notice Date</label>
        <input type="date" wire:model="notice_date" 
        class="form-control" placeholder="Notice Date">
        @error('notice_date')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Notice link</label>
            <input type="text"  wire:model="notice_link" class="form-control"  placeholder="Notice Link">
            @error('notice_link')
            <span style="padding-left: 0;color: red;font-size: 14px;"
                id="name-error" class="alert error">* {{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input type="text"  wire:model="link" class="form-control"  placeholder="Link">
                @error('link')
                <span style="padding-left: 0;color: red;font-size: 14px;"
                    id="name-error" class="alert error">* {{ $message }}</span>
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
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
     <script>
        // Initialize the datepicker
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
            $('#datepicker_death').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
            $('#datepicker_notice').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>

     @endsection