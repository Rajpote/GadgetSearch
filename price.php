<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
  <header>
         <div>
            <a class="logo" href="home.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
         </div>
         <ul class="navbar">
            <li><a href="home.php">Home</a></li>
            <li><a href="gadget.php">Gadget</a></li>
            <li><a class="active" href="price.php">Price</a></li>
            <li><a href="about.php">About Us</a></li>
         </ul>

         <ul class="navbar">
            <input type="search" class="search-bar" placeholder="Search . . . " id="search" /><i class="fa-solid fa-magnifying-glass"></i>
            <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>
         </ul>

         <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
               <div class="container">
                  <i class="fa-solid fa-user"></i>
                  <input type="text" class="uname" placeholder="User-name" name="uname" required/>
               </div>

               <div class="container">
                  <i class="fa-solid fa-lock"></i>
                  <input type="text" class="uname" placeholder="password" name="password" required/>
               </div>

               <span class="reg">
                  <a href="register.php">Register</a>
               </span>

               <input type="checkbox" class="checkbox-login" onclick="loginPassword()" />
               <div class="show-password">Show Password</div>

               <div>
                  <input type="submit" class="submit-login" name="login-submit" id="login-submit" value="Login" />
               </div>
               <i class="fa-solid fa-xmark fa-lg" style="color: #ffffff"></i>
            </form>
         </div>
         <div id="mobile">
            <a href="#" id="close"><i id="bar" class="fa-solid fa-xmark"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
         </div>
      </header>
      <main>

      </main>
  <footer>
            <div class="row">
               <div class="coln">
                  <h3>contact</h3>
                  <ul>
                     <li>
                        <a href="#"><i class="fa-solid fa-location-dot"></i><span class="content">Balkumari ,lalitpur</span></a>
                     </li>
                     <li><i class="fa-solid fa-phone"></i><span class="content">01-XXXXX ,(+977)98XXXXXXXX</span></li>
                     <li><i class="fa-solid fa-envelope"></i><span class="content">gadgetsearch@gmail.com</span></li>
                  </ul>
               </div>
               <div class="coln">
                  <h3>About</h3>
                  <ul>
                     <li><a href="about.html">About us</a></li>
                     <li><a href="#">Term & Condition</a></li>
                  </ul>
               </div>
               <div class="coln">
                  <h3>follow us</h3>
                  <div>
                     <a href="" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                     <a href="" class="icon"><i class="fa-brands fa-instagram"></i></a>
                     <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
                  </div>
               </div>
            </div>
            <center>copyright</center>
      </footer>
  </body>
</html>
