<div class="row">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Edit Restaurant - {{ $name }}</h3>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="updateRestaurant">
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
                                        <textarea data-note="@this" wire:model.defer="address" class="form-control @error('address') is-invalid @enderror" rows="5" id="editornote1">{{ $address }}</textarea>
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
                       
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Featured Post</label>
                            {{-- <input type="checkbox" wire:model="is_featured" class="form-control"
                                id="exampleInputEmail1" value="1"> --}}
                            {{-- <div class="form-check">
                                <input class="form-check-input" wire:model="is_featured" value="1" type="checkbox">
                                <label class="form-check-label">Yes</label>
                            </div> --}}
                            {{--
                        </div> --}}

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
                </div>
                <!--user-block-->
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!--card-tools-->
            </div>
            <!--card-header-->
            <div class="card-body" style="display: block;">
            @forelse($restaurantCategories as $key => $category)
                
                <div class="form-group mb-2">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="{{ $category->name }}{{ $key }}" wire:model="categories" value="{{ $category->id }}">
                    <label style="font-weight: 500;" for="{{ $category->name }}{{ $key }}">{{ $category->name }}
                    </label>
                </div>
                @forelse($category->children as $key1 => $children)
                <div class="icheck-primary" style="margin-left: 15px;">
                    <input type="checkbox" id="{{ $children->name }}{{ $key1 }}" wire:model="categories" value="{{ $children->id }}">
                    <label style="font-weight: 500;" for="{{ $children->name }}{{ $key1 }}">{{ $children->name }}
                    </label>
                
                </div>
                @empty
                    @endforelse 
                
                </div>
                @empty
                
                @endforelse 
            </div>
            <!---card-body-->
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
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
</script>
@endsection