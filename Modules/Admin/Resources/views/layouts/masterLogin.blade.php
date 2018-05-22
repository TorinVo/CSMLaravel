<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
<!-- BEGIN HEAD -->
<head>
	@include('admin::layouts.includes.head')
</head>
<body class="login">
    <!-- CONTAINER -->
    @yield('content')
    <!-- END CONTAINER -->

{{-- @include('admin::layouts.includes.footer') --}}

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="global/plugins/respond.min.js"></script>
<script src="global/plugins/excanvas.min.js"></script>
<![endif]-->
@yield('before-scripts')
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('plugins-scripts')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('csm/layout4/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('csm/layout4/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ asset('csm/layout4/scripts/demo.j') }}s" type="text/javascript"></script>
@yield('page-scripts')
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init();
   Layout.init();
   Demo.init();
   QuickSidebar.init();
   @yield('ready-scripts')
});
</script>
@yield('after-scripts')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
