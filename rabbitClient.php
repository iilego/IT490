#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function authentication($username, $password){
	$client = new rabbitMQClient("testRabbitMQ.ini", "testserver");
	if(isset($argv[1])){
		$msg = $argv[1];
	}
	else{
		$msg = "login";
	}
	
	$request = array();
	$request['type'] = "Login";
	$request['user'] = $username;
	$request['password'] = $password;
	$request['message'] = $msg;
	$response = $client->send_request($request);
	//$response = $client->publish($request);

	echo "client recieved response: " .PHP_EOL;
	return ($response);
	echo "\n\n";
}
