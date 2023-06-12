<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['adminname'])) {
    header('location: home.php');
}
$gadgetCount = $pdo->query("SELECT COUNT(g_id) FROM gadget_details")->fetchColumn();
$userCount = $pdo->query("SELECT COUNT(id) FROM register")->fetchColumn();
$feedbackCount = $pdo->query("SELECT COUNT(Id) FROM feedback")->fetchColumn();

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
            <li><a class="active" href="gadgetdata.php">Gadget data</a></li>
            <li><a href="userdata.php">User data</a></li>
            <li><a href="feedback.php">user feedback</a></li>
        </ul>
        <div class="container">
            <?php echo $_SESSION['adminname'] ?> <br>
        </div>
        <a href="home.php" class="logout">logout</a>
    </header>
    <main id="gadgetdata">
        <div class="gadgetdata">
            <div class="table-content">
                <h1>
                    no of gadgets
                </h1>
            </div>
            <div class="table-content">

                <?php
                $query = "SELECT * FROM gadget_details";
                $stmt = $pdo->query($query);
                $total = $stmt->rowCount();
                $count = 1;
                if ($total != 0) {
                    ?>
                    <table border="1">
                        <tr>
                            <th>S.N.</th>
                            <th>Gadget Name</th>
                            <th>price</th>
                        </tr>
                        <?php
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>
                        <td>" . $count++ . "</td>
                        <td>" . $result["gname"] . "</td>
                        <td>" . $result["gprice"] . "</td>
                        </tr>";
                        }
                }
                ?>
                </table>
                <a class="add-btn" href="gadgetdetail.php">Manage gadgets</a>
            </div>

        </div>
    </main>
    <script src="javascript.js"></script>
</body>

</html>