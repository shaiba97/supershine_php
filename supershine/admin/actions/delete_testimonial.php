<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";
$id = $_GET['param'];

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: /supershine/admin/elements/testimonials.php");
        exit();
    }else{
        echo "Error: " . $stmt->error;
    }
}



?>