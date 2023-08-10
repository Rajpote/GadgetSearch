<?php
session_start();
include('connect.php');

$perPage = 5; // Number of gadgets to display per page

if (isset($_GET['pricerange']) && isset($_GET['type'])) {
    $pricerange = $_GET['pricerange'];
    $type = $_GET['type'];
    @$category = $_GET['category'];


    $sql = "SELECT COUNT(*) AS total FROM gadget_details WHERE pricerange = :pricerange";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pricerange', $pricerange);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalGadgets = $result['total'];

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $perPage;

    $sql = "SELECT * FROM gadget_details WHERE pricerange = :pricerange AND type = :type LIMIT $offset, $perPage";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pricerange', $pricerange);
    $stmt->bindParam(':type', $type);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_GET['pricerange'])) {
    $pricerange = $_GET['pricerange'];

    $sql = "SELECT COUNT(*) AS total FROM gadget_details WHERE pricerange = :pricerange";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pricerange', $pricerange);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalGadgets = $result['total'];

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $perPage;

    $sql = "SELECT * FROM gadget_details WHERE pricerange = :pricerange LIMIT $offset, $perPage";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pricerange', $pricerange);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$g_id = null;
$i = 0;
$searchValue = false;
@$count = isset($_GET['count']) ? $_GET['count'] : 0;

do {
    @$g_id = $_GET[$i];

    if ($g_id != null) {
        $stmt = $pdo->prepare("SELECT * FROM gadget_details WHERE g_id = :g_id");
        $stmt->bindParam(':g_id', $g_id);
        $stmt->execute();
        $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $searchValue = true;
    }
    $i++;
} while ($i < $count);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style1.css">
    <title>GadgetSearch</title>
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
                        <?php echo $_SESSION['username']; ?>
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
                <a href="category.php?category=bestbuy" class="category-item"><i class="fa-solid fa-cart-shopping"></i>Beat
                    Buy</a>
                <a href="type.php?type=laptop" class="category-item"><i class="fa-solid fa-laptop"></i>Laptop</a>
                <a href="type.php?type=phone" class="category-item"><i class="fa fa-mobile-phone"></i>Phone</a>
                <a href="type.php?type=accessories" class="category-item"><i class="fa fa-mobile-phone"></i>Accessories</a>

                <h4>price range</h4>
                <button class="pricerange1"><a href="price_range.php?pricerange=1000-10000&<?php if (isset($_GET['type'])) {
                    echo "type=";
                    echo $type;
                } ?>" class="category-item">1k-10k</a></button>
                <button class="pricerange1"><a href="price_range.php?pricerange=10000-50000&<?php if (isset($_GET['type'])) {
                    echo "type=";
                    echo $type;
                } ?>" class="category-item">10k-50k</a></button>
                <button class="pricerange1"><a href="price_range.php?pricerange=50000-100000&<?php if (isset($_GET['type'])) {
                    echo "type=";
                    echo $type;
                } ?>" class="category-item">50k-100k</a></button>
                <button class="pricerange1"><a href="price_range.php?pricerange=100000-150000&<?php if (isset($_GET['type'])) {
                    echo "type=";
                    echo $type;
                } ?>" class="category-item">100k-150k</a></button>
                <button class="pricerange1"><a href="price_range.php?pricerange=150000-200000&<?php if (isset($_GET['type'])) {
                    echo "type=";
                    echo $type;
                } ?>" class="category-item">150k-200k</a></button>
            </div>
        </div>
        <main class="gadget-main">
            <?php if (isset($pricerange) && !empty($devices)): ?>
                <h1 class="title">
                    <?php echo $pricerange; ?>
                </h1>
                <div class="gadget-grid-container">
                    <?php foreach ($devices as $device): ?>
                        <a href="gadgetdetails.php?g_id=<?php echo $device['g_id']; ?>" class="g-item">
                            <img class='gadget-img' src="./image/product/<?php echo $device['gimage']; ?>">
                            <div class="gadget-name">
                                <?php echo $device['gname']; ?>
                            </div>
                            <div class="gadget-price">Rs:
                                <?php echo $device['gprice']; ?>
                            </div>
                            <img class='ratingstar3' src='image/rating/<?php echo $device['rating']; ?>' alt='rating Image'>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    $totalPages = ceil($totalGadgets / $perPage);
                    $prevPage = $currentPage - 1;
                    $nextPage = $currentPage + 1;

                    if ($currentPage > 1) {
                        echo "<a href='gadget.php?pricerange=$pricerange&page=$prevPage' class='page-link'>&#171; Previous</a>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = ($i == $currentPage) ? 'active' : '';
                        echo "<a href='gadget.php?pricerange=$pricerange&page=$i' class='page-link $activeClass'>$i</a>";
                    }

                    if ($currentPage < $totalPages) {
                        echo "<a href='gadget.php?pricerange=$pricerange&page=$nextPage' class='page-link'>Next &#187;</a>";
                    }
                    ?>
                </div>
            <?php endif; ?>
        </main>
    <footer>
        <div class="row">
            <div class="coln">
                <h3>contact</h3>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i><span class="content">Balkumari ,lalitpur</span></li>
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
                    <a href="https://www.facebook.com/profile.php?id=100092486893685" class="icon"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <center><i class="fa-regular fa-copyright"></i>opyright</center>
    </footer>
    <script src="javascript.js"></script>
</body>

</html>