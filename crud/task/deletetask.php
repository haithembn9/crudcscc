<?php
    require "../config.php";
    if(isset($_GET["taskid"])){
        $request="DELETE FROM task WHERE id=?";
        $statement=$pdo->prepare($request);
        $statement->execute(array($_GET["taskid"]));
        header("location:task.php");
    }
?>