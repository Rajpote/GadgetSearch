<?php
    session_start();
    require_once 'connect.php';

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
                <a class="logo" href="admin.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
            </div>
            <ul class="navbar">
                <li><a href="admin.php">Admin</a></li>
                <li><a href="gadgetdetail.php">Gadget</a></li>
                <li><a class="active" href="userdata.php">User data</a></li>
                <li><a href="feedback.php">User Feedback</a></li>
            </ul>
            <div class="container">
                <?php echo $_SESSION['adminname'] ?> <br>
            </div>
            <a href="home.php" class="logout">logout</a>
        </header>
        <main>
            <div class="userdata">
                <h1>user details</h1>
                <?php
                    $query = "SELECT * FROM register";
                    $stmt = $pdo->query($query);
                    $total = $stmt->rowCount();
                    $count = 1;
                    if ($total != 0) {
                ?>
                <table border="1">
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Gender</th>
                        <th>Ph number</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Operations</th>
                    </tr>
                    <?php
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "
                            <tr>
                                <td>".$count++."</td>
                                <td>".$result["uname"]."</td>
                                <td>".$result["gender"]."</td>
                                <td>".$result["phnumber"]."</td>
                                <td>".$result["email"]."</td>
                                <td>".$result["address"]."</td>
                                <td> <a href='update.php?id=".$result['id']."'><input type='submit' value='Update' class='update'></a>

                                 <a href='delete.php?id=".$result['id']."'><input type='submit' value='delete' class='delete' name='delete-user'></a></td>
                            </tr>    
                            ";
                        }
                    }
                    ?>
                </table>
            </div>
        </main>
        <script src="javascript.js"></script>
    </body>
</html>
