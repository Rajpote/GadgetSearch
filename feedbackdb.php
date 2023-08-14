<?php
include 'connect.php';

if (isset($_POST['login-submit'])) {
    $uname = $_POST['uname'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    echo 'dkdm' . $uname;

    $sql = "INSERT INTO feedback (uname, feedback, rating) VALUES (:uname, :feedback, :rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':feedback', $feedback);
    $stmt->bindParam(':rating', $rating);
    $stmt->execute();
    echo '<script>alert("Feedback submitted successfully.");</script>';
}
?>