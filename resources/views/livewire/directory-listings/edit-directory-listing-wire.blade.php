

<div class="row">
    
    <div class="col-md-8">
<div class="card">
<div class="card-header">
<h3 class="card-title">Edit Directory Listing - {{ $title }}</h3>
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
 <form wire:submit.prevent="editListings">
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
                                        <textarea data-note="@this" wire:model.defer="content" class="form-control @error('content') is-invalid @enderror" rows="5" id="editornote1">{{ $content }}</textarea>
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
    @foreach ($listing_imgs as $img)
                            <div class="row mt-2">
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ asset('upload/'.$img->image) }}">
                                    <a class="btn btn-danger" wire:click="deleteImage({{ $img->id }})">Delete</a>
                                </div>
                            </div>                                
                            @endforeach
                            
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
    @if ($failMessage)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $failMessage }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
    

</div>

<div class="card card-widget">
    <div class="card-header">
    <div class="user-block">
    <h5><b>Featured Posts</b></h5>
    </div> <!--user-block-->
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div><!--card-tools-->
    </div><!--card-header-->
    
    <div class="card-body" style="display: block;">
        
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="checkbox" id="is_card_view_featured" wire:model="is_card_view_featured" value="1">
                <label for="is_card_view_featured">Card View
                </label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Upload Card</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" wire:model="card"
                            id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @isset($old_card)
                <div class="row mt-2">
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ asset('upload/'.$old_card) }}">
                                </div>
                            </div>  
@endisset
                @error('card')
                <span style="padding-left: 0;color: red;font-size: 14px;"
                    id="image-error" class="alert error">* {{ $message }}</span>
                @enderror
                @if ($card)
                    Photo Preview:
                    <div class="row">
                        <div class="col-3 card me-1 mb-1">
                            <img src="{{ $card->temporaryUrl() }}">
                        </div>
                    </div>
                @endif
            </div>

                {{-- <div class="form-group"> --}}
                    {{-- <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2" wire:model="is_local_support_view_featured" value="1">
                        <label for="checkboxPrimary2">Local Support View
                        </label>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="is_local_support_view_featured" wire:model="is_local_support_view_featured" value="1">
                            <label for="is_local_support_view_featured">Local Support View
                            </label>
                            </div>
                        </div>
    
                <div class="form-group">
                    <label for="exampleInputFile">Local Support Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" wire:model="local_support_image"
                                id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @isset($old_local_support_image)
                <div class="row mt-2">
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ asset('upload/'.$old_local_support_image) }}">
                                </div>
                            </div>  
@endisset
                    @error('local_support_image')
                    <span style="padding-left: 0;color: red;font-size: 14px;"
                        id="image-error" class="alert error">* {{ $message }}</span>
                    @enderror
                    @if ($local_support_image)
                        Photo Preview:
                        <div class="row">
                            <div class="col-3 card me-1 mb-1">
                                <img src="{{ $local_support_image->temporaryUrl() }}">
                            </div>
                        </div>
                    @endif
                </div><!--form-group-->

    </div><!---card-body--> 

    </div>    <!---card-body-->     
    
    <div class="card card-widget">
        <div class="card-header">
        <div class="user-block">
        <h5><b>Contact Information</b></h5>
        </div> <!--user-block-->
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        </div><!--card-tools-->
        </div><!--card-header-->
        
        <div class="card-body" style="display: block;">
            <div class="form-group">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="hide_contact" wire:model="hide_contact" value="1">
                    <label for="hide_contact">Hide contact owner form for single listing page
                    </label>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Zip/Post Code</label>
                    <input type="text"  wire:model="zip_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Zip/Post Code">
                    @error('zip_code')
                    <span style="padding-left: 0;color: red;font-size: 14px;"
                        id="name-error" class="alert error">* {{ $message }}</span>
                    @enderror
                    </div>
                        
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text"  wire:model="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                        @error('phone')
                        <span style="padding-left: 0;color: red;font-size: 14px;"
                            id="name-error" class="alert error">* {{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone 2</label>
                            <input type="text"  wire:model="phone_2" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                            {{-- @error('title')
                            <span style="padding-left: 0;color: red;font-size: 14px;"
                                id="name-error" class="alert error">* {{ $message }}</span>
                            @enderror --}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone 3</label>
                                <input type="text"  wire:model="phone_3" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                                {{-- @error('title')
                                <span style="padding-left: 0;color: red;font-size: 14px;"
                                    id="name-error" class="alert error">* {{ $message }}</span>
                                @enderror --}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone 4</label>
                                    <input type="text"  wire:model="phone_4" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                                    {{-- @error('title')
                                    <span style="padding-left: 0;color: red;font-size: 14px;"
                                        id="name-error" class="alert error">* {{ $message }}</span>
                                    @enderror --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fax</label>
                                        <input type="text"  wire:model="fax" class="form-control" id="exampleInputEmail1" placeholder="Enter Fax">
                                        @error('fax')
                                        <span style="padding-left: 0;color: red;font-size: 14px;"
                                            id="name-error" class="alert error">* {{ $message }}</span>
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text"  wire:model="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                            @error('email')
                                            <span style="padding-left: 0;color: red;font-size: 14px;"
                                                id="name-error" class="alert error">* {{ $message }}</span>
                                            @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Website</label>
                                                <input type="text"  wire:model="website" class="form-control" id="exampleInputEmail1" placeholder="Listing Website">
                                                @error('website')
                                                <span style="padding-left: 0;color: red;font-size: 14px;"
                                                    id="name-error" class="alert error">* {{ $message }}</span>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Excerpt</label>
                                                     <div class="card-body-wapper">
                                                    <div wire:ignore>
                                                                                            <textarea wire:model.defer="contact_excerpt" placeholder="Excerpt" class="form-control rows="5"></textarea>
                                                                                        </div>
                                                                                         </div>
                                                                                         @error('contact_excerpt')
                                                                                        <span style="padding-left: 0;color: red;font-size: 14px;"
                                                                                            id="text-error" class="alert error">* {{ $message }}</span>
                                                                                    @enderror
                                                    
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Extra Content</label>
                                                         <div class="card-body-wapper">
                                                        <div wire:ignore>
                                                        <textarea data-note="@this" wire:model.defer="contact_info_content" class="form-control @error('contact_info_content') is-invalid @enderror" rows="5" id="editornote2">{{ $contact_info_content }}</textarea>
                                        
                                                                                            </div>
                                                                                             </div>
                                                                                             @error('contact_info_content')
                                                                                            <span style="padding-left: 0;color: red;font-size: 14px;"
                                                                                                id="text-error" class="alert error">* {{ $message }}</span>
                                                                                        @enderror
                                                        
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Images</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" wire:model="contact_images" multiple
                                                                        id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                            @foreach ($contact_imgs as $img)
                            <div class="row mt-2">
                                <div class="col-3 card me-1 mb-1">
                                    <img src="{{ asset('upload/'.$img->image) }}">
                                    <a class="btn btn-danger" wire:click="deleteContactImage({{ $img->id }})">Delete</a>
                                </div>
                            </div>                                
                            @endforeach
                                                            @error('contact_images')
                                                            <span style="padding-left: 0;color: red;font-size: 14px;"
                                                                id="image-error" class="alert error">* {{ $message }}</span>
                                                            @enderror
                                                            @if ($contact_images)
                                                                Photo Preview:
                                                                <div class="row">
                                                                    @foreach ($contact_images as $contact_image)
                                                                    <div class="col-3 card me-1 mb-1">
                                                                        <img src="{{ $contact_image->temporaryUrl() }}">
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            @if ($contactFailMessage)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $contactFailMessage }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                                                            
                            
                                                        </div>
    
       
        
    
    
        </div><!---card-body--> 
    
        </div>    <!---card-body-->   

        <div class="card card-widget">
            <div class="card-header">
            <div class="user-block">
            <h5><b>Map</b></h5>
            </div> <!--user-block-->
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            </div><!--card-tools-->
            </div><!--card-header-->
            
            <div class="card-body" style="display: block;">
                
                <div class="form-group">
                    <label for="exampleInputEmail12">Address</label>
                     {{-- <div class="card-body-wapper"> --}}
                    {{-- <div> --}}
                    <div wire:ignore>
                                        <textarea data-note="@this" wire:model.defer="address" class="form-control @error('address') is-invalid @enderror" rows="5" id="editornote3">{{ $address }}</textarea>
                                    
                                                             </div>
                                                         {{-- </div> --}}
                                                         @error('address')
                                                        <span style="padding-left: 0;color: red;font-size: 14px;"
                                                            id="text-error" class="alert error">* {{ $message }}</span>
                                                    @enderror
                    
                    </div>
                  
            </div><!---card-body--> 
        
            </div>    <!---card-body-->    

            <div class="card card-widget">
                <div class="card-header">
                <div class="user-block">
                <h5><b>Video</b></h5>
                </div> <!--user-block-->
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div><!--card-tools-->
                </div><!--card-header-->
                
                <div class="card-body" style="display: block;">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Video Url</label>
                        <input type="text"  wire:model="video_url" class="form-control" id="exampleInputEmail1" placeholder="Enter Video Url">
                        @error('video_url')
                        <span style="padding-left: 0;color: red;font-size: 14px;"
                            id="name-error" class="alert error">* {{ $message }}</span>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>        
                </div><!---card-body--> 
            
                </div>    <!---card-body-->    

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
                                        
                @forelse($directoryListingCategories as $key => $category)
                <div class="form-group mb-2">
                <div class="icheck-primary d-inline">
                    <input  wire:model="categories" type="checkbox" id="{{ $category->name }}{{ $key }}" value="{{ $category->id }}">
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
            </div><!---card-body--> 
        
            </div>    <!---card-body-->
            <div class="card card-widget">
                <div class="card-header">
                <div class="user-block">
                <h5>Locations</h5>
                </div> <!--user-block-->
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div><!--card-tools-->
                </div><!--card-header-->
                
                <div class="card-body" style="display: block;">
                    @forelse($directoryListingLocations as $key => $location)
<!-- <div class="form-group mb-2">
    <div class="icheck-primary d-inline">
        <input type="checkbox" id="{{ $location->name }}{{ $key }}"
         wire:model="locations" value="{{ $location->id }}"
         @if(in_array($location->id, $locations)) checked @endif >
        <label style="font-weight: 500;" for="{{ $location->name }}{{ $key }}">{{ $location->name }}
        </label>
        </div>
    </div> -->
    <div class="form-group mb-2">
                <div class="icheck-primary d-inline">
                    <input  wire:model="locations" type="checkbox" id="{{ $location->name }}{{ $key }}" value="{{ $location->id }}">
                    <label style="font-weight: 500;" for="{{ $location->name }}{{ $key }}">{{ $location->name }}
                    </label>
                </div>
                @forelse($location->children as $key1 => $children)
                <div class="icheck-primary" style="margin-left: 15px;">
                    <input type="checkbox" id="{{ $children->name }}{{ $key1 }}" wire:model="locations" value="{{ $children->id }}">
                    <label style="font-weight: 500;" for="{{ $children->name }}{{ $key1 }}">{{ $children->name }}
                    </label>
                
                </div>
                @empty
                    @endforelse 
                
                </div>
@empty

@endforelse  
                </div><!---card-body--> 
            
                </div>    <!---card-body-->    
</div>

</form>
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

            ClassicEditor
            .create(document.querySelector('#editornote2'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('contact_info_content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#editornote3'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('address', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection