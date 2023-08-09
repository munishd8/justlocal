@extends('layouts.app')
@section('title', 'Edit Local Eat')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Edit Local Eat - {{ $localEat->name }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Edit Local Eat</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
    <livewire:local-eats.edit-local-eat-wire :localEat="$localEat" />




</div>
</section>

</section>
@endsection

