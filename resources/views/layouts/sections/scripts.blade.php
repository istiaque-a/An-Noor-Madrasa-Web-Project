<!-- BEGIN: Vendor JS-->
<!-- <script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script> -->
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<!-- <script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script> -->
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{ asset('assets/js/circle-progress.js') }}"></script>
<script src="{{ asset('assets/js/johnpolacek-imagefill.js-4165b58/js/jquery-imagefill.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-master/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/fancybox-master/dist/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>




<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/select2-develop/dist/js/select2.min.js') }}"></script>


@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
