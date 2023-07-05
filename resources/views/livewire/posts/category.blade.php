@extends('layouts.app')

@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Categories</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Posts System</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Add New Category</h3>
</div>
 
<div class="card-body">
 <form wire:submit.prevent="submit">
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
 @error('name') <span class="error">{{ $message }}</span> @enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Parent Category</label>
<select class="form-control">
@foreach($parents as $parent)
<option>{{ $parent->name }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
</div>
<div class="form-group">
<label for="exampleInputFile">Image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>
<div class="input-group-append">
<span class="input-group-text">Upload</span>
</div>
</div>
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

</div>


</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Simple Full Width Table</h3>

</div>

<div class="card-body p-0">
<table class="table">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
@foreach($postCategories as $category)
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
@endforeach
</tbody>
</table>
</div>
<div class="card-tools">
{{ $postCategories->links() }}
</div>
</div>

</div>

</div>



</div>
</section>

</section>
@endsection
