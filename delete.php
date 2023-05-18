<?php
include 'connect.php';

$id = $_GET['id'];
$query = "DELETE FROM register WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
if ($stmt->execute()) {
    echo "<script>alert('User deleted successfully.'); window.location.href = 'userdata.php';</script>";
} else {
    echo "Error deleting user record: " . $stmt->errorInfo()[2];
}

$fid = $_GET['id'];
$query = "DELETE FROM feedback WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $fid);
if ($stmt->execute()) {
    echo "<script>alert('Feedback deleted successfully.'); window.location.href = 'feedback.php';</script>";
} else {
    echo "Error deleting feedback record: " . $stmt->errorInfo()[2];
}
?>

