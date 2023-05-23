<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['username'])){
      header('location: home.php');
  }

  $g_id;
  $i = 0;
  $searchValue;
  @$count = $_GET['count'];

  do{
      @$g_id = $_GET[$i];

      if($g_id != null){
              $stmt = $pdo->prepare("SELECT * FROM gadget_details WHERE g_id = :g_id");
              $stmt ->bindParam(':g_id', $g_id);

          $stmt ->execute();
          $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $searchValue = true;
      }else{
          $searchValue = false;
      }
      $i++;
  }while($i<$count);

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

      <title>GadgetSearch</title>
   </head>
   <body>
   <?php
        if($searchValue){?>
            
            
            <ul class="navbar">
            <form action="search.php" method="post">
            <input type="text" name="search" class="search-bars" placeholder="Search . . . " id="search" /><i class="fa-solid fa-magnifying-glass"></i>
            <!-- <input type="submit" value="submit"> -->
            </form>
         </ul>

            <h2 class="result">Found results.</h2>
            <?php
                echo '<div class="searchcontainer">';
                foreach($value as $item){
                        echo '<a href="gadgetdetails.php?g_id=' . $item[0]['g_id'] . '" class="search-grid-item">' . $item[0]['gname'] . '</a>';
                }
                echo '</div>';
            ?>
        <?php 
        }else{ ?>
      <header>
         <div>
            <a class="logo" href="user.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
         </div>
         <ul class="navbar">
            <li><a class="active" href="user.php">Home</a></li>
            <li><a href="gadget.php">Gadget</a></li>
            <li><a href="about.php">About Us</a></li>
         </ul>

         <ul class="navbar">
            <form action="search.php" method="post">
            <input type="text" name="search" class="search-bar" placeholder="Search . . . " id="search" /><i id="search-icon" class="fa-solid fa-magnifying-glass"></i>
            </form>
            <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>
         </ul>
         
         <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
               <div id="username" class="container">
                  <?php echo $_SESSION['username'] ?>
               </div>
               
                  <div class="logout">
                     <a href="logout.php">logout</a>
                  </div>
                  <i id="xmark" class="fa-solid fa-xmark fa-lg"></i>
            </form>
         </div>
         <div id="mobile">
            <a href="#" id="close"><i id="bar" class="fa-solid fa-xmark"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
         </div>
      </header>
      <main>
         <div id="hero">
            <img src="image/backgrounds/background.png" alt="" class="background1" />
            <div class="cont-text">
               <h3>Search has ended</h3>
               <h1>GadgetSearch</h1>
               <p>Make your life easy & happy</p>
            </div>
         </div>
         <section id="slider">
            <h2 class="product-category">best gadget Deals</h2>
            <div class="buttom-arrow">
               <button class="pre-btn"><span class="arrow">&#187;</span></button>
               <button class="nxt-btn"><span class="arrow">&#187;</span></button>
            </div>
            <div class="product-details">
               <div class="product-card">
                  <div class="product-image">
                     <a href="about.php"><img src="image/product/helious_2_2.png" class="product-thumb" alt="" /></a>
                  </div>
                  <div class="product-info">
                     <h2 class="product-brand">Acer</h2>
                     <p class="product-short-description">Best gaming laptop</p>
                     <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                     </div>
                     <span class="actual-price">Rs165000</span><br /><span class="price">Rs148500</span>
                  </div>
               </div>
               <div class="product-card">
                  <div class="product-image">
                     <img src="image/product/asus-vivobook-e410ma-price-nepal-budget-notebook.jpg" class="product-thumb" alt="" />
                  </div>
                  <div class="product-info">
                     <h2 class="product-brand">Asus</h2>
                     <p class="product-short-description">Best notebook</p>
                     <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                     </div>
                     <span class="actual-price">Rs125000</span><br /><span class="price">Rs95500</span>
                  </div>
               </div>
               <div class="product-card">
                  <div class="product-image">
                     <img src="image/product/acer-nitro-5_an515-55_rgb-kb_modelpreview_1_1.png" class="product-thumb" alt="" />
                  </div>
                  <div class="product-info">
                     <h2 class="product-brand">Acer</h2>
                     <p class="product-short-description">Best gaming laptop</p>
                     <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                     </div>
                     <span class="actual-price">Rs150000</span><br /><span class="price">Rs128500</span>
                  </div>
               </div>
               <div class="product-card">
                  <div class="product-image">
                     <img src="image/product/lenovo-thinkpad-x13-price-nepal-gen-1-laptop_1.jpg" class="product-thumb" alt="" />
                  </div>
                  <div class="product-info">
                     <h2 class="product-brand">Acer</h2>
                     <p class="product-short-description">Best ultrabook</p>
                     <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                     </div>
                     <span class="actual-price">Rs135000</span><br /><span class="price">Rs110000</span>
                  </div>
               </div>
            </div>
         </section>
         <section id="newarival">
            <h2>latest gadgets</h2>
            <p>new gadgets reviews</p>
            <div class="new-container">
               <div class="detailes">
                  <div class="pro-image">
                     <img src="image/product/helious_2_2.png" class="product-thumb" alt="" />
                  </div>
                  <div class="product-info">
                     <h3 class="product-brand">Acer</h3>
                     <h5 class="product-short-description">Best gamming laptop</h5>
                     <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="brands">
            <h2 class="brand1">Brands</h2>
            <div class="container-brands">
               <a class="item-brands" href="https://www.mi.com/np/phone"><img src="image/brands/mi.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.realme.com/global/"><img src="image/brands/realme.jpg" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.acer.com/us-en"><img src="image/brands/Acer.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.apple.com/"><img src="image/brands/apple.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.samsung.com/us/"><img src="image/brands/Samsung.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.dell.com/en-us"><img src="image/brands/dell.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.asus.com/np/"><img src="image/brands/asus.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.msi.com/index.php"><img src="image/brands/msi.png" alt="" class="image-brands" /></a>
               <a class="item-brands" href="https://www.hp.com/us-en/home.html"><img src="image/brands/hp.png" alt="" class="image-brands" /></a>
            </div>
         </section>
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
                     <li><a href="about.php">About us</a></li>
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
      <?php } ?>
      <script src="javascript.js"></script>
   </body>
</html>
