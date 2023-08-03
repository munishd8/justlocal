@extends('layouts.app')
@section('title', 'Local Eats')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Local Eats</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Local Eats</li>
</ol>
</div>
</div>
</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<livewire:local-eats.local-eats-wire />
		
		</div>
		
		</div>
		
		
		
		</div>

</section>




@endsection
