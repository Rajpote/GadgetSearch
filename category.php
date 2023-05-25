<?php
session_start();
include('connect.php');

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    $sql = "SELECT * FROM gadget_details WHERE type = :type";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':type', $type);
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
    <title>Hamro device</title>
    <link rel="stylesheet" href="user-admin.css">
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body>
    <?php
    if (isset($type) && !empty($devices)): ?>
        <div class="devices" id="devices">
            <p class="category-device-title">
                <?php echo $type; ?> deviceS
            </p>
            <div class="device-grid-container">
                <?php
                foreach ($devices as $device):
                    ?>
                    <a href="gadgetdetails.php?g_id=<?php echo $device['g_id']; ?>" class="device-grid-item">
                        <img src="./image/product/<?php echo $device['gimage']; ?>">
                        <p class="device-name">
                            <?php echo $device['gname']; ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>


</body>

</html>