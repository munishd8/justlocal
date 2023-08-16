<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{ route('admin.dashboard')}}" class="brand-link">
<!-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
<span class="brand-text font-weight-light">Just Local</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="{{ route('admin.profile.index')}}" class="d-block">{{ auth()->user()->name }}</a>
</div>
</div>


<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item">
<a href="{{ route('admin.dashboard') }}" class="nav-link">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Dashboard
</p>
</a>
</li>

    
   
@foreach($menus as $item)
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas {{ $item->icon_class }}"></i>
<p>
{{ $item->name }}
<i class="fas fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
@if ($item->name == 'Posts System')
    <a href="{{ route('admin.posts.index') }}" class="nav-link">
@elseif ($item->name == 'Death Notices')
     <a href="{{ route('admin.death-notices.index') }}" class="nav-link">
@else
     <a href="{{ route('admin.directory-listings.index') }}" class="nav-link">
@endif

<i class="far fa-circle nav-icon"></i>
@if ($item->name == 'Posts System')
<p>All Posts</p>
@elseif ($item->name == 'Death Notices')
<p>Death Notices</p>
@else
All listings
@endif
</a>
</li>
<li class="nav-item">
@if ($item->name == 'Posts System')
    <a href="{{ route('admin.posts.create') }}" class="nav-link">
@elseif ($item->name == 'Death Notices')
     <a href="{{ route('admin.death-notices.create') }}" class="nav-link">
@else
     <a href="{{ route('admin.directory-listings.create') }}" class="nav-link">
@endif
<i class="far fa-circle nav-icon"></i>
@if ($item->name == 'Posts System')
<p>Add New</p>
@elseif ($item->name == 'Death Notices')
<p>Add New Notice</p>
@else
Add New listings
@endif
</a>
</li>

<li class="nav-item">
@if ($item->name == 'Posts System')
    <a href="{{ route('admin.posts.category.index') }}" class="nav-link">
@elseif ($item->name == 'Death Notices')
     <a href="{{ route('admin.death-notices.index') }}" class="nav-link">
@else
     <a href="{{ route('admin.directory-listings.category.index') }}" class="nav-link">
@endif

@if ($item->name == 'Posts System'  || $item->name == 'Directory listings')
<i class="far fa-circle nav-icon"></i>
<p>Categories</p>
@endif
</a>
</li>
@if ($item->name == 'Directory listings')
<li class="nav-item">
     
         <a href="{{ route('admin.directory-listings.location.index') }}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
     <p>Locations</p>
    
     </a>
     </li>
     @endif
<li class="nav-item">
@if ($item->name == 'Posts System')
    <a href="{{ route('admin.posts.trash') }}" class="nav-link">
@elseif ($item->name == 'Death Notices')
     <a href="{{ route('admin.death-notices.trash') }}" class="nav-link">
@else
     <a href="{{ route('admin.directory-listings.trash') }}" class="nav-link">
@endif
<i class="far fa-circle nav-icon"></i>
<p>Trash</p>
</a>
</li>
</ul>
</li>
 @endforeach
 <li class="nav-item">
     <a href="#" class="nav-link">
     <i class="nav-icon fas fa-chart-pie"></i>
     <p>
          Restaurants
     <i class="right fas fa-angle-left"></i>
     </p>
     </a>
     <ul class="nav nav-treeview">
     <li class="nav-item">
     <a href="{{ route('admin.restaurants.index') }}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
     <p>List All Restaurants     </p>
     </a>
     </li>
     <li class="nav-item">
     <a href="{{ route('admin.restaurants.create') }}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
     <p>Add Restaurants</p>
     </a>
     </li>
     <li class="nav-item">
     <a href="{{ route('admin.restaurants.trash') }}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
     <p>Trash</p>
     </a>
     </li>
     </ul>
     </li>

     <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
               Planning Application

          <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{ route('admin.planning-applications.index') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>List All Application      </p>
          </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('admin.planning-applications.create') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Application</p>
          </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('admin.planning-applications.trash') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Trash</p>
          </a>
          </li>
          </ul>
          </li>

          
          <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-chart-pie"></i>
               <p>
                    Local Eats
               <i class="right fas fa-angle-left"></i>
               </p>
               </a>
               <ul class="nav nav-treeview">
               <li class="nav-item">
               <a href="{{ route('admin.local-eats.index') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>List All Local Eats     </p>
               </a>
               </li>
               <li class="nav-item">
               <a href="{{ route('admin.local-eats.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Local Eats</p>
               </a>
               </li>
               <li class="nav-item">
               <a href="{{ route('admin.local-eats.trash') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Trash</p>
               </a>
               </li>
               </ul>
               </li>

               
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                         Transport

                    <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('admin.transports.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List All Transport
                    </p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.transports.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Transport</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.transports.trash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Trash</p>
                    </a>
                    </li>
                    </ul>
                    </li>
               



</ul>
</nav>

</div>

</aside>