<div class="col-md-6">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">{{ __('List of Posts Categories') }}</h3>
        </div>
        @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show"  role="alert">
            {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> 
      </button>
    </div>
@endif
        <div class="card-body table-responsive p-4">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-2">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model="searchColumns.name" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                </div>
            </div>
          
        <div class="col-sm-12 col-md-4">
            <div class="dt-buttons btn-group flex-wrap">
                <select wire:model="action"  class="form-control form-control-sm">
                    <option value="">Select Action</option>
                    <option value="trash">Delete</option>
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
        <th></th>
        <th>Name</th>
        <th>Slug</th>
        <th>Count</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($postCategories as $category)
        <tr>
            <td><input type="checkbox" wire:model="selected" value="{{ $category->id }}"></td>
        <!-- {{-- <td><img src="{{ asset('upload').'/'. $category->image }}" height="50px"></td> --}} -->
<td><img src="{{ asset('upload').'/'. $category->image }}" height="50px"></td>
<td>{{ $category->name }}</td>
<td>{{ $category->slug }}</td>
<td>{{ $category->posts->count() }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.posts.category.edit',$category->id) }}">Edit</a>
            <button wire:click="trashConfirm('trash', {{ $category->id }})" class="btn btn-danger">Delete</button>
        </td>
        </tr>
        @empty
        <tr>
        <td>No Posts Category Found.</td>
        </tr>
        @endforelse
        </tbody>
        </table>
        
        </div>
        
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $postCategories->onEachSide(0)->links()  }}
        </ul>
        </div>
        </div>
</div>