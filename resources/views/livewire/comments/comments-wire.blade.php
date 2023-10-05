<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Comments</h3>
        <div class="card-tools">


        </div>
    </div>

    <div class="card-body table-responsive p-4">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-2">
            <div class="row">
                {{-- <div class="col-sm-12 col-md-3">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                wire:model="searchColumns.title" class="form-control form-control-sm" placeholder=""
                                aria-controls="example1"></label>
                    </div>
                </div> --}}
                <div class="col-sm-12 col-md-2">
                    <div class="dt-buttons btn-group flex-wrap">
                        <select wire:model="action" class="form-control form-control-sm">
                            <option value="">Select Action</option>
                            <option value="delete">Delete</option>
                            <option value="deActivate">Deactivate Comments</option>
                            <option value="activate">Activate Comments</option>
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
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>User</th>
                    <th>Created At</th>
                    <th>Status</th>
                    
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                <tr>
                    <td><input type="checkbox" wire:model="selected" value="{{ $comment->id }}"></td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->content }}</td>
                     <td>
                        <a href="{{ route('admin.posts.edit',$comment->commentable->id) }}"> {{ $comment->commentable->title }}</a>
                    </td> 
                    <td><b>@if(isset($comment->user_id)) <small class="badge badge-primary"><i class="far fa-clock"></i> Subsriber</small> @else <small class="badge badge-success"><i class="far fa-clock"></i>Guest</small> @endif </b></td>
                    <td>{{ $comment->created_at->format('d,M Y h:iA') }}</td>
                    <td><b>@if($comment->status == 0 ) <button  wire:click="changeStatus({{ $comment->id }})" type="button"  class="btn btn-block bg-gradient-warning btn-sm"> Approve</button> @else <button type="button" wire:click="changeStatus({{ $comment->id }})" class="btn btn-block bg-gradient-info btn-sm">Approved</button> @endif </b></td>
                    
                    
                    
                     <td>
                     <button wire:click="deleteConfirm('delete', {{ $comment->id }})" class="btn btn-danger">Delete</button>

                    </td> 
                </tr>
                @empty
                <tr>
                    <td>No Comments to Show.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $comments->onEachSide(0)->links() }}
        </ul>
    </div>
</div>