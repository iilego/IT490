#!/usr/bin/php
<?php
include('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('db.php');
function authentication($username, $password){
	$userinfo = array();

	$username = $mysqli->escape_string($username);
	$result = $mysqli->query("SELECT * FROM users WHERE uname='$username' and pwd='$password'");

	$user = $result->fetch_assoc();

	if($result->num_rows == 0){
		echo "Incorrect\n";
		return false;
	}
	else{
		echo "Correct";
		$userinfo['uname'] = $user['uname'];
		$userinfo['pwd'] = $user['password'];
		return json_encode($userinfo);
	}
}

function requestProcessor($request){
	echo "recieved request".PHP_EOL;
	var_dump($request);
	if(!isset($request['type'])){
		return "ERROR: unsupported message type";
	}
	switch($request['type']){
		case "Login";
		return authentication($request['uname'], $request['pwd']);
		break;
	}
	return array("returnCode" => '0', 'message'=>"Server recieved request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "testServer");

$server->process_requests('requestProcessor');
exit();
?>
