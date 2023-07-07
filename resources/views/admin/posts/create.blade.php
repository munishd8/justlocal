@extends('layouts.app')

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
{{-- <livewire:posts.create-post-wire /> --}}
<div class="card">
<div class="card-header">
<h3 class="card-title">Simple Full Width Table</h3>

</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
<tr>
<td>1.</td>
<td>Uncategorized</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>1.</td>
<td>Quia non cumque praesentium voluptatem.</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>1.</td>
<td>Veniam consequuntur eligendi pariatur.</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>1.</td>
<td>This is demo category</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>1.</td>
<td>Demo Category</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
</tbody>
</table>
</div>
<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
    <div>
                    
        <nav>
            <ul class="pagination">
                
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                        <span class="page-link" aria-hidden="true">‹</span>
                    </li>
                
                
                                    
                    
                    
                                                                                                        <li class="page-item active" wire:key="paginator-page-1-page-1" aria-current="page"><span class="page-link">1</span></li>
                                                                                                                <li class="page-item" wire:key="paginator-page-1-page-2"><button type="button" class="page-link" wire:click="gotoPage(2, 'page')">2</button></li>
                                                                                                                <li class="page-item" wire:key="paginator-page-1-page-3"><button type="button" class="page-link" wire:click="gotoPage(3, 'page')">3</button></li>
                                                                                        
                
                                    <li class="page-item">
                        <button type="button" dusk="nextPage" class="page-link" wire:click="nextPage('page')" wire:loading.attr="disabled" rel="next" aria-label="Next »">›</button>
                    </li>
                            </ul>
        </nav>
    </div>

</ul>
</div>

</div>
</div>

</div>



</div>
</section>

</section>
@endsection
