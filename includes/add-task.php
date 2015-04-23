<?php
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');
  include('connect.php');

  $mysqli = new mysqli('localhost', 'root', 'root', 'tasks');
  $mysqli ->query("INSERT INTO taskS VALUES('', '$task', '$date', '$time')");

	$query = "SELECT * FROM task WHERE tasks='$task' and date='$date' and time='$time' ";
?>