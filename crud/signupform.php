<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
  <form action="signup.php" method="POST">
     <h1>
        sign up 
     </h1>
  
     <label for="">user name</label>
     <input type="text" name="username" placeholder="user name">
     
     <label for="">full name</label>
     <input type="text" name="fullname" placeholder="full name">
     
     <label for="">password</label>
     <input type="password" name="password" placeholder="password">

     <button type="submit">
        sign up
     </button>
<a href="loginform.php">already have an account</a>
  </form>



</body>
</html>