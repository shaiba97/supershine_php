<?php
    session_start();
    $alphabet = '/^[A-Z a-z]+$/';
    $alphabetSymbol = '/^[A-Z a-z.,]+$/';
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
    if((isset($_POST['submit']))) {

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];
        $comment = $_POST['comment'];
        $id = strval(time());

            if (empty($first_name) && empty($last_name) && empty($phone) && empty($position) && empty($comment) && $fileSize === 0){
                $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
                header('Location: /supershine/admin/pages/uploads.php');
                exit();
            }else{
                if($fileSize === 0){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Image is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else
                if(empty($first_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'First name is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else if(!preg_match($alphabet, $first_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'First name must be only alphabets letter!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else

                if(empty($last_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Last name is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else if(!preg_match($alphabet, $last_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Last name must be only alphabets letter!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else

                if(empty($position)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Position is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else if(!preg_match($alphabetSymbol, $position)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Position must be only alphabets letter and `.,`!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else

                if(empty($phone)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Phone number is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else if(!preg_match($numbers, $phone)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Phone number must be only numbers!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else

                if(empty($comment)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Comment is required!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else if(!preg_match($alphabet, $comment)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Comment must be only alphabets letter, numbers and `.,!`!'];
                    header('Location: /supershine/admin/pages/uploads.php');
                    exit();
                }else{

                        $fileExt = explode('.', $fileName);
                        $fileActualExt =    strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png');

                        if(in_array($fileActualExt, $allowed)){

                            if ($fileError === 0) {

                                $fileNewName = uniqid('').".".$fileActualExt;
                                    $fileDestination = "../uploaded_image/members/".$fileNewName;
                                    $move = move_uploaded_file($fileTmpName, $fileDestination);
                                    if ($move) {
                                        $sql = "INSERT INTO members (id, image, first_name, last_name, phone, position, comment) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("sssssss", $id, $fileNewName, $first_name, $last_name, $phone, $position, $comment);

                                        if ($stmt->execute()) {
                                            header('Location: /supershine/admin/pages/uploads.php');
                                        } else {
                                            $_SESSION['errors'] = ['type' => 'insert', 'msg' => 'Error inserting data. Try again!'];
                                            header('Location: /supershine/admin/pages/uploads.php');
                                            exit();
                                        }

                                        $conn->close();
                                    }

                            }else{
                                $_SESSION['errors'] = ['type' => 'required', 'msg' => '"OOOps error occurred uploading image!"'];
                                header('Location: /supershine/admin/pages/uploads.php');
                                exit();
                            }

                        }else{
                            $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Image must be of type JPG, JPEG or PNG!'];
                            header('Location: /supershine/admin/pages/uploads.php');
                            exit();
                        }

                }



            }
    }
?>