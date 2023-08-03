<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Trash Directory Listings') }}</h3>
    <div class="card-tools">
    
    </div>
    </div>
    
    <div class="card-body table-responsive p-4">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-2">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model="searchColumns.title" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
            </div>
        </div>
    <div class="col-sm-12 col-md-3">
        <div class="dt-buttons btn-group flex-wrap">
            <select wire:model="searchColumns.category_id" class="form-control form-control-sm">
                <option value="">Choose Category</option>
                @foreach($categories as $id => $category)
                <option value="{{ $id }}">{{ $category }}</option>
               @endforeach
            </select>         
        </div>
    </div>
    <div class="col-sm-12 col-md-2">
        <div class="dt-buttons btn-group flex-wrap">
            <select wire:model="action"  class="form-control form-control-sm">
                <option value="">Select Action</option>
                <option value="restore">Restore</option>
            </select>
              
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <button wire:click="performAction" class="btn btn-primary">Apply</button>         
    </div>     
    
    </div>
        </div>
    <table class="table table-hover text-nowrap border-top">
    <thead>
    <tr>
    {{-- <th style="width: 10px"><input type="checkbox" wire:model="selectAll" id="select-all">
    </th> --}}
    <th><input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"></th>
    <th>Title</th>
    <th>Categories</th>
    <th>Featured</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($directoryListings as $directoryListing)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $directoryListing->id }}"></td>
    <td>{{ $directoryListing->title }}</td>
    <td>
        @foreach($directoryListing->locations as $location)
     <a href="#" class="badge badge-info">{{ $location->name }}</a>
     @endforeach 

</td>
    <td>
               @foreach($directoryListing->categories as $category)
            <a href="#" class="badge badge-info">{{ $category->name }}</a>
            @endforeach 
    
    </td>
    <td> {{ $directoryListing->excerpt == 0  }} </td>
    <td>{{ $directoryListing->created_at->format('d,M Y h:iA') }}</td>
    <td>{{ $directoryListing->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <button  wire:click="restoreConfirm('restore', {{ $directoryListing->id }})" class="btn btn-info">Restore</button>
        <button wire:click="deleteConfirm('delete', {{ $directoryListing->id }})" class="btn btn-danger">Delete</button>
    
    </td>
    </tr>
    @empty
    <tr>
    <td>No directory Listings Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $directoryListings->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>