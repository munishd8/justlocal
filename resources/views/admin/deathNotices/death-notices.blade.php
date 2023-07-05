@extends('layouts.app')

@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Death Notices</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Death Notices</li>
</ol>
</div>
</div>
</div>
</div>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">


<div class="card">
<div class="card-header">
<h3 class="card-title">DataTable with default features</h3>
</div>

<div class="card-body">
	{{-- <button class="btn btn-primary bulkActionBtn" id="deleteSelected">Delete Selected</button> --}}

	<select class="bulkActionSelect">
          <option value="">Bulk Actions</option>
          <option value="delete">Delete</option>
          <option value="activate">Activate</option>
          <option value="deactivate">Deactivate</option>
        </select>
        <button class="btn btn-primary bulkActionBtn" id="executeBulkAction">Apply</button>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th><input type="checkbox" id="selectAll"></th>
<th>Rendering engine</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
</tr>
</thead>
<tbody>
<tr>
<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>Internet
Explorer 4.0
</td>
<td>Win 95+</td>
<td> 4</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>Internet
Explorer 5.0
</td>
<td>Win 95+</td>
<td>5</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>Internet
Explorer 5.5
</td>
<td>Win 95+</td>
<td>5.5</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>Internet
Explorer 6
</td>
<td>Win 98+</td>
<td>6</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>Internet Explorer 7</td>
<td>Win XP SP2+</td>
<td>7</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Trident</td>
<td>AOL browser (AOL desktop)</td>
<td>Win XP</td>
<td>6</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Firefox 1.0</td>
<td>Win 98+ / OSX.2+</td>
<td>1.7</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Firefox 1.5</td>
<td>Win 98+ / OSX.2+</td>
<td>1.8</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Firefox 2.0</td>
<td>Win 98+ / OSX.2+</td>
<td>1.8</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Firefox 3.0</td>
<td>Win 2k+ / OSX.3+</td>
<td>1.9</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Camino 1.0</td>
<td>OSX.2+</td>
<td>1.8</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Camino 1.5</td>
<td>OSX.3+</td>
<td>1.8</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Netscape 7.2</td>
<td>Win 95+ / Mac OS 8.6-9.2</td>
<td>1.7</td>

</tr>
<tr>
	<td><input type="checkbox" class="rowCheckbox"></td>
<td>Gecko</td>
<td>Netscape Browser 8</td>
<td>Win 98SE+</td>
<td>1.7</td>

</tr>

</tbody>
</table>

</div>

</div>

</div>

</div>

</div>

</section>




@endsection
