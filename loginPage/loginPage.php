<?php
require 'db.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Prototype</title>
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])){
		require 'login.php';
	}
}
?>
<body>
	<div id=login">
		<h1>Login</h1>
		<form action="loginPage.php" method="post" 				autocomplete="off">
			<label>Username</label>
			<input type="username" required 					autocomplete="off" name="username"/>
			<label>Password</label>
			<input type"password" required 						autocomplete="off" name="password"/>				<button name="login" />Login</button>
		</form>
	</div>
</body>
</html>
