<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['username'])) {
   header('location: home.php');
}
$g_id;
$i = 0;
$searchValue;
@$count = $_GET['count'];

do {
   @$g_id = $_GET[$i];

   if ($g_id != null) {
      $stmt = $pdo->prepare("SELECT * FROM gadget_details WHERE g_id = :g_id");
      $stmt->bindParam(':g_id', $g_id);

      $stmt->execute();
      $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $searchValue = true;
   } else {
      $searchValue = false;
   }
   $i++;
} while ($i < $count);


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
   <style>
      #gadget-category {
         position: sticky;
         top: 11%;
         border: 1px solid black;
         margin-left: 90vw;
         z-index: 1;
      }

      .category-container {
         width: 25%;
         height: 15%;
         font-size: 20px;
         z-index: -1;
      }

      .category-item {
         margin: 10px 0 10px 0;
         display: flex;
         align-items: center;
         padding: 0 10px 0 10px;
         text-decoration: none;
         color: black;
         cursor: pointer;
      }

      .category-item i {
         padding: 0 10px 0 10px;

      }
   </style>

   <title>GadgetSearch</title>

</head>

<body>
   <?php
   if ($searchValue) { ?>


      <ul class="navbar">
         <form action="search.php" method="post">
            <input type="text" name="search" class="search-bars" placeholder="Search . . . " id="search" /><i
               class="fa-solid fa-magnifying-glass"></i>
         </form>
      </ul>

      <h2 class="result">Found results.</h2>
      <?php
      echo '<div class="searchcontainer">';
      foreach ($value as $item) {
         echo '<a href="gadgetdetails.php?g_id=' . $item[0]['g_id'] . '" class="search-item">';
         echo "<img class='pro-img' src='image/product/{$item['gimage']}' alt='Gadget Image'>";
         echo '<p class="pro-name">' . $item[0]['gname'] . '</p>';
         echo '</a>';
      }
      echo '</div>';
      ?>
      <?php
   } else { ?>
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
            <form action="search.php" method="post">
               <input type="text" name="search" class="search-bar" placeholder="Search . . . " id="search" /><i
                  id="search-icon" class="fa-solid fa-magnifying-glass"></i>
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
      <div id="gadget-category">
         <div class="category-container">
            <p class="filter-title"><i class="fa-solid fa-filter"></i></p>
         </div>
         <div class="category-container">

            <a href="category.php?type=laptop" class="category-item"><i class="fa-solid fa-laptop"></i>Laptop</a>
            <a href="category.php?type=phone" class="category-item"><i class="fa fa-mobile-phone"></i>Phone</a>
            <form action="price_range.php" method="POST">
               <input type="number" name="base_price" id="base_price">
               <input type="number" name="upper_price" id="upper_price">
               <input type="submit" value="submit">
            </form>
         </div>
      </div>
      <main>
         <div class="gadget" id="gadget">
            <h1 class="title">Gadgets</h1>
            <div class="gadget-grid-container">
               <?php
               $sql = "SELECT * FROM gadget_details";

               if (isset($_GET['type'])) {
                  $type = $_GET['type'];
                  $sql .= " WHERE type = '$type'";
               }

               $stmt = $pdo->query($sql);

               if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch()) {
                     echo '<a href="gadgetdetails.php?g_id=' . $row['g_id'] . '" class="gadget-grid-item">';
                     echo "<img class='gadget-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                     echo '<p class="gadget-name">' . $row['gname'] . '</p>';
                     echo '<p class="gadget-price">' . $row['gprice'] . '</p>';
                     echo '</a>';
                  }
               } else {
                  echo "No courses found.";
               }
               ?>
            </div>
         </div>
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
                  <a href="" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                  <a href="" class="icon"><i class="fa-brands fa-instagram"></i></a>
                  <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
               </div>
            </div>
         </div>
         <center>copyright</center>
      </footer>
   <?php } ?>

   <script>
      function showDeviceType(type) {
         window.location.href = "category.php?type=" + type;
      }
   </script>
   <script src="javascript.js"></script>
</body>

</html>