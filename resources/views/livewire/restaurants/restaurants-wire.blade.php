<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Restaurants') }}</h3>
    <div class="card-tools">
        {{-- <div class="input-group input-group-sm" style="width: 100px;"> --}}
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-block btn-primary btn-flat float-right">Add New</a>
            
        {{-- </div> --}}
    </div>
    </div>
    
    <div class="card-body table-responsive p-4">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-2">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model="searchColumns.name" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
            </div>
        </div> 
    <div class="col-sm-12 col-md-2">
        <div class="dt-buttons btn-group flex-wrap">
            <select wire:model="action"  class="form-control form-control-sm">
                <option value="">Select Action</option>
                <option value="trash">Move to Trash</option>
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
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Website</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($restaurants as $restaurant)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $restaurant->id }}"></td>
    <td>{{ $restaurant->name }}</td>
    <td>{{ $restaurant->address }}</td>
    <td>{{ $restaurant->phone }}</td>
    <td>{{ $restaurant->email }}</td>
    <td>{{ $restaurant->website }}</td>
    <td>{{ $restaurant->created_at->format('d,M Y h:iA') }}</td>
    <td>{{ $restaurant->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <button  wire:click="restoreConfirm('restore', {{ $restaurant->id }})" class="btn btn-info">Restore</button>
        <button wire:click="trashConfirm('trash', {{ $restaurant->id }})" class="btn btn-danger">Trash</button>
    </td>
    </tr>
    @empty
    <tr>
    <td>No Restaurants Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $restaurants->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>