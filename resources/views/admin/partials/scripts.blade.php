<!-- REQUIRED JS SCRIPTS -->

<!-- AdminLTE App -->
<script src="{{asset('public/admin_assets')}}/dist/js/app.min.js"></script>

@stack('scripts')

<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
