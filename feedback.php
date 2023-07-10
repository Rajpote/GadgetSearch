<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['adminname'])) {
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
   <link rel="stylesheet" href="admin.css" />
   <title>GadgetSearch</title>
</head>

<body>
   <header>
      <div>
         <a class="logo" href="admin.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
      </div>
      <ul class="navbar">
         <li><a href="admin.php">Admin</a></li>
         <li><a href="gadgetdata.php">Gadget data</a></li>
         <li><a href="userdata.php">User data</a></li>
         <li><a class="active" href="feedback.php">User Feedback</a></li>
      </ul>
      <a href="home.php" class="logout">logout</a>
   </header>
   <main>
      <div class="userdata">
         <h1>user feedback</h1>
         <?php
         $query = "SELECT * FROM feedback";
         $stmt = $pdo->prepare($query);
         $stmt->execute();
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $total = count($data);
         $count = 1;
         if ($total != 0) {
            ?>
            <table border="1">
               <tr>
                  <th>S.N.</th>
                  <th>User Name</th>
                  <th>Feedback</th>
                  <th>Rating</th>
                  <th>Operation</th>
               </tr>
               <?php
               foreach ($data as $result) {
                  echo "
                        <tr>
                           <td>" . $count++ . "</td>
                           <td>" . $result['uname'] . "</td>
                           <td>" . $result['feedback'] . "</td>
                           <td>" . $result['rating'] . "</td>
                           <td>
                           <a href='deletefeedback.php?id=" . $result['Id'] . "'><input type='submit' value='delete' class='delete' name='delete-user'></a> 
                           </td>
                        </tr>
                     ";
               }
               ?>
            </table>
            <?php
         }
         ?>
      </div>
   </main>
   <script src="javascript.js"></script>
</body>

</html>