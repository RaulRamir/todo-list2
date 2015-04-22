<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'tasks');

if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno .')'
		. $mysqli->connect_error);
}
else{
	echo "Connection made";
}
$mysqli->close;
?>