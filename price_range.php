<?php
session_start();
include('connect.php');

if (isset($_GET['pricerange'])) {
    $pricerange = $_GET['pricerange'];

    $sql = "SELECT * FROM gadget_details WHERE pricerange = :pricerange";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pricerange', $pricerange);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetSearch</title>
    <link rel="stylesheet" href="user-admin.css">
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
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
            <input type="search" class="search-bar" placeholder="Search . . . " id="search" /><i
                class="fa-solid fa-magnifying-glass"></i>
            <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>
        </ul>

        <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
                <div id="username" class="container">
                    <?php echo $_SESSION['username'] ?>
                </div>
                <div class="logout">
                    <a href="home.php">logout</a>
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
    <main class="gadget-main">
        <?php
        if (isset($pricerange) && !empty($devices)): ?>
            <h1 class="title">
                <?php echo $pricerange; ?>
            </h1>
            <div class="gadget-grid-container">
                <?php
                foreach ($devices as $device):
                    ?>
                    <a href="gadgetdetails.php?g_id=<?php echo $device['g_id']; ?>" class="g-item">
                        <img class='gadget-img' src="./image/product/<?php echo $device['gimage']; ?>">
                        <p class="gadget-name">
                            <?php echo $device['gname']; ?>
                        </p>
                        <p class="gadget-price">
                            <?php echo $device['gprice']; ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
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
    <script src="javascript.js"></script>


</body>

</html>