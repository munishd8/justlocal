<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Local Eat</h3>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="editLocalEat">
                    {{-- <form wire:submit.prevent="saveContact"> --}}
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Name">
                                @error('name')
                                <span style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message
                                    }}</span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <div class="card-body-wapper">
                                    <div wire:ignore>
                                        <textarea data-note="@this" wire:model.defer="description"
                                            class="form-control @error('description') is-invalid @enderror" rows="5"
                                            id="editornote1">{{ $description }}</textarea>
                                    </div>
                                </div>
                                @error('description')
                                <span style="padding-left: 0;color: red;font-size: 14px;" id="text-error"
                                    class="alert error">* {{ $message }}</span>
                                @enderror

                            </div>




                            <div class="form-group">
                                <label for="exampleInputEmail1">Link</label>
                                <input type="text" wire:model="link" class="form-control" placeholder="Link">
                                @error('link')
                                <span style="padding-left: 0;color: red;font-size: 14px;" class="error">{{ $message
                                    }}</span>
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
                                <span style="padding-left: 0;color: red;font-size: 14px;" id="image-error"
                                    class="alert error">* {{ $message }}</span>
                                @enderror
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
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                    @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
</script>


@endsection