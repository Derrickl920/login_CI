<html>
<head>
	<title>Login and Registration WiTH CI</title>
	<meta charset='utf-8'>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	#loginform, #registerform{
		text-align: center;
	}
	</style>
</head>
<body>
<?php 
	if($this->session->flashdata('login_error'))
	{
		echo $this->session->flashdata('login_error');
	}
	?>
	<form id='loginform' action='/students/login' method='post'>
		<h1>Login</h1>
		Email: <input type='text' name='email'><br>
		Password: <input type='password' name='password'><br>
				<input type = 'submit' value='Login'>
				<input type='hidden' name='action' value='login'>
	</form>
	<form id='registerform' action='students/register' method='post'>
		<h1>Register</h1>
		First Name: <input type='text' name='firstname'><br>
		Last Name: <input type='text' name='lastname'><br>
		Email: <input type='text' name='email'><br>
		Password: <input type='password' name='password'><br>
		Confirm Password: <input type='password' name='confirmpassword'>
				<input type = 'submit' value='register'>
				<input type='hidden' name='action' value='register'>
	</form>


</body>
</html>