<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Subscribers') }}</h3>

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
                <option value="block_users">Block Users</option>
                <option value="unblock_users">Unblock Users</option>
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
    <!-- <th></th> -->
    <th>Name</th>
    <th>Email</th>
    <th>Created At</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($subscribers as $subscriber)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $subscriber->id }}"></td>
        <td>{{ $subscriber->name }}</td>
        <td>{{ $subscriber->email }}</td>
    <td>{{ $subscriber->created_at->format('d,M Y h:iA') }}</td>
    <td>
    @if($subscriber->status == 1)
    <small class="badge badge-success"><i class="far fa-clock"></i> Active</small>
    @else
    <small class="badge badge-danger"><i class="far fa-clock"></i> Blocked</small>
    @endif
   
    
    </td>
    </tr>
    @empty
    <tr>
    <td>No Subscribers Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $subscribers->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>