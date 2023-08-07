@extends('layouts.app')
@section('title', 'Edit  Death Notice')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Edit Death Notice - {{ $deathNotice->title }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Edit Death Notice</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
    <livewire:death-notice.edit-death-notice-wire :deathNotice="$deathNotice" />




</div>
</section>

</section>
@endsection

