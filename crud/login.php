<?php
    require "config.php";
    #declaration ndiroha ldakhel cuz m3labalnach ida var nkhdmo bih wela no
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username) or empty($password) ){
            echo "please enter your informations";
            header("REFRESH:3;URL=signupform.php");
        }else{
            $request = "SELECT * FROM users WHERE username=?";
            $statement=$pdo->prepare($request);
            $statement->execute(array($username));
            $existe_username=$statement->rowcount();
            if($existe_username==0){
                echo "false username";
                header("REFRESH:2:URL=loginform.php");  
            }else{
                $user=$statement->fetch();#statement mt9rahach l array tsma ndiro fetch bach trdha array wmor mndiro fetch nwlo nkhdmo blvar machy b statement
                if($user["password"]==$password){
                    header("location:task/task.php?user_id=".$user["id"]);
                }else{
                    echo "password incorrect";
                header("REFRESH:2:URL=loginform.php");
                }
            }
        }
    }else {
        echo "you cant access";
        header("URL=signupform.php");
    }
    #header("url=.php");
?>    