<?php
session_start();
include 'connect.php';

if (isset($_POST['login-submit'])) {
    $uname = $_POST['uname'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO feedback (uname, feedback) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$uname, $feedback]);

    echo '<script>alert("Feedback submitted successfully.");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetSearch</title>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="style1.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        main {
            margin: 9px 0px 0px 40px;
            background-color: transparent;
            width: 60%;
        }

        img.gadget {
            height: 25%;
            width: 35%;
        }

        .title {
            position: absolute;
            top: 2%;
            left: 35%;
            margin: 10px;
            font-size: 20px;
        }

        .elink {
            margin: 15px;
        }

        .elink a {
            text-decoration: none;
            color: blue;
            cursor: pointer;
        }

        form {
            display: block;
            /* margin: 10px 40px 10px 20px; */
            border: 1px solid black;
            width: 25%;
            padding: 10px 10px;
            border-radius: 12px;
            color: blue;
        }

        .feedback {
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 10px 10px;
        }

        #submit-btn.feedback {
            display: flex;
            align-items: center;
            justify-content: center;
            color: red;
        }

        h2 {
            margin: 12px 24px;
            text-transform: uppercase;
        }

        textarea {
            width: 90%;
            padding: 10px;
            margin: 15px;

        }

        input {
            width: 90%;
            padding: 5px 5px 5px 18px;
        }

        i#feedbackuser {
            position: absolute;
            left: 25px;

        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['g_id'])) {
        $g_id = $_GET['g_id'];

        $sql = "SELECT * FROM gadget_details WHERE g_id=:g_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':g_id', $g_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if (count($result) > 0) {
        ?>

        <div class="content-container">

            <?php
            $i = 0;
            foreach ($result as $row) {
                ?>

                <header>
                    <div>
                        <a class="logo" href="user.php"><img src="image/gadget search-logos/gadget search-1 (1).png"
                                alt="" /></a>
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
                <main>

                    <div class="image-pro">
                        <?php
                        echo "<img class='gadget' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                        ?>
                    </div>
                    <div class="title">
                        <h4 class="name" colspan="2">
                            <?php echo $row['gname']; ?>
                        </h4>
                        <h5 class="price">
                            <?php
                            echo "<p class='gprice'>{$row['gprice']} </p>";

                            ?>
                        </h5>
                    </div>
                    <p class="content content-cell-spacing" colspan="2">
                        <?php echo $row['gdis']; ?>
                    </p>
                    <?php
                    echo "<img class='gadget' src='image/product/{$row['imageone']}' alt='Gadget Image'>";
                    ?>
                    <h2 class="eligibility cell-spacing"><br>specifation</h2>

                    <p class="list-cell-spacing">
                        <?php
                        $gspecifation = explode("\n", $row['gspecification']);
                        echo "<ul>";
                        foreach ($gspecifation as $point) {
                            echo "<li>$point</li>";
                        }
                        echo "</ul>";
                        ?>
                    </p>
                    <?php
                    echo "<img class='gadget' src='image/product/{$row['imagetwo']}' alt='Gadget Image'>";
                    ?>
                    <?php
                    $i++;
            }
            ?>


                <div class="elink">
                    <p>Buy Here:</p>
                    <a href="<?php echo $row['glink'] ?>" target="_blank"><?php echo $row['glink']; ?></a>
                </div>
                <?php
    } else {
        echo "No content available!";
    }
    ?>
            <form action="" method="post">
                <div class="feedback">
                    <i id="feedbackuser" class="fa-solid fa-user"></i>
                    <input type="text" class="" placeholder="User-name" name="uname" required />
                </div>
                <textarea name="feedback" id="" cols="20" rows="3" class="feedback"></textarea>

                <div class="feedback" id="submit-btn">
                    <input type="submit" name="login-submit" id="login-submit" value="submit" />
                </div>
            </form>
        </main>
        <footer>
            <div class="row">
                <div class="coln">
                    <h3>contact</h3>
                    <ul>
                        <li>
                            <i class="fa-solid fa-location-dot"></i><span class="content">Balkumari ,lalitpur</span>
                        </li>
                        <li><i class="fa-solid fa-phone"></i><span class="content">01-XXXXX ,(+977)98XXXXXXXX</span>
                        </li>
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
</body>

</html>