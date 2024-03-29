<?php
session_start();
include 'connect.php';

if (isset($_POST['login-submit'])) {
   $uname = $_POST['uname'];
   $cpassword = ($_POST['password']);

   $query = "SELECT * FROM register WHERE uname = ? AND cpassword = ?";
   $stmt = $pdo->prepare($query);
   $stmt->execute([$uname, $cpassword]);
   $result = $stmt->fetch();

   if ($result) {
      if ($result['uname'] == 'Admin123' && $result['password'] == '$2y$10$3xYGyOoYymKkwoLqdtHVe.D6Wzt2dOUu6AFQBUgVpjE' || $result['cpassword'] == '@dmin123') {
         $_SESSION['adminname'] = $result['uname'];
         header('location: admin.php');
      } else {
         $_SESSION['username'] = $result['uname'];
         header('location: user.php');
      }
   } else {
      echo '<script> alert("Incorrect username or password."); </script>';
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

   <link rel="stylesheet" href="style1.css">

   <title>GadgetSearch</title>

</head>

<body>
   <header>
      <div>
         <a class="logo" href="home.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
      </div>
      <ul class="navbar">
         <li><a class="active" href="home.php">Home</a></li>
         <li><a href="#" onclick="alertPopup('login first')">Gadget</a></li>
         <li><a href="#" onclick="alertPopup('login first')">About Us</a></li>
      </ul>
      <button id="modal-btn" class="login-btn">Login <i class="fa-solid fa-right-to-bracket"></i></button>

      <div id="my-modal" class="modal">
         <form action="" method="POST" class="login-form">
            <i class="fa-solid fa-xmark fa-lg"></i>
            <div class="container">
               <i class="fa-solid fa-user"></i>
               <input type="text" class="uname" placeholder="User-name" name="uname" required />
            </div>
            <div class="container">
               <i class="fa-solid fa-lock"></i>
               <input type="password" class="uname" id="password" placeholder="password" name="password" required />
            </div>
            <input type="checkbox" class="checkbox-login" onclick="loginPassword()" />
            <div class="show-password">Show Password</div>
            <div>
               <input type="submit" class="submit-login" name="login-submit" id="login-submit" value="Login" />
            </div>
         </form>
      </div>
      <button class="signup">
         <a href="register.php">signup</a>
      </button>
   </header>
   <main>
      <div id="hero">
         <img src="image/backgrounds/My project.png" alt="background image" class="background1" />
         <div class="cont-text">
            <h3>Your search is here</h3>
            <h1>gadgetsearch</h1>
            <p>make your life easy & happy</p>
         </div>
      </div>
      <section id="slider">
         <h2 class="product-category">best gadget Deals</h2>
         <div class="product-details">
            <div class="pro-container">
               <?php
               $sql = "SELECT * FROM gadget_details WHERE category = 'deals' limit 6";
               $stmt = $pdo->query($sql);

               if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch()) {
                     echo '<a href="#" onclick="alertPopup()" class="slider-card">';
                     echo "<img class='pro-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                     echo '<p class="pro-name">' . $row['gname'] . '</p>';
                     echo '<p class="pro-name">Rs:' . $row['gprice'] . '</p>';
                     echo '</a>';
                  }
               } else {
                  echo "No deals found.";
               }
               ?>
            </div>

         </div>
      </section>
      <section class="brands">
         <h2 class="brand1">Brands</h2>
         <div class="container-brands">
            <a href="https://www.mi.com/np/phone" target="_blank"><img src="image/brands/mi.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.acer.com/us-en" target="_blank"><img src="image/brands/Acer.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.apple.com/" target="_blank"><img src="image/brands/APPLE.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.samsung.com/us/" target="_blank"><img src="image/brands/Samsung.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.dell.com/en-us" target="_blank"><img src="image/brands/dell.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.asus.com/np/" target="_blank"><img src="image/brands/asus.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.msi.com/index.php" target="_blank"><img src="image/brands/msi.png" alt=""
                  class="image-brands" /></a>
            <a href="https://www.hp.com/us-en/home.html" target="_blank"><img src="image/brands/hp.png" alt=""
                  class="image-brands" /></a>
         </div>
      </section>
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
               <li><a href="about.php" onclick="alertPopup()">About us</a></li>
               <li><a href="#" onclick="alertPopup()">Term & Condition</a></li>
            </ul>
         </div>
         <div class="coln">
            <h3>follow us</h3>
            <div>
               <a href="" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
               <a href="" target="_blank" class="icon"><i class="fa-brands fa-instagram"></i></a>
               <a href="" target="_blank" class="icon"><i class="fa-brands fa-twitter"></i></a>
            </div>
         </div>
      </div>
      <center><i class="fa-regular fa-copyright"></i>opyright</center>
   </footer>

   <script src="javascript.js"></script>
</body>

</html>