<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>flight schedule</title>
	</head>
	<body>
		<center>
		<h1>Sign up</h1>
		<form action="signup.php" method="POST">
			Account:<br><input type="text" name="email" placeholder="Account"><br>
			Password:<br><input type="password" name="password" placeholder="Password"><br>
			<select name="admin">
				<Option value="1">admin</Option>
				<Option value="0">user</Option>
			</select><br><br>
			<button type="submit">sign up</button>
		</form>
		<p>
		<a href="signin.php">Sign in</a>
		</p>
		</center>
	</body>
</html>
<style type="text/css">
html, body{
background-color:black;
background-size: 100%!important 100%!important;
width: 100%;
height: 100%;
}
font,a,h1,form {
	color: white;
}
</style>