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
         echo '<p class="gadget-price">' . $item['gprice'] . '</p>';
         echo "<img class='ratingstar3' src='image/rating/{$item['rating']}' alt='rating Image'>";
         echo '</a>';
      }
      echo '</div>';
      ?>
      <?php
   } else { ?>
      <header>
         <div>
            <a class="logo" href="user.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
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
               <i id="xmark" class="fa-solid fa-xmark fa-lg"></i>
               <div id="username" class="container">
                  <?php echo $_SESSION['username'] ?>
               </div>

               <div class="logout">
                  <a href="logout.php">logout</a>
               </div>
            </form>
         </div>
      </header>

      <div id="gadget-category">
         <div class="filter">
            <center> <i class="fa-solid fa-filter" id="filtericon"></i> </center>
            <a href="category.php?type=bestbuy" class="category-item"><i class="fa-solid fa-cart-shopping"></i>Beat
               Buy</a>
            <a href="category.php?type=laptop" class="category-item"><i class="fa-solid fa-laptop"></i>Laptop</a>
            <a href="category.php?type=phone" class="category-item"><i class="fa fa-mobile-phone"></i>Phone</a>
            <a href="category.php?type=accories" class="category-item"><i class="fa fa-mobile-phone"></i>Accories</a>

            <center>
               <h4>price range</h4>
            </center><br>
            <button class="pricerange1"><a href="price_range.php?pricerange=10000-50000"
                  class="category-item">10k-50k</a></button>
            <button class="pricerange1"><a href="price_range.php?pricerange=50000-100000"
                  class="category-item">50k-100k</a></button>
            <button class="pricerange1"><a href="price_range.php?pricerange=100000-150000"
                  class="category-item">100k-150k</a></button>
            <button class="pricerange1"><a href="price_range.php?pricerange=150000-200000"
                  class="category-item">150k-200k</a></button>

         </div>
      </div>

      <main>
         <div class="gadget-grid-container">
            <h1 class="title">Gadgets</h1>
            <?php
            $sql = "SELECT * FROM gadget_details";

            if (isset($_GET['type'])) {
               $type = $_GET['type'];
               $sql .= " WHERE type = '$type'";
            }

            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
               while ($row = $stmt->fetch()) {
                  echo '<a href="gadgetdetails.php?g_id=' . $row['g_id'] . '" class="g-item">';
                  echo "<img class='gadget-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                  echo '<div class="gadget-name">' . $row['gname'] . '</div>';
                  echo '<div class="gadget-price">Rs:' . $row['gprice'] . '</div>';
                  echo "<img class='ratingstar3' src='image/rating/{$row['rating']}' alt='rating Image'>";
                  echo '</a>';
               }
            } else {
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