<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Local Eats') }}</h3>
    <div class="card-tools">
        {{-- <div class="input-group input-group-sm" style="width: 100px;"> --}}
            <a href="{{ route('admin.local-eats.create') }}" class="btn btn-block btn-primary btn-flat float-right">Add New</a>
            
    </div>
    </div>
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
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
    <th></th>
    <th>Name</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($localEats as $localEat)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $localEat->id }}"></td>
        <td><img src="{{ asset('upload/'.$localEat->images[0]->image) }}" height="40px"></td>
        <td>{{ $localEat->name }}</td>
    <td>{{ $localEat->created_at->format('d,M Y h:iA') }}</td>
    <td>{{ $localEat->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <a class="btn btn-info" href="{{ route('admin.local-eats.edit',$localEat->id) }}">Edit</a>
        <button wire:click="trashConfirm('trash', {{ $localEat->id }})" class="btn btn-danger">Trash</button>
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