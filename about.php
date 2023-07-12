<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['username'])) {
   header('location: home.php');
}
if (isset($_POST['login-submit'])) {
   $uname = $_POST['uname'];
   $feedback = $_POST['feedback'];

   $sql = "INSERT INTO feedback (uname, feedback) VALUES (?, ?)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$uname, $feedback]);
   echo '<script> alert("feedback submitted."); window.location.href = "about.php"; </script>';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>GadgetSearch</title>
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
    
    <link rel="stylesheet" href="style1.css">
</head>

<body>
   <header>
      <div>
         <a class="logo" href="user.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
      </div>
      <ul class="navbar">
         <li><a href="user.php">Home</a></li>
         <li><a href="gadget.php">Gadget</a></li>
         <li><a class="active" href="about.php">About Us</a></li>
      </ul>

      <ul class="navbar">
         <input type="search" class="search-bar" placeholder="Search . . . " id="search" /><i
            class="fa-solid fa-magnifying-glass"></i>
         <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>
      </ul>

      <div id="my-modal" class="modal">
         <form action="" method="POST" class="login-form">
            <i id="xmark" class="fa-solid fa-xmark fa-lg"></i>
            <div id="username" class="container">
               <?php echo $_SESSION['username'] ?>
            </div>


            <div class="logout">
               <a href="home.php">logout</a>
            </div>
         </form>
      </div>
   </header>
   <main>
      <div class="about">
         <h2 id="title-about">gadgetsearch</h2>
         <p class="information">With the growing number of gadgets in the market people are more confused than ever
            about buying new gadgets
            from the market. Many people don't know about the features and functionality of the gadget that they want to
            purchase. </p> <br>
         <p class="information">GadgetSearch a web platform that will allow users to see reviews and rating of various
            gadgets such as
            smartphones, laptops, tablets and other tech related devices and provide a clear concept about the gadget
            they want to purchase. </p>
      </div>
      <div class="map">
         <h1>Location on map</h1>
         <p><iframe
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15408.017013533878!2d85.32454960702925!3d27.6702355634462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e8d9058ce3%3A0x5f9f01647e956594!2z4KSV4KWN4KSv4KS-4KSl4KSr4KWL4KSw4KWN4KShIOCkh-CkqOCljeCkn-CksOCkqOCljeCkr-CkvuCkuOCkqOCksiDgpJXgpLLgpYfgpJw!5e0!3m2!1sne!2snp!4v1683545778767!5m2!1sne!2snp"
               width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
               referrerpolicy="no-referrer-when-downgrade"></iframe></p>
      </div>
      <form class="about-form" action="" method="post">
         <div class="feedback">
            <i id="feedbackuser" class="fa-solid fa-user"></i>
            <input type="text" class="u-name" placeholder="User-name" name="uname" required />
         </div>
         <textarea name="feedback" id="" cols="30" rows="5" class="feed-text"></textarea>
         <div class="feedback" id="submit-btn">
            <input type="submit" name="login-submit" id="login-submit" value="submit" />
         </div>
      </form>
   </main>
   <footer>
      <div class="row">
         <div class="coln">
            <h3>contact</h3>
            <ul>
               <li>
                  <i class="fa-solid fa-location-dot"></i><span class="content">Balkumari ,lalitpur</span>
               </li>
               <li><i class="fa-solid fa-phone"></i><span class="content">01-XXXXX ,(+977)98XXXXXXXX</span></li>
               <li><i class="fa-solid fa-envelope"></i><span class="content">gadgetsearch@gmail.com</span></li>
            </ul>
         </div>
         <div class="coln">
            <h3>About</h3>
            <ul>
               <li><a href="about.php">About us</a></li>
               <li><a href="#">Term & Condition</a></li>
            </ul>
         </div>
         <div class="coln">
            <h3>follow us</h3>
            <div>
               <a href="https://www.facebook.com/profile.php?id=100092486893685" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
               <a href="" class="icon"><i class="fa-brands fa-instagram"></i></a>
               <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
            </div>
         </div>
      </div>



      <center><i class="fa-regular fa-copyright"></i>opyright</center>
   </footer>
   <script src="javascript.js"></script>
</body>

</html>