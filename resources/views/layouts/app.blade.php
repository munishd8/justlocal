
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') &lsaquo; Just Local</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }} ">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

{{-- <script nonce="4c7c162b-a0a1-4eae-9828-b70907dad094">(function(w,d){!function(dK,dL,dM,dN){dK[dM]=dK[dM]||{};dK[dM].executed=[];dK.zaraz={deferred:[],listeners:[]};dK.zaraz.q=[];dK.zaraz._f=function(dO){return function(){var dP=Array.prototype.slice.call(arguments);dK.zaraz.q.push({m:dO,a:dP})}};for(const dQ of["track","set","debug"])dK.zaraz[dQ]=dK.zaraz._f(dQ);dK.zaraz.init=()=>{var dR=dL.getElementsByTagName(dN)[0],dS=dL.createElement(dN),dT=dL.getElementsByTagName("title")[0];dT&&(dK[dM].t=dL.getElementsByTagName("title")[0].text);dK[dM].x=Math.random();dK[dM].w=dK.screen.width;dK[dM].h=dK.screen.height;dK[dM].j=dK.innerHeight;dK[dM].e=dK.innerWidth;dK[dM].l=dK.location.href;dK[dM].r=dL.referrer;dK[dM].k=dK.screen.colorDepth;dK[dM].n=dL.characterSet;dK[dM].o=(new Date).getTimezoneOffset();if(dK.dataLayer)for(const dX of Object.entries(Object.entries(dataLayer).reduce(((dY,dZ)=>({...dY[1],...dZ[1]})),{})))zaraz.set(dX[0],dX[1],{scope:"page"});dK[dM].q=[];for(;dK.zaraz.q.length;){const d_=dK.zaraz.q.shift();dK[dM].q.push(d_)}dS.defer=!0;for(const ea of[localStorage,sessionStorage])Object.keys(ea||{}).filter((ec=>ec.startsWith("_zaraz_"))).forEach((eb=>{try{dK[dM]["z_"+eb.slice(7)]=JSON.parse(ea.getItem(eb))}catch{dK[dM]["z_"+eb.slice(7)]=ea.getItem(eb)}}));dS.referrerPolicy="origin";dS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(dK[dM])));dR.parentNode.insertBefore(dS,dR)};["complete","interactive"].includes(dL.readyState)?zaraz.init():dK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}
<link href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">
    
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="{{ asset('dist/img/JustLocalLogo.jpg') }}" alt="AdminLTELogo" height="80" width="300">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>

</ul>

<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <!-- Dropdown content goes here -->
    <a class="dropdown-item pl-2"  href="{{ route('admin.profile.index') }}"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Profile</a>
     <div class="dropdown-divider mt-1 mb-1"></div>
     
     <div class="dropdown-divider mt-1 mb-1"></div>
    <a class="dropdown-item pl-2"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
  </div>
</li>


</ul>
</nav>


@include('layouts.aside')

<div class="content-wrapper">


@yield('content')
</div>

<footer class="main-footer">
<strong>Copyright &copy; {{ date('Y') }} <a target="_blank" href="https://justlocal.ie/">Just Local</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b> 1.0.0
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>

<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src=".https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="{{ asset('dist/js/adminlte.js') }}"></script>


<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
  // Handle "Select All" checkbox
  $('#selectAll').on('change', function() {
    $('.rowCheckbox').prop('checked', $(this).is(':checked'));
  });

  // Handle bulk action button click
  $('#executeBulkAction').on('click', function() {
    var selectedAction = $('#bulkActionSelect').val();
    var selectedRows = $('.rowCheckbox:checked').closest('tr');

    if (selectedAction === "") {
      alert('Please select a bulk action.');
      return;
    }

    if (selectedRows.length === 0) {
      alert('Please select at least one row.');
      return;
    }

    selectedRows.each(function() {
      var name = $(this).find('td:nth-child(2)').text(); // Assuming name is in the second column

      switch (selectedAction) {
        case 'delete':
          // Perform delete operation
          $(this).remove();
          break;

        case 'activate':
          // Perform activate operation
          console.log('Activated: ' + name);
          break;

        case 'deactivate':
          // Perform deactivate operation
          console.log('Deactivated: ' + name);
          break;

        // Add more cases for additional actions

        default:
          break;
      }
    });

    // Clear selection
    $('.rowCheckbox').prop('checked', false);
    $('#selectAll').prop('checked', false);
    // Display success message or perform further actions
    alert('Selected rows processed successfully!');
  });
});

//     $(document).ready(function() {
//   // Initialize DataTable
//   var table = $('#myTable').DataTable();

//   // Handle "Select All" checkbox
//   $('#selectAll').on('change', function() {
//     $('.rowCheckbox').prop('checked', $(this).is(':checked'));
//   });

//   // Handle individual checkbox changes
//   $('.rowCheckbox').on('change', function() {
//     var allChecked = $('.rowCheckbox:checked').length === $('.rowCheckbox').length;
//     $('#selectAll').prop('checked', allChecked);
//   });

//   // Handle bulk action button click
//   $('#deleteSelected').on('click', function() {
//     var selectedRows = $('.rowCheckbox:checked').closest('tr');
//     // Perform your desired action on selected rows
//     selectedRows.each(function() {
//       // Example: Delete row
//       table.row($(this)).remove().draw(false);
//     });
//     // Clear selection
//     $('.rowCheckbox').prop('checked', false);
//     $('#selectAll').prop('checked', false);
//     // Display success message or perform further actions
//     alert('Selected rows deleted successfully!');
//   });
// });

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

@livewireScripts
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
            // Trash
window.addEventListener('swal:trash-confirm', event => {
    swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: '#FF0000',
        confirmButtonText: 'Yes, Move to Trash!'
    })
    .then((willTrash) => {
        if (willTrash.isConfirmed) {
            window.livewire.emit(event.detail.method, event.detail.id);
        }
    });
});

            //Delete
                        window.addEventListener('swal:delete-confirm', event => {
                swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(239 68 6)',
                    confirmButtonText: 'Yes, delete it!'
                })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            window.livewire.emit(event.detail.method, event.detail.id);
                        }
                    });
            });
          //Restore

                                    window.addEventListener('swal:restore-confirm', event => {
                swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    showCancelButton: true,
                    confirmButtonColor: '#00FF00',
                    confirmButtonText: 'Yes, Restore Post!'
                })
                    .then((willRestore) => {
                        if (willRestore.isConfirmed) {
                            window.livewire.emit(event.detail.method, event.detail.id);
                        }
                    });
            });


        </script>  
         {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> --}}
         {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script> --}}

                   {{-- <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script> --}}
                    {{-- <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script> --}}
         @yield('scripts')


         
</body>
</html>
