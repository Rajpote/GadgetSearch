<?php
session_start();
include 'connect.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['adminname'])) {
    header('location: home.php');
}

if (isset($_POST['submit'])) {
    $g_id = $_POST['g_id'];
    $type = $_POST['type'];
    $gname = $_POST['gname'];
    $gdis = $_POST['gdis'];
    $gspecification = $_POST['gspecification'];
    $gimage = $_POST['gimage'];
    $imageone = $_POST['imageone'];
    $imagetwo = $_POST['imagetwo'];
    $glink = $_POST['glink'];
    $gprice = $_POST['gprice'];

    // Check if the gadget already exists
    $sql = "SELECT * FROM gadget_details WHERE g_id = ? AND gdis = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$g_id, $gdis]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo '<script> alert("Gadget already exists."); </script>';
    } else {
        if (
            empty($g_id) || empty($type) || empty($gname) || empty($gdis) || empty($gspecification) || empty($gimage) || empty($imageone) || empty($imagetwo) || empty($glink) || empty($gprice)
        ) {
            echo '<script> alert("Please fill all the fields."); window.location.href = "gadgetdetail.php"; </script>';
        } else {
            $sql = "INSERT INTO gadget_details (g_id, type, gname, gdis, gspecification, gimage, imageone, imagetwo, glink, gprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $g_id,
                $type,
                $gname,
                $gdis,
                $gspecification,
                $gimage,
                $imageone,
                $imagetwo,
                $glink,
                $gprice
            ]);
            echo '<script> alert("Gadget added successfully."); window.location.href = "gadgetdetail.php"; </script>';
        }
    }
}

if (isset($_POST['g_id'])) {
    $g_id = $_POST['g_id'];
}

$stmt = $pdo->prepare("SELECT * FROM gadget_details WHERE g_id = :g_id");
$stmt->bindParam(":g_id", $g_id);
$stmt->execute();
$value = $stmt->fetch(PDO::FETCH_ASSOC);

$g_id = isset($value['g_id']) ? $value['g_id'] : '';
$gname = isset($value['gname']) ? $value['gname'] : '';
$type = isset($value['type']) ? $value['type'] : '';
$gdis = isset($value['gdis']) ? $value['gdis'] : '';
$gspecification = isset($value['gspecification']) ? $value['gspecification'] : '';
$gimage = isset($value['gimage']) ? $value['gimage'] : '';
$imageone = isset($value['imageone']) ? $value['imageone'] : '';
$imagetwo = isset($value['imagetwo']) ? $value['imagetwo'] : '';
$glink = isset($value['glink']) ? $value['glink'] : '';
$gprice = isset($value['gprice']) ? $value['gprice'] : '';

if (isset($_POST['update-submit'])) {
    $g_id = $_POST['g_id'];
    $type = $_POST['type'];
    $gname = $_POST['gname'];
    $gdis = $_POST['gdis'];
    $gspecification = $_POST['gspecification'];
    $gimage = $_POST['gimage'];
    $imageone = $_POST['imageone'];
    $imagetwo = $_POST['imagetwo'];
    $glink = $_POST['glink'];
    $gprice = $_POST['gprice'];

    if (empty($_POST['g_id']) || empty($_POST['type']) || empty($_POST['gname']) || empty($_POST['gdis']) || empty($_POST['gspecification']) || empty($_POST['gimage']) || empty($_POST['imageone']) || empty($_POST['imagetwo']) || empty($_POST['glink']) || empty($_POST['gprice'])) {
        echo '<script> alert("Please fill all the fields."); window.location.href = "gadgetdetail.php"; </script>';
    } else {
        $sql = "UPDATE gadget_details SET g_id=:g_id, type = :type, gname = :gname, gdis = :gdis, gspecification = :gspecification, gimage = :gimage, imageone = :imageone, imagetwo = :imagetwo, glink = :glink, gprice = :gprice WHERE g_id = :g_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("g_id", $g_id);
        $stmt->bindParam("type", $type);
        $stmt->bindParam("gname", $gname);
        $stmt->bindParam("gdis", $gdis);
        $stmt->bindParam("gspecification", $gspecification);
        $stmt->bindParam("gimage", $gimage);
        $stmt->bindParam("imageone", $imageone);
        $stmt->bindParam("imagetwo", $imagetwo);
        $stmt->bindParam("glink", $glink);
        $stmt->bindParam("gprice", $gprice);
        $stmt->execute();
        echo '<script> alert("Gadget updated successfully."); window.location.href = "gadgetdetail.php"; </script>';
    }
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
    <link rel="stylesheet" href="gadgetdetail.css">

    <title>GadgetSearch</title>
</head>

<body>
    <header>
        <div>
            <a class="logo" href="admin.php"><img src="image/gadget search-logos/gadget search-1 (1).png" alt="" /></a>
        </div>
        <ul class="navbar">
            <li><a href="admin.php">Admin</a></li>
            <li><a class="active" href="gadgetdetail.php">Gadget</a></li>
            <li><a href="userdata.php">User data</a></li>
            <li><a href="feedback.php">User Feedback</a></li>
        </ul>
        <div class="container">
            <?php echo $_SESSION['adminname'] ?> <br>
        </div>
        <a href="home.php" class="logout">logout</a>
    </header>
    <main>
        <div class="gadget-details" id="gadget-details">
            <form action="" method="POST" class="gadget-form">
                <div class="input-container">
                    <div class="add">
                        <h1 class="addtitle">ADD GADGET</h1>
                        <input type="number" class="id" name="g_id" id="g_id" placeholder="Gadget ID" required>
                        <select name="type" id="type">
                            <option value="laptop">laptop</option>
                            <option value="phone">phone</option>
                            <option value="deals">deals</option>
                        </select>
                        <input type="text" class="abbreviation" name="gname" id="gname" placeholder="Gadget Name"
                            required>
                        <input type="file" class="image" name="gimage" id="gimage" placeholder="Gadget Image URL"
                            required>
                        <textarea name="gdis" id="gdis" cols="60" rows="7" placeholder="Gadget Description"></textarea>
                        <input type="file" class="image" name="imageone" id="imageone" placeholder="Gadget Image URL"
                            required>
                        <input type="file" class="image" name="imagetwo" id="imagetwo" placeholder="Gadget Image URL"
                            required>

                        <input type="text" class="link" name="glink" id="glink" placeholder="Gadget Link" required>
                        <input type="number" class="price" name="gprice" id="gprice" placeholder="Gadget Price"
                            required>
                        <textarea name="gspecification" id="gspecification" cols="60" rows="7"
                            placeholder="Gadget Specification" required></textarea>
                        <input type="submit" class="submit" name="submit" id="submit" value="Add">
                    </div>
                </div>
            </form>
        </div>
        <div class="gadget-details" id="gadget-update">
            <form action="" method="POST" class="manage-gadget-form">
                <div class="input-container">
                    <div class="updatebox">
                        <h1 class="updatetitle">UPDATE Gadgets</h1>
                        <select class="id" name="g_id" id="g_id" onchange="this.form.submit()">
                            <option value="">Gadget ID</option>
                            <?php
                            $stmt = $pdo->prepare("SELECT g_id FROM gadget_details");
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                $selected = ($row['g_id'] == $g_id) ? "selected" : "";
                                echo "<option value='" . $row['g_id'] . "' " . $selected . ">" . $row['g_id'] . "</option>";
                            }
                            ?>
                        </select>
                        <select name="type" id="type">
                            <option value="laptop">laptop</option>
                            <option value="phone">phone</option>
                            <option value="deals">deals</option>
                        </select>

                        <input type="text" class="gname" name="gname" id="gname" placeholder="Gadget Name"
                            value="<?php echo $gname ?>" required>
                        <input type="file" class="image" name="gimage" id="gimage" placeholder="Gadget Image URL"
                            value="<?php echo $gimage ?>" required>
                        <textarea name="gdis" id="gdis" cols="60" rows="7" placeholder="Gadget Description"
                            required><?php echo $gdis ?></textarea>
                        <input type="file" class="image" name="imageone" id="imageone" placeholder="Gadget Image URL"
                            value="<?php echo $imageone ?>" required>
                        <input type="file" class="image" name="imagetwo" id="imagetwo" placeholder="Gadget Image URL"
                            value="<?php echo $imagetwo ?>" required>
                        <input type="text" class="link" name="glink" id="glink" placeholder="Gadget Link"
                            value="<?php echo $glink ?>" required>
                        <input type="number" class="price" name="gprice" id="gprice" placeholder="Gadget Price"
                            value="<?php echo $gprice ?>" required>
                        <textarea name="gspecification" id="gspecification" cols="60" rows="7"
                            placeholder="Gadget Specification" required><?php echo $gspecification ?></textarea>
                        <input type="submit" class="submit" name="update-submit" id="update-submit" value="Update">

                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="script.js"></script>
</body>

</html>