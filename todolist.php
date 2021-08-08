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
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

//it's good practice to free memory using mysqli_free_result();
//and then closing the connection using mysqli_close();

$task1 = mysqli_real_escape_string($conn, $_POST['task']);

$sql1 = "INSERT INTO `Tasks` (task) VALUES ('$task1')";

//save to database
 $result1 = mysqli_query($conn, $sql1);

 if(isset($_POST['delete'])){
     $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
     $query = "DELETE FROM Tasks WHERE id = $id_to_delete";

 }

?>


<!Doctype html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="todolist.css">
        </head>
			<title>To do list</title>
			<body>
				
				<h1 class="title">To-do-list</h1>
				
				<br><br>

                <form action="todolist.php" method="POST">
                    <div class="field">
				<input class="input" type="text" name="task" placeholder="Please enter your task" required="">

                </form>
				
				<br><br>

				<input class="submit" type="submit" value="Add" name="submit" >


                <br><br><br>

                <?php foreach ($tasks as $task){?>
                    <div class="input">
                                <h3><?php echo htmlspecialchars($task['task'])?></h3>
                                <h6><?php echo htmlspecialchars($task['created_at'])?></h6>

                                 <form action="todolist.php" method="POST">
                                     <input type="hidden" name="id_to_delete" value="<?php echo $task['id']?>">
                                     <input class="del" type="submit" name="delete" value="Delete">
                                 </form>
                    </div>


                <?php }?>



			</body>

	</html>
