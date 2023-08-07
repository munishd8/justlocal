<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Death Notices') }}</h3>
    <div class="card-tools">
            <a href="{{ route('admin.death-notices.create') }}" class="btn btn-block btn-primary btn-flat float-right">Add New</a>
            
        {{-- </div> --}}
    </div>
    </div>
    
    <div class="card-body table-responsive p-4">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-2">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model="searchColumns.title" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
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
    <th>Title</th>
    {{-- <th>Content</th> --}}
    <th>Date of Birth</th>
    <th>Date of Death</th>
    <th>Notice Date</th>
    <th>Notice Link</th>
    <th>Link</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($deathNotice as $notice)
    <tr>
        <td><input type="checkbox" wire:model="selected" value="{{ $notice->id }}"></td>
    <td>{{ $notice->title }}</td>
    {{-- <td>{{ $notice->content }}</td> --}}
    <td>{{ $notice->date_of_birth->format('d,M Y') }}</td>
    <td>{{ $notice->date_of_death->format('d,M Y') }}</td>
    <td>{{ $notice->notice_date->format('d,M Y') }}</td>
    <td>{{ $notice->notice_link }}</td>
    <td>{{ $notice->link}}</td>
    <td>{{ $notice->created_at->format('d,M Y h:iA') }}</td>
    <td>{{ $notice->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <a class="btn btn-info" href="{{ route('admin.death-notices.edit', $notice->id) }}">Edit</a>
        <button wire:click="trashConfirm('trash', {{ $notice->id }})" class="btn btn-danger">Trash</button>
    </td>
    </tr>
    @empty
    <tr>
    <td>No Death Notice Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $deathNotice->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>