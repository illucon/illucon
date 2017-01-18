<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('admin.partials.htmlheader')
@show
<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('admin.partials.mainheader')

    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('admin.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin.partials.mainfooter')
    @include('admin.partials.controlsidebar')


</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('admin.partials.scripts')
@show

</body>
</html>
