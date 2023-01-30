<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xl-6">
			<div id="msg" style="color: green;"></div>
			<form method="post" id="signup">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" class="form-control">
				</div>
				<div class="form-group">
					<label>Gender : </label>
					<input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
				<div class="form-group">
					<label>Qualification : </label>
					<input type="checkbox" name="qualification[]" value="mca">MCA
					<input type="checkbox" name="qualification[]" value="bca">BCA
					<input type="checkbox" name="qualification[]" value="b.tech">B.Tech
				</div>
				<input type="submit" name="save" class="btn btn-info" value="Save">
			</form>
		</div>


		<!-- Login form -->
		<div class="col-xl-4" style="margin-left: 150px;">
			<h3>Login Form..</h3>
			<?php 
			session_start();
			if(isset($_SESSION['login_error']))
			{
				echo $_SESSION['login_error'];
				session_destroy();
			}
			?>
			<form method="post" action="login.php" id="login">
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" class="form-control">
				</div>
				<input type="submit" name="login" class="btn btn-info" value="Login">
			</form>
		</div>

	</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	$("#signup").validate({
		rules:{
			name : {
				required:true,
			},
			email : {
				required:true,
			},
			password : {
				required:true,
			},
			mobile : {
				required:true,
			},
		},

		submitHandler:function(form)
		{
			$.ajax({
				url : 'signup.php',
				type: 'POST',
				data: new FormData($('form')[0]),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					$("#msg").html('Data saved successfully');
				}
			});
		}
	});


	$("#login").validate({
		rules : {
			email : {
				required : true,
				email: true,
			},
			password : {
				required: true,
			},
		},
	});

</script>
</body>
</html>