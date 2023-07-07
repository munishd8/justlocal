<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Simple Full Width Table</h3>

</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
@forelse($postCategories as $category)
<tr>
<td>1.</td>
<td>{{ $category->name }}</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
@empty
<tr>
<td>Uncategorized</td>
</tr>
@endforelse
</tbody>
</table>
</div>
<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
    {{ $postCategories->links() }}
</ul>
</div>

</div>

</div>