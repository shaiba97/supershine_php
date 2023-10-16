<?php

    session_start();
    $alphabet = '/^[A-Z a-z]+$/';
    $numbers = '/^[0-9]+$/';
    $alphanumeric = '/^[A-Z a-z0-9.,]+$/';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clean";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

if((isset($_POST['submit'])))  {
    $service = $_POST['service'];
    $desc = $_POST['desc'];
    $id = strval(time());

    if (empty($service) && empty($desc)){
        $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
        header('Location: /supershine/admin/uploads/new-service.php');
        exit();
    } else {
        if(empty($service)){
            $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Service is required!'];
            header('Location: /supershine/admin/uploads/new-service.php');
            exit();
        }else if(!preg_match($alphabet, $service)){
            $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Service must be only alphabets letter!'];
            header('Location: /supershine/admin/uploads/new-service.php');
            exit();
        }else if(empty($desc)){
            $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Description is required!'];
            header('Location: /supershine/admin/uploads/new-service.php');
            exit();
        }else if(!preg_match($alphabet, $desc)){
            $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Description must be only alphabets letter, numbers and `.,`!'];
            header('Location: /supershine/admin/uploads/new-service.php');
            exit();
        }else{

            $sql = "INSERT INTO services (id, services  , comment) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $id, $service, $desc);

            if ($stmt->execute()) {
                header('Location: /supershine/admin/uploads/new-service.php');
            } else {
                header('Location: /supershine/admin/uploads/new-service.php');
                exit();
            }

            $conn->close();

        }
    }
}