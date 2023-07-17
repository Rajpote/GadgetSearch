<?php
session_start();
include 'connect.php';

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $phnumber = $_POST['phnumber'];
    $address = $_POST['address'];

    // Check if the user already exists
    $sql = "SELECT * FROM register WHERE uname = ? AND email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$uname, $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo '<script> alert("User already exists."); </script>';
    } else {
        // Check if the passwords match
        if ($password !== $cpassword) {
            echo '<script> alert("The passwords do not match."); </script>';
        } else {
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            

            // Insert the user data into the database
            $sql = "INSERT INTO register (uname, email, password, cpassword, gender, phnumber, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$uname, $email, $password, $cpassword, $gender, $phnumber, $address]);
            echo '<script> alert("User registered successfully."); window.location.href = "home.php"; </script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style2.css">
    <title>Register</title>
</head>

<body>
    <div class="container1">
        <form action="" method="POST" class="register-form">
            <div>
                <h1>Register</h1>
            </div>
            <div class="container">
                <label for="uname">User name:</label>
                <input type="text" id="uname" name="uname" required />
            </div>
            <div class="container">
                <label for="password">Password:</label>
                <input type="password" id="pass" name="password" required />
            </div>
            <div class="container">
                <label for="C password">Confirm password:</label>
                <input type="password" id="pass" name="cpassword" required />
            </div>
            <div class="container">
                <label for="gender">Gender:</label>
                <select name="gender" id="">
                    <option value="not-select">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br>
            </div>
            <div class="container">
                <label for="phone number">Phone Number:</label>
                <input type="number" id="num" name="phnumber" required />
            </div>
            <div class="container">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="container">
                <label for="Address">Address:</label>
                <textarea name="address" id="" cols="30" rows="2" name="address"></textarea>
            </div>
            <div class="container0">
                <input type="checkbox">
                <span>I agree with all thr <strong>term & condition</strong> </span>
            </div>
            <div class="reg-btn">
                <input type="submit" class="submit" name="submit" id="submit" value="Register">
            </div>
        </form>
    </div>
</body>

</html>