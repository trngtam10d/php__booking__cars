{{-- Lib Javascript --}}
<script src="{{ asset('public/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/node-waves/waves.min.js') }}"></script>

{{-- Plugins --}}
<script src="{{ asset('public/assets/libs/peity/jquery.peity.min.js') }}"></script>

{{-- lib database --}}
<script src="{{ asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

{{-- System javascript --}}
<script src="{{ asset('public/assets/js/app.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/form-repeater.init.js') }}"></script>

@stack('scripts')
