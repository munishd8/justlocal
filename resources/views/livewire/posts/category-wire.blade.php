<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Post System - Categories</h3>

</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
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
<td><img src="{{ asset('upload').'/'. $category->image }}" height="50px"></td>
<td>{{ $category->name }}</td>
<td>{{ $category->slug }}</td>
<td>{{ $category->posts->count() }}</td>
<td>
    <button type="button" class="btn btn-info">Edit</button>
<button type="button" class="btn btn-danger">Delete</button>
</td>
</tr>
@empty

@endforelse
</tbody>
</table>
</div>
<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
    {{ $postCategories->onEachSide(0)->links() }}
</ul>
</div>

</div>

</div>