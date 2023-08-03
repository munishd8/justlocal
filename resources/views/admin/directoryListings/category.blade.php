@extends('layouts.app')
@section('title', 'Directory Listing Categories')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">{{ __('Directory Listing Categories') }}</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
<li class="breadcrumb-item active">{{ __('Directory Listing Categories ') }}</li>
</ol>
</div>
</div>
</div>
</div>

<section class="container-fluid">
    <section class="content">
<div class="container-fluid">
<div class="row">
 <livewire:directory-listings.create-category-wire :directoryListingCategories="$directoryListingCategories" />
 <livewire:directory-listings.category-wire />

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