<?php
include('connect.php');

$base_price = $_POST['base_price'];
$upper_price = $_POST['upper_price'];

// echo "$base_price";
// echo "$upper_price";

$query = "SELECT * FROM gadget_details";
$stmt = $pdo->prepare($query);
$stmt->execute();
$value = $stmt->fetch(PDO::FETCH_ASSOC);

echo $value['gname'];

// foreach ($value as $item) {
//     echo $item['gname'];
// }


?>