@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">{{ __('Profile') }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
<li class="breadcrumb-item active">{{ __('Profile') }}</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
</div>
<h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
<p class="text-muted text-center">Admin</p>
<ul class="list-group list-group-unbordered mb-3">
<li class="list-group-item">
<a class="float-center">{{ auth()->user()->email }}</a>
</li>
<li class="list-group-item">
 <a class="float-center">{{ auth()->user()->updated_at->format('d, M Y h:iA') }}</a>
</li>
</ul>
</div>

</div>


</div>

<div class="col-md-9">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Edit Profile</a></li>
<li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab">Change Password</a></li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">

<div class="tab-pane active" id="profile">
<livewire:profile-wire />
</div>

<div class="tab-pane" id="changePassword">
<livewire:change-password-wire />
</div>



</div>

</div>

</div>
</div>

</div>

</div>

</section>

</section>
@endsection
