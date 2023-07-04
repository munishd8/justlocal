<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Bordered Table</h3>
</div>
 
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{ $user->id }}.</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->updated_at->format('d M Y h:iA') }}</td>
</tr>
@endforeach

</tbody>
</table>
</div>

{{-- {{ $users->links('admin.pages.custom-pagination') }} --}}
{{ $users->links() }}

</div>


</div>


</div>

</div>
</div>