<?php

$conn = new mysqli("localhost", "root", "", "info");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $result = $conn->query("SELECT status FROM user WHERE id = $id");
    $row = $result->fetch_assoc();
    $currentStatus = $row['status'];

    
    $newStatus = $currentStatus == 0 ? 1 : 0;

   
    $conn->query("UPDATE user SET status = $newStatus WHERE id = $id");

    
    echo $newStatus;
}
?>
