#!/usr/bin/php
<?php
require('rabbitMQ/rabbitClient.php');
$uname = $_POST['username'];
$pwd = $_POST['password'];

$response = authentication($uname, $pwd);

if($reponse == false){
	echo "Login Failed";
