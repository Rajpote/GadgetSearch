<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['username'])){
      header('location: home.php');
  }
 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="style1.css" />

      <title>Document</title>
   </head>
   <body>
      <header>
         <div>
            <a class="logo" href="user.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
         </div>
         <ul class="navbar">
            <li><a href="user.php">Home</a></li>
            <li><a class="active" href="gadget.php">Gadget</a></li>
            <li><a href="about.php">About Us</a></li>
         </ul>

         <ul class="navbar">
            <input type="search" class="search-bar" placeholder="Search . . . " id="search" /><i class="fa-solid fa-magnifying-glass"></i>
            <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>
         </ul>

         <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
            <div class="container">
                  <?php echo $_SESSION['username'] ?>
               </div>
               
                  
                  <div class="container">
                     <a href="home.php">logout</a>
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
      <div class="courses" id="courses">
        <p class="course-title">COURSES</p>
        <div class="course-grid-container">
        <?php
            $sql = "SELECT * FROM gadget_details LIMIT 7";
            $stmt = $pdo->query($sql);

            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    echo '<a href="gadgetdetails.php?g_id=' . $row['g_id'] . '" class="course-grid-item">' . $row['gname'] . '</a>';
                }
                echo '</div>';
            }else{
                echo "No courses found.";
            }
        ?>
    </div>
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
      <script src="javascript.js"></script>
   </body>
</html>
