<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>
	<title>AdminKIT - Premium Admin Template (v1.3)</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="{{asset('Adminkit/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />
	<link href="{{asset('Adminkit/bootstrap/css/responsive.css')}}" rel="stylesheet" />
	
	<!-- Glyphicons Font Icons -->
	<link href="{{asset('theme/css/glyphicons.css')}}" rel="stylesheet" />
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="{{asset('theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css')}}" rel="stylesheet" />
	
	<!-- Main Theme Stylesheet :: CSS -->
	<link href="{{asset('theme/css/style.min.css')}}" rel="stylesheet" />
	
	
	<!-- LESS.js Library -->
	<script src="{{asset('theme/scripts/plugins/system/less.min.js')}}"></script>
</head>
<body class="login">
	
	<!-- Wrapper -->
<div id="login">

	<!-- Box -->
	<div class="form-signin">
		<h3>Sign in to Your Account</h3>
		
		<!-- Row -->
		<div class="row-fluid row-merge">
		
			<!-- Column -->
			<div class="span7">
				<div class="inner">
				
					<!-- Form -->
					<form method="post" action="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left">
						<label class="strong">Username or Email</label>
						<input type="text" class="input-block-level" placeholder="Your Username or Email address"/> 
						<label class="strong">Password <a class="password" href="">forgot your password?</a></label>
						<input type="password" class="input-block-level" placeholder="Your Password"/> 
						<div class="uniformjs"><label class="checkbox"><input type="checkbox" value="remember-me">Remember me</label></div>
						<div class="row-fluid">
							<div class="span5 center">
								<button class="btn btn-block btn-primary" type="submit">Sign in</button>
							</div>
							<div class="span2 center">or</div>
							<div class="span5 center">
								<a href="signup.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left" class="btn btn-block btn-info">Sign up</a>
							</div>
						</div>
					</form>
					<!-- // Form END -->
					
				</div>
			</div>
			<!-- // Column END -->
			
			<!-- Column -->
			<div class="span5">
				<div class="inner center">
					<p>Alternatively</p>
					<a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left" class="btn btn-icon-stacked btn-block btn-facebook glyphicons facebook"><i></i><span>Join using your</span><span class="strong">Facebook Account</span></a>
					<p>or</p>
					<a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left" class="btn btn-icon-stacked btn-block btn-google glyphicons google_plus"><i></i><span>Join using your</span><span class="strong">Google Account</span></a>
					<p>Having troubles? <a href="faq.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left">Get Help</a></p>
				</div>
			</div>
			<!-- // Column END -->
			
		</div>
		<!-- // Row END -->
		
		<div class="ribbon-wrapper"><div class="ribbon primary">members</div></div>
	</div>
	<!-- // Box END -->
	
</div>
<!-- // Wrapper END -->	
	<!-- JQuery -->
	<script src="{{asset('theme/scripts/plugins/system/jquery.min.js')}}"></script>
	
	<!-- Modernizr -->
	<script src="{{asset('theme/scripts/plugins/system/modernizr.js')}}"></script>
	
	<!-- Bootstrap -->
	<script src="{{asset('Adminkit/bootstrap/js/bootstrap.min.js')}}"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="{{asset('theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js')}}"></script>
	
	<!-- Common Demo Script -->
	<script src="{{asset('theme/scripts/demo/common.js')}}"></script>
	
	<!-- Holder Plugin -->
	<script src="{{asset('theme/scripts/plugins/other/holder/holder.js')}}"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="{{asset('theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js')}}"></script>

	
	
</body>
</html>