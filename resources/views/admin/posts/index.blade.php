@extends('layouts.app')
@section('title', 'Posts')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Posts</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Posts</li>
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
<livewire:posts.posts-wire />

</div>

</div>



</div>
</section>

</section>
@endsection
