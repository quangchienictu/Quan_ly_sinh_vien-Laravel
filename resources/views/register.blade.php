<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
   <!--Made with love by Mutiullah Samim -->
   <base href="{{ asset('') }}"/>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<!-- <span><i class="fab fa-facebook-square"></i></span> -->
					<span><a href="redirect/google"><i class="fab fa-google-plus-square"></i></a></span>
					<!-- <span><i class="fab fa-twitter-square"></i></span> -->
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="{{route('register')}}" >
					@csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="name" name="name" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="email" name="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Enter the password" name="password2" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Register" class="btn float-right login_btn">
					</div>

				</form>
				
			</div>
			@if(count($errors)>0)
			<div class="alert alert-danger" style="margin: 0px 10px;">
				  <strong>Lỗi !</strong> {{$errors->first()}}
			</div>
			@endif
			@if(session('thongbao'))
			<div class="alert alert-success" style="margin: 0px 10px;">
				  <strong>Thành công !</strong> {{session('thongbao')}}
			</div>
			@endif
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					You have an account?<a href="login">Sign In</a>
				</div>


				
			</div>
		</div>
	</div>
</div>
</body>
</html>