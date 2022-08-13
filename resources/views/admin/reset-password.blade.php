@extends('admin.layout.app')

@section('content')
<head>
	<title>Change Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('backend/assets/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				@if (session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                          @endif
				<form method="POST" action="{{ route('update.password') }}">
                    @csrf
					<span class="login100-form-title p-b-32">
						Reset Password
					</span>

					<span class="txt1 p-b-11">
						Current Password
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Name is required">
						<input class="input100" type="password" id="current_password"  name="old_password" >
						<span class="focus-input100"></span>

					</div>
					<div>
						@error('old_password')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					

                    <span class="txt1 p-b-11">
						New Password
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Password is required">
						<input class="input100" id="password" type="password" name="password" >
						<span class="focus-input100"></span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
					
                    <span class="txt1 p-b-11">
						Confirm Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Confirm Password is required">
						<input class="input100" id="password_confirmation" type="password" name="password_confirmation" >
						<span class="focus-input100"></span>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
    
@endsection
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>
