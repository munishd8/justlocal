

<div class="row">
    
    <div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Restaurant</h3>
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
 <form wire:submit.prevent="saveRestaurant">
    {{-- <form wire:submit.prevent="saveContact"> --}}
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
<label for="exampleInputEmail1">Address</label>
<div class="card-body-wapper">
<div wire:ignore>
                                        <textarea data-note="@this" wire:model.defer="address" class="form-control @error('address') is-invalid @enderror" rows="5" id="editornote1"></textarea>
                                    </div>
                                     </div>
                                     @error('address')
                                    <span style="padding-left: 0;color: red;font-size: 14px;"
                                        id="text-error" class="alert error">* {{ $message }}</span>
                                @enderror

</div>

<div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text"  wire:model="phone" class="form-control" placeholder="Phone">
    @error('phone')
    <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email"  wire:model="email" class="form-control" placeholder="Email">
        @error('email')
        <span  style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message }}</span>
        @enderror
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Website</label>
            <input type="text"  wire:model="website" class="form-control" placeholder="Website">
            @error('website')
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
</form>
</div>

</div>

</div>


</div>
   
  



    
  

</div>

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editornote1'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('address', editor.getData());
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