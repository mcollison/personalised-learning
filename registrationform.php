<?
include_once 'connect.php';
include_once 'functions.php';
include_once 'regprocess.php';
?>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/cia.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<form name="registration" method="post" action="regprocess.php">
	<table border="0" width="500" align="center" class="demo-table">
		
		<tr>
			<td>User Name</td>
			<td><input type="text" class="demoInputBox" name="userName" value=""></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" class="demoInputBox" name="firstName" value=""></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" class="demoInputBox" name="lastName" value=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" class="demoInputBox" name="password" value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" class="demoInputBox" name="userEmail" value=""></td>
		</tr>
		
		<tr>
			<td colspan=2>
			<input type="submit" name="register-user" value="Register" class="btnRegister"></td>
		</tr>
	</table>
</form>
</body>
</html>