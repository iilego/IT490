#!/usr/bin/php
<?php
require('rabbitMQ/rabbitClient.php');
$uname = $_POST['username'];
$pwd = $_POST['password'];

$response = authentication($uname, $pwd);

if($reponse == false){
	echo "Login Failed";
}
else{
	echo "Login Successful";
	$userinfo = json_decode($reponse, true);
	$_SESSION['user'] = $userinfo['user'];
	$date = date("Y-m-d H:i:s");
	file_put_contents('login.log', $date." User: ".$uname."logged in.".PHP_EOL, FILE_APPEND);
}
?>

