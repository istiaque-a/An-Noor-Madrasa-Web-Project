<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">


<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset(('assets/vendor/css/core.css?9898')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}?899" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}?<?php echo rand(1,10000); ?>" />

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />

<link rel="stylesheet" href="{{ asset(('assets/js/fancybox-master/dist/jquery.fancybox.min.css')) }}" />
<link rel="stylesheet" href="{{ asset(('assets/js/jquery-ui-1.13.2/jquery-ui.min.css')) }}" />


<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?<?php echo rand(1,10000000); ?>" />
<link rel="stylesheet" href="{{ asset('assets/js/select2-develop/dist/css/select2.min.css') }}?<?php echo rand(1,10000); ?>" />


<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
