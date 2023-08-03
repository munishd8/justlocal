@extends('layouts.app')
@section('title', 'Trash Directory Listings')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Trash Directory Listings</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Trash Directory Listings</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
{{-- <livewire:posts.trash-posts-wire /> --}}
<livewire:directory-listings.trash-directory-listings-wire />
{{-- <livewire:posts.trash-posts-wire /> --}}

</div>

</div>



</div>
</section>

</section>
@endsection
