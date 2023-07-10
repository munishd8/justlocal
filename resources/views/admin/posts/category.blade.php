@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">{{ __('Categories') }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
<li class="breadcrumb-item active">{{ __('Posts System') }}</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
<div class="row">
 <livewire:posts.create-category-wire :postCategories="$postCategories" />
 <livewire:posts.category-wire />

</div>



</div>
</section>

</section>
@endsection
@section('scripts')
<script>
  const input = document.querySelector('input[id="categoryImage"]');
  const pond = FilePond.create(input);
</script>
@endsection