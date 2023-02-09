<?php
    require "../config.php";
    session_start();
    if(isset($_GET["user_id"])){
        $_SESSION["userid"]=$_GET["user_id"];
    }
    $user_id= $_SESSION["userid"];         
    if(isset($_POST["newtask"])){
        $request="INSERT INTO task(task,id_user) VALUES (?,?)";
        $statement=$pdo->prepare($request);
        $statement->execute(array($_POST["newtask"],$user_id));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
</head>
<body>
    <table>
        <tr>
            <th>task</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <ul>
            <?php
                $request="SELECT * FROM task WHERE id_user=?";
                $statement=$pdo->prepare($request);
                $statement->execute(array($user_id));
                while($task=$statement->fetch()){
                    echo "<tr/>";
                    echo "<td/>".$task["task"]."</td>";
                    echo "<td><a href='updatetask.php?taskid=".$task["id"]."'>update</a></td>";
                    echo "<td><a href='deletetask.php?taskid=".$task["id"]."'>delete</a></td>";    
                }
            ?>
        </ul>
    </table>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">add task</label>
        <input type="text" name="newtask" placeholder="new task">
        <br>
        <input type="submit">
    </form>
</body>
</html>