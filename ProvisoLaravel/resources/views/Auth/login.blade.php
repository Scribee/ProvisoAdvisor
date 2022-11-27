<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- mobile metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<!-- site metas -->
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Responsive-->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- fevicon -->
		<link rel="icon" href="images/fevicon.png" type="image/gif" />
		<!-- Scrollbar Custom CSS -->
		<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
		<!-- Tweaks for older IEs-->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--> 
    
		<title>Sign in</title>
	</head>
	<body style='background-color: grey'>
		<div>
			<button style='width:50px; height:50px'><a href = "{{route('home')}}" ><img src="images/back.png" alt="#"/></a></button>
		</div>
		<center>
			<div class="login">
				<div class="login_container">
					<div class="row">
						<div class="w-100">
							<h3>Login</h3>
							<form class="login_form" align='center' action="{{route('login.post')}}" method='POST'>
								@csrf
								
								<input class="login-input form-control enter" placeholder="Enter your email" type="text" name="email" required />
								<input class="login-input form-control enter" placeholder="Enter your password" type="text" name="password" required />
								<button class="sub_btn">Sign In</button>
							</form>
						</div>
					</div>
				</div>
				<br>
				<p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>	   
			</div>
		</center>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery-3.0.0.min.js"></script>
		<!-- sidebar -->
		<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	<?php
	 /*<form class="form" action="{{ route('login.post') }}" method="POST" name="login">
			@csrf
			<h1 class="login-title">Login</h1>
			<input type="text" class="login-input form-control" name="email" placeholder="Email" id="email" required/>
			<input type="password" class="login-input form-control" name="password" placeholder="Password" id="Password" required/>
			<input type="submit" value="Login" name="submit" class="login-button"/>
	   </form>
	   
	   @if (session('success'))
		<div class="alert alert-success" role="alert">
		{{ session('success') }}
		</div>
	   @endif
	  * 
	  */
	?>
</html>

