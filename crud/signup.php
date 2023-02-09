<?php
    require "config.php";
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($username) or empty($fullname) or empty($password) ){
            echo "please enter your informations";
            header("REFRESH:3;URL=signupform.php");
        }else{
            $request = "SELECT * FROM users WHERE username=?";
            $statement=$pdo->prepare($request);
            $statement->execute(array($username));
            $existe_username=$statement->rowcount();
            if($existe_username==0){
                $request = "INSERT INTO users(username,password,full_name) VALUES (?,?,?)";
                $statement=$pdo->prepare($request);
                $statement->execute(array($username,$password,$fullname)); 
                $user_id = $pdo->lastInsertID();
                header("location:task/task.php?user_id=".$user_id); 
            }else{
                    echo "username already existed";
                    header("REFRESH:2:URL=signupform.php");
                }
        }
    }else {
        echo "you cant access";
        header("URL=signupform.php");
    }
    header("url=task/task.php");
?>    