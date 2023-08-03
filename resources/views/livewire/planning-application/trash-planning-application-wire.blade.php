<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{ __('List of Trash Planning Application') }}</h3>
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
            <th>Details</th>
            <th>Applicant Name</th>
            <th>Planning Reference</th>
            <th>Registration Date</th>
            <th>Submit Observations</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            </tr>
    </thead>
    <tbody>
        @forelse($planningApplications as $planningApplication)
        <tr>
            <td><input type="checkbox" wire:model="selected" value="{{ $planningApplication->id }}"></td>
        <td>{{ $planningApplication->name }}</td>
        <td>{{ $planningApplication->details }}</td>
        <td>{{ $planningApplication->applicant_name }}</td>
        <td>{{ $planningApplication->planning_reference }}</td>
        <td>{{ $planningApplication->registration_date }}</td>
        <td>{{ $planningApplication->created_at->format('d,M Y h:iA') }}</td>
        <td>{{ $planningApplication->updated_at->format('d,M Y h:iA') }}</td>
    <td>
        <button  wire:click="restoreConfirm('restore', {{ $planningApplication->id }})" class="btn btn-info">Restore</button>
        <button wire:click="deleteConfirm('delete', {{ $planningApplication->id }})" class="btn btn-danger">Delete</button>
    </td>
    </tr>
    @empty
    <tr>
    <td>No Planning Application Found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>
    
    </div>
    
    <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        {{ $planningApplications->onEachSide(0)->links()  }}
    </ul>
    </div>
    </div>