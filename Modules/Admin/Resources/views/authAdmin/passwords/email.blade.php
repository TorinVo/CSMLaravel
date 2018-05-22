@extends('admin::layouts.masterLogin')

@section('page-styles')
    <link href="{{ asset('csm/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="../../assets/admin/layout4/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="{{ route('admin.password.email') }}" method="post">
        @csrf
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-actions">
			{{-- <button type="button" id="back-btn" class="btn btn-default">Back</button> --}}
            <a type="button" class="btn btn-default" href="{{ route('admin.login') }}">
                {{ __('Back') }}
            </a>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<div class="copyright">
	 2014 © Metronic.
</div>
@endsection

@section('plugins-scripts')
    <script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-scripts')
    <script src="{{ asset('csm/pages/scripts/login.js') }}" type="text/javascript"></script>
@endsection


@section('ready-scripts')
    Login.init();
    $('.forget-form').show();
@endsection
