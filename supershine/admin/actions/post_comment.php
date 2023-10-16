<?php
    session_start();
    $alphabet = '/^[A-Z a-z]+$/';
    $alphabetSymbol = '/^[A-Z a-z.,-()]+$/';
    $numbers = '/^[0-9]+$/';
    $alphanumeric = '/^[A-Z a-z0-9 .,-]+$/';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clean";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if((isset($_POST['submit']))) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $comment = $_POST['comment'];
        $id = strval(time());

            if (empty($first_name) && empty($last_name) && empty($phone) && empty($comment) && empty($floor) && $fileSize === 0){
                $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
                header('Location: /supershine/pages/contact.php');
                exit();
            }else{
                if(empty($first_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'First name is required!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else if(!preg_match($alphabet, $first_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'First name must be only alphabets letter!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else

                if(empty($last_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Last name is required!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else if(!preg_match($alphabet, $last_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Last name must be only alphabets letter!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else

                if(empty($comment)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Comment is required!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else if(!preg_match($alphanumeric, $comment)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Comment must be only alphabets letter, numbers and `.,-`!'];
                    header('Location: /supershine/pages/contact.php');
                    exit();
                }else{

                    $sql = "INSERT INTO comments (id, first_name, last_name, phone, comment) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $id, $first_name, $last_name, $phone, $comment);

                    if ($stmt->execute()) {
                        header('Location: /supershine/pages/contact.php');
                    } else {
                        $_SESSION['errors'] = ['type' => 'insert', 'msg' => 'Error inserting data. Try again!'];
                        header('Location: /supershine/pages/contact.php');
                        exit();
                    }

                    $conn->close();

                }



            }
    }
?>