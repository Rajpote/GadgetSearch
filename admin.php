<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['adminname'])){
      header('location: home.php');
  }
  $gadgetCount = $pdo->query("SELECT COUNT(g_id) FROM gadget_details") -> fetchColumn();
  $userCount = $pdo->query("SELECT COUNT(id) FROM register") -> fetchColumn();
  $feedbackCount = $pdo->query("SELECT COUNT(f_id) FROM feedback") -> fetchColumn();

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
      <link rel="stylesheet" href="admin.css"/>
      <title>GadgetSearch</title>
      <style>
         .grid-container {
   margin-top: 5vh;
   margin-left: 7vw;
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(15vw, 1fr));
   grid-gap: 1vw;
   width: 67vw;
}
p.count-item {
   margin: 10px;
   padding: 10px;
   border: 1px solid black;
}

i {
   padding: 5px;
   color: black;
}
      </style>
      
   </head>
   <body>
      <header>
         <div>
            <a class="logo" href="admin.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
         </div>
         <ul class="navbar">
            <li><a class="active" href="admin.php">Admin</a></li>
            <li><a href="gadgetdetail.php">Gadget</a></li>
            <li><a href="userdata.php">User data</a></li>
            <li><a href="feedback.php">user feedback</a></li>
         </ul>
         <div class="container">
            <?php echo $_SESSION['adminname'] ?> <br>
         </div> 
         <a href="home.php" class="logout">logout</a>
      </header>
      <main>
         <div class="grid-container">

            <p class="count-item">
            <i class="fa-solid fa-user"></i>
            Total user: <?php echo $userCount ?>
            </p>

            <p class="count-item">
            <i class="fa-solid fa-laptop-mobile"></i>
               Total gadget: <?php echo $gadgetCount ?>
            </p>
         
            <p class="count-item">
            <i class="fa-solid fa-comment"></i>
               Total feedback: <?php echo $feedbackCount ?>
            </p>
         </div>
      </main>
      <script src="javascript.js"></script>
   </body>
</html>
