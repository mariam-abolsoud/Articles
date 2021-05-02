<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="ar">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Articles</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		<link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->
		<link rel="shortcut icon" href="{{ Storage::URL('images/fav.jpg') }}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#">
										<img src="{{ Storage::URL('images/logo.jpg') }}">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">Sign in to admin control panel </h3>
                                        @if(Session::has('error'))
                                            <h5 class="m-login__title text-danger">{{Session::get('error')}}</h5>
                                        @endif
									</div>
									<form class="m-login__form m-form" action="{{ route('AdminLogin') }}" method="post">
                                        @csrf
										<div class="form-group m-form__group">
											<input id="email" type="email" placeholder="E-mail" class="form-control m-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="email-error">
                                            @error('email')
                                                <div id="email-error" class="form-control-feedback">{{ $message }}</div>
                                            @enderror
										</div>
										<div class="form-group m-form__group">
											<input id="password" type="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <div id="password-error" class="form-control-feedback">{{ $message }}</div>
                                            @enderror
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >Remmember me
													<span></span>
												</label>
											</div>
											
										</div>
										<div class="m-login__form-action">
											<button id="" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Log in</button>
										</div>
									</form>
								</div>
								
                                
								<?php /*<div class="m-login__forget-password">
									<div class="m-login__head">
										<h3 class="m-login__title">{{ __('messages.forgetten password ?')}}</h3>
										<div class="m-login__desc">{{ __('messages.Enter your email to reset your password:')}}</div>
									</div>
									<form class="m-login__form m-form" action="{{ route('password.email') }}" method="post" id="reset_form">
                                        @csrf

                                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
										<div class="form-group m-form__group">
											<input id="email" type="email" placeholder="{{ __('messages.Email') }}" autocomplete="off" class="form-control m-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                
										</div>
										<div class="m-login__form-action">
											<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">{{ __('messages.Request')}}</button>
											<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">{{ __('messages.Cancel')}}</button>
										</div>
									</form>
								</div>*/?>
							</div>
						</div>
					
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(../../../assets/app/media/img//bg/bg-4.jpg)">
					<div class="m-grid__item">
						<h3 class="m-login__welcome">Articles</h3>
						<p class="m-login__msg">
							
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->
        
        
		<!--begin::Global Theme Bundle -->
		<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts -->
		<script src="{{asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $( '#m_login_forget_password_submit' ).click( function ( event ) {
                {
                    event.preventDefault();
                    $( "#reset_form" ).submit();
                     
                    
                }
            })
        </script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>