<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li><a href="price.php">Price</a></li>
            <li><a class="active" href="about.php">About Us</a></li>
         </ul>

         <ul class="navbar">
            <input type="search" class="search-bar" placeholder="Search . . . " id="search" /><i class="fa-solid fa-magnifying-glass"></i>
            <button id="modal-btn" class="login-btn">Login<i class="fa-solid fa-user"></i></button>
         </ul>

         <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
               <div class="container">
                  <i class="fa-solid fa-user"></i>
                  <input type="text" class="uname" placeholder="User-name" />
               </div>

               <div class="container">
                  <i class="fa-solid fa-lock"></i>
                  <input type="text" class="uname" placeholder="password" />
               </div>

               <span class="reg">
                  <a href="register.php">Register</a>
               </span>

               <input type="checkbox" class="checkbox-login" onclick="loginPassword()" />
               <div class="show-password">Show Password</div>

               <div class="login-btn">
                  <input type="submit" class="submit-login" name="login-submit" id="login-submit" value="Login" />
                  <i class="fa-solid fa-xmark fa-lg" style="color: #ffffff"></i>
               </div>
            </form>
         </div>
         <div id="mobile">
            <a href="#" id="close"><i id="bar" class="fa-solid fa-xmark"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
         </div>
  </header>
  <main>
    <h2>About GadgetSearch</h2>
    <p class="p1">with the growing of thecnology many people are confused to buy gadgets (smartphone.laptop.etc) that they want to purchases but doesn't have a clear veson of wat to buy or how to buy.</p>
    <p class="p2">we are a well established gadget review community that helps customers to buy gadget that they want to purchaces. we also provide pricising of gadget in present date which are abilable in online as well as offline market.</p>
    <p class="p3">our ail is to provide a good review of the gadget that customers are wanting to purchases</p>
  </main>
  <footer class="footer">
    <div class="footer-container">
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
            <li><a href="">About us</a></li>
            <li><a href="">Term & Condition</a></li>
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