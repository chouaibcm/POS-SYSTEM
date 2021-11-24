<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>POS SYSTEM</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180"  href="{{asset('uploads/logo/logo.png')}}">
	<link rel="icon" type="image/png" sizes="32x32"  href="{{asset('uploads/logo/logo.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('uploads/logo/logo.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
               <a href="#">
                <div class="brand-text brand-big visible text-uppercase"><i class="icon-copy fi-star text-primary"></i><strong class="text-primary">   POS</strong><strong class="text-info">SYSTEM</strong></div>
               </a>
            </div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('backend/vendors/images/login-page-img.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Se connecter à POS SYSTEM</h2>
						</div>
						<form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
							@include('partials._errors')
							<div class="input-group custom">
								<input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary btn-lg btn-block" style="color: honeydew">Connexion</button>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('backend/vendors/scripts/core.js')}}"></script>
	<script src="{{ asset('backend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{ asset('backend/vendors/scripts/process.js')}}"></script>
	<script src="{{ asset('backend/vendors/scripts/layout-settings.js')}}"></script>
</body>
</html>
