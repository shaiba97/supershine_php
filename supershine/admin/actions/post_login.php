<?php

session_start();
$alphabet = '/^[A-Z a-z]+$/';
$alphabetSymbol = '/^[A-Z a-z.,-]+$/';
$numbers = '/^[0-9]+$/';
$alphanumeric = '/^[A-Z a-z0-9]+$/';

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admins";
$result = $conn->query($sql);



if (isset($_POST['submit'])) {


    $phone = $_POST['phone'];
    $password = $_POST['password'];


    if(empty($phone) && empty($password)){
        $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
        header('Location: /supershine/login.php');
        exit();
    }
    
    else{

        if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                if($phone === $row['phone']){
                    if($password === $row['password']){

                            $_SESSION['user_id'] = $row['id'];
                            header("Location: /supershine/admin/pages/dashboard.php");
                            exit();
                    }


                }
             }
            }
    }
}