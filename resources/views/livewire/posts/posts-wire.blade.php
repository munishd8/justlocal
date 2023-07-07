<div class="card">
<div class="card-header">
<h3 class="card-title">{{ __('List of Posts') }}</h3>
<div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Title</th>
<th>Categories</th>
<th>Featured</th>
<th>Created At</th>
<th>Updated At</th>
</tr>
</thead>
<tbody>
@forelse($posts as $post)
<tr>
<td>{{ $post->id }}</td>
<td>{{ $post->title }}</td>
<td>
           @foreach($post->categories as $category)
        <a href="#">{{ $category->name }}</a>,
        @endforeach 
{{--     <ul>
        @foreach($post->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul> --}}
</td>
<td><b>@if($post->is_featured == 0) No @else Yes @endif </b></td>
<td>{{ $post->created_at->format('d,M Y h:iA') }}</td>
<td>{{ $post->updated_at->format('d,M Y h:iA') }}</td>
</tr>
@empty
<tr>
<td>No Posts Found.</td>
</tr>
@endforelse
</tbody>
</table>

</div>

<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
    {{ $posts->links() }}
</ul>
</div>
</div>