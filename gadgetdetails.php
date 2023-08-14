<?php
session_start();
include 'connect.php';

if (isset($_POST['login-submit'])) {
    $uname = $_SESSION['username'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];


    $sql = "INSERT INTO feedback (uname, feedback, rating) VALUES (:uname, :feedback, :rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':feedback', $feedback);
    $stmt->bindParam(':rating', $rating);
    $stmt->execute();
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
            width: 70%;
        }

        img.gadget {
            height: 10%;
            width: 35%;
            margin: 10px 10px 10px 0px;
        }

        img.gadget-full {
            height: 35%;
            width: 90%;
            margin: 1rem 5% 0 5%;
            image-resolution: 1080px;
        }

        h4.name {
            font-size: 25px;
            font-weight: 500;
            color: #0a0101;
            padding: 0px 10px;
        }

        p.gprice {
            font-size: 20px;
            font-weight: 400;
            padding: 10px;
        }

        img.ratingstar {
            width: 50%;
            height: 55%;
            border-radius: 15px;

        }

        .title {
            position: absolute;
            top: 2%;
            left: 35%;
            margin: 10px;
            font-size: 20px;
        }

        .elink {
            display: flex;
            align-items: center;
            margin: 15px;
        }

        .elink a img {
            margin: 10px;
            height: 25%;
            width: 25%;
            cursor: pointer;
        }

        form {
            display: block;
            border: 1px solid black;
            width: 25%;
            padding: 10px 10px;
            border-radius: 12px;
            color: blue;
            cursor: pointer;
        }

        .feedback {
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 10px 10px;
        }

        #submit-btn.feedback {
            margin: 0 0 0 25%;
            width: 50%;
            color: red;
            cursor: pointer;
        }

        table th td {
            margin: 20px;
            padding: 20px;
        }

        textarea {
            width: 90%;
            padding: 10px;
            margin: 15px;
        }

        #feedback-btn {
            width: 90%;
            height: 20%;
            padding: 5px 5px 5px 5px;
        }

        .feedback input {
            width: 90%;
            height: 20%;
            padding: 5px 5px 5px 20px;
        }

        i#feedbackuser {
            position: absolute;
            left: 25px;
            color: #0a0101;

        }

        table {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px;
        }

        .table-heading {
            border: 5px solid black;
            width: 50%;
            text-transform: capitalize;
            font-size: 25px;
        }

        .table-body {
            border: 1px solid black;
            padding: 5px 25px 5px 25px;
            text-transform: capitalize;
        }

        .point {
            list-style: square;
            font-size: 20px;
            font-weight: 400;
        }

        .points {
            list-style: none;
            text-align: justify;
            font-style: capitalize;
            font-size: 20px;
            font-weight: 400;
        }

        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css);


        .container11 {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 20%;
            width: 20%;
        }

        #rating-value {
            width: 100px;
            margin: 40px auto 0;
            border: 1px solid black;
            padding: 10px 5px;
            text-align: center;
            box-shadow: 0 0 2px 1px rgba(46, 204, 113, .2);
        }

        /*styling star rating*/

        .rating {
            border: none;
            float: left;
            margin: 10px 10px 10px 10px;
        }

        .rating>input {
            display: none;
        }

        .rating>label:before {
            content: '\f005';
            font-family: FontAwesome;
            margin: 5px;
            font-size: 1.5rem;
            display: inline-block;
            cursor: pointer;
        }

        .rating>.half:before {
            content: '\f089';
            position: absolute;
            cursor: pointer;
        }


        .rating>label {
            color: #0a0101;
            float: right;
            cursor: pointer;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #b5f069;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        .rating>input:checked~label:hover~label {
            color: #cef046;
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
                        <a class="logo" href="user.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
                    </div>
                    <ul class="navbar">
                        <li><a href="user.php">Home</a></li>
                        <li><a href="gadget.php">Gadget</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>

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
                            echo "<p class='gprice'>RS:{$row['gprice']} </p>";
                            ?>
                        </h5>
                        <?php
                        echo "<img class='ratingstar' src='image/rating/{$row['rating']}' alt='rating Image'>";
                        ?>
                    </div>
                    <div class="discription">
                        <?php
                        $gdis = explode("\n", $row['gdis']);
                        echo "<ul>";
                        foreach ($gdis as $point) {
                            echo "<li class='points'>$point</li>";
                        }
                        echo "</ul>";
                        ?>
                    </div>
                    <?php
                    echo "<img class='gadget-full' src='image/product/{$row['imageone']}' alt='Gadget Image'>";
                    ?>
                    <table>
                        <tr>
                            <th class="table-heading"> specifation </th>
                            <th class="table-heading">comprasion</th>
                        </tr>
                        <tr>
                            <td class="table-body">
                                <?php
                                $gspecifation = explode("\n", $row['gspecification']);
                                echo "<ul>";
                                foreach ($gspecifation as $point) {
                                    echo "<li class='point'>$point</li>";
                                }
                                echo "</ul>";
                                ?>
                            </td>
                            <td class="table-body">
                                <?php
                                $gcomprasion = explode("\n", $row['gcomprasion']);
                                echo "<ul>";
                                foreach ($gcomprasion as $point) {
                                    echo "<li class='point'>$point</li>";
                                }
                                echo "</ul>";
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                    echo "<img class='gadget' src='image/product/{$row['imagetwo']}' alt='Gadget Image'>";
                    ?>
                    <?php
                    $i++;
            }
            ?>
                <div class="elink">
                    <p>Buy Here:</p>
                    <a href="<?php echo $row['glink'] ?>" target="_blank"><img src="image/backgrounds/buy-now.png"
                            alt=""></a>
                </div>
                <?php
    } else {
        echo "No content available!";
    }

    $username = $_SESSION['username'];
    ?>
            <form action="" method="POST">
                <div class="feedback">
                    <?php echo $_SESSION['username'] ?>
                </div>
                <div class="container">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full"
                            title="Awesome"></label>
                        <input type="radio" id="star4.5" name="rating" value="4.5" /><label for="star4.5"
                            class="half"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                            class="full"></label>
                        <input type="radio" id="star3.5" name="rating" value="3.5" /><label for="star3.5"
                            class="half"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                            class="full"></label>
                        <input type="radio" id="star2.5" name="rating" value="2.5" /><label for="star2.5"
                            class="half"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                            class="full"></label>
                        <input type="radio" id="star1.5" name="rating" value="1.5" /><label for="star1.5"
                            class="half"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                            class="full"></label>
                        <input type="radio" id="star0.5" name="rating" value="0.5" /><label for="star0.5"
                            class="half"></label>
                    </div>
                </div>
                <textarea name="feedback" id="" cols="20" rows="3" class="feedback" required></textarea>

                <div class="feedback" id="submit-btn">
                    <input type="submit" name="login-submit" id="feedback-btn" value="submit" />
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
                        <a href="" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="" target="_blank" class="icon"><i class="fa-brands fa-instagram"></i></a>
                        <a href="" target="_blank" class="icon"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <center>copyright</center>
        </footer>
</body>

</html>