@extends('layouts.app')
@section('title', 'Death Notice')
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
		<div class="col-md-12">
		<livewire:death-notice.death-notice-wire />
		
		</div>
		
		</div>
		
		
		
		</div>

</section>




@endsection
