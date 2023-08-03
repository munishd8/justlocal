<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Trash Local Eats') }}</h3>
    <div class="card-tools">
    
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
            <th><input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"></th>
            <th>Name</th>
            <th>Description</th>
            <th>Link</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            </tr>
    </thead>
    <tbody>
        @forelse($localEats as $localEat)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $localEat->id }}"></td>
    <td>{{ $localEat->name }}</td>
    <td>{{ $localEat->description }}</td>
    <td>{{ $localEat->link }}</td>
    <td>{{ $localEat->created_at->format('d,M Y h:iA') }}</td>
    <td>{{ $localEat->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <button  wire:click="restoreConfirm('restore', {{ $localEat->id }})" class="btn btn-info">Restore</button>
        <button wire:click="deleteConfirm('delete', {{ $localEat->id }})" class="btn btn-danger">Delete</button>
    </td>
    </tr>
    @empty
    <tr>
    <td>No Local Eats Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $localEats->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>