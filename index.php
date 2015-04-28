<!DOCTYPE html>
<html>
<head>
	<title>My to-do list</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
	<div id="screen"></div>
	<form id="input" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type='text' name='username' id ='username' autocomplete='off'>

</div>

<div class='password'>s
	<label for='password'>Password</label>
	<input type='text' name='password' id='password'>
</div>

<button type='button' id='register'>Register</button>
<button type='button' id='load'>Load</button>

	</form>
	 <div class="wrap">
			<div class="task-list">
				<ul>
					<?php require("includes/connect.php"); 

					$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
					$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
					if($result = $mysqli->query($query)){
						$numrows = $result->num_rows;
						if ($numrows>0) {
							while($row = $result->fetch_assoc()){
								$task_id = $row['id'];
								$task_name = $row["tasks"];

								echo '<li>
								<span>'.$task_name. '</span>
								<img id="'.$task_id.'" class="delete-button" width="10px" src="/images/close.svg"/>
								</li>';
								
							}
						}
					}

					?>
				</ul>
			</div>
		</div>
		<form class="add-new-task" autocomplete="off">
			<input type="text" name="new-task" placeholder="Add new item..."/>
		</form>
		</div>
</body>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); //calling the add task function

	function add_task(){
		$('.add-new-task').submit(function(){
			var new_task = $('.add-new-task input[name=new-task').val();

			if(new_task != '') {
				$.post('includes/add-task.php', {task: new_task}, function(data){
					$('add-new-task input[name=new-task]').val();
						$(data).appendTo('task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}

	$('.delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');

		$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
});
</script>
</html>