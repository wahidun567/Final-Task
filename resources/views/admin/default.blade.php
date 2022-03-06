<!DOCTYPE html>
<html lang="en">
@include('admin.templates.partials.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
@include('admin.templates.partials.navbar')
<!-- /.navbar -->

{{-- sidebar --}}
@include('admin.templates.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6 mb-3">
                <h1 class="m-0 pl-4"><strong class="text-secondary">@yield('title')</strong></h1>
            </div><!-- /.col -->
                @yield('content')
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content-wrapper -->
@include('admin.templates.partials.footer')

<!-- Control Sidebar -->
{{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside> --}}
<!-- /.control-sidebar -->
{{-- </div> --}}
<!-- ./wrapper -->
@include('admin.templates.partials.script')
</body>
</html>
