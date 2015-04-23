<!DOCTYPE html>
<html>
<head>
	<title>My to-do list</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	 <div class="wrap">
			<div class="task-list">
				<ul>
					<?php require("includes/connect.php"); ?>
				</ul>
			</div>
		</div>
		<form class="add-new-task" autocomplete="off">
			<input type="text" name="new-task" placeholder="Add new item..."/>
		</form>
		</div>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); //calling the add task function

	function add_task(){
		$('.add-new-task').submit(function())
	}
</script>
</html>