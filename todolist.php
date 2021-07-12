<?php

//connect to database
$conn = mysqli_connect('localhost','emy','test1234','task');

//check connection
if(!$conn){
	echo 'Connection error:' . mysqli_connect_error();

}

//write query for tasks
$sql = 'SELECT task, id FROM tasks ORDER BY created_on';

// make query and get result
$result = mysqli_query($conn, $sql);

//fetch resulting rows as array
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);


print_r($tasks);


?>


<!Doctype html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="todolist.css">
			<title>To do list</title>
			<body>
				
				<h1 class="title">To-do-list</h1>
				
				<br><br>
				

				<div class="field">
				<label id="task"></label>
				<input class="input" type="text" name="task" id="task" placeholder="Please enter your task" required="Input a task">
			   
				
				<br><br>

				<input class="submit" type="submit" value="Add" name="submit" >
			    </div>
			</body>
		</head>
	</html>