@extends('layouts.app')
@section('title', 'Create New Post')
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
    <livewire:posts.create-post-wire :postCategories="$postCategories" />




</div>
</section>

</section>
@endsection
{{-- @section('scripts')
        <script>
        ClassicEditor
            .create(document.querySelector('#editornote1'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    window.livewire.find('mCmGDOobOcZ7BqTvnZ0o').set('text', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
