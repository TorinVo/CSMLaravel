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
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{{ route('admin.login.submit') }}" method="post">
        @csrf
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any Email and Password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label for="email" class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
			<input class="form-control form-control-solid placeholder-no-fix{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" autocomplete="off" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}"/>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group">
			<label for="password" class="control-label visible-ie8 visible-ie9">{{ __('Password') }}</label>
			<input class="form-control form-control-solid placeholder-no-fix{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" autocomplete="off" placeholder="{{ __('Password') }}" id="password" name="password"/>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}/>Remember </label>
			{{-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> --}}
            <a class="forget-password" href="{{ route('admin.password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
        </div>
		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
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
@endsection
