<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM register WHERE uname = ? AND email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $email, $password]);
        $result = $stmt->fetch();

        if($result){
            echo '<script> alert("User already exists.") </script>';
        }else{
            $sql = "INSERT INTO register (uname, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$uname, $email, $password]);
            echo '<script> alert("User registered successfully."); window.location.href = "home.php"; </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style2.css">
  <title>register</title>
 </head>
 <body>
  <div class="container1">
   <form action="" method="POST" class="register-form">
    <div>
     <h1>register</h1>
    </div>
    <div class="container">
     <label for="uname">user name:</label>
     <input type="text" id="uname" name="uname" required/>
    </div>
    <div class="container">
     <label for="password">password:</label>
     <input type="text" id="pass" name="password" required/>
    </div>
    <div class="container">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required/>
       </div>
    <div class="container0">
        <input type="checkbox" checked="checked">
        <span>I agree with all thr <strong>term & condition</strong> </span>
    </div>
     <div class="reg-btn">
     <input type="submit" class="submit" name="submit" id="submit" value="Register">
     </div>
   </form>
  </div>
 </body>
</html>
