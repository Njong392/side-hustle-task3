<?php

//connect to database
$conn = mysqli_connect('localhost', 'Njong','emy123', 'todo_list');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//write query for tasks
$sql = 'SELECT task,id,created_at FROM Tasks ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch resulting rows as an array
$tasks= mysqli_fetch_all($result, MYSQLI_ASSOC);

//it's good practice to free memory using mysqli_free_result();
//and then closing the connection using mysqli_close();




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

                <br>

                <?php foreach ($tasks as $task){?>
                    <div class="input">
                                <h3><?php echo htmlspecialchars($task['task'])?></h3>
                                <h6><?php echo htmlspecialchars($task['created_at'])?></h6>
                    </div>


                <?php }?>


            </div>
        </div>
			</body>
		</head>
	</html>
