<!DOCTYPE html>
<html lang="en">

@include('Admin::parts.head')

<body data-topbar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @section('side__bar')
            @include('Admin::parts.top__bar')
        @show

        <div class="main-content">
            @yield('main')

            @section('footer')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Viettheo.
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </footer>
            @show
        </div>
    </div>
    <!-- end begin -->
    @section('right__bar')
        @include('Admin::parts.right__bar')
    @show

    @section('javascripts')
        @include('Admin::parts.vendor__js')
    @show
</body>

</html>
