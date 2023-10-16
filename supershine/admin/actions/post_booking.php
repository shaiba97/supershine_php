<?php
    session_start();
    $alphabet = '/^[A-Z a-z]+$/';
    $alphabetSymbol = '/^[A-Z a-z.,-]+$/';
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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $building = $_POST['building'];
        $floor = $_POST['floor'];
        $tower = $_POST['tower'];
        $landmark = $_POST['landmark'];
        $id = strval(time());

            if (empty($first_name) && empty($last_name) && empty($phone) && empty($building) && empty($floor)){
                $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
                header('Location: /supershine/pages/book.php#booking');
                exit();
            }else{
                if(empty($first_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'First name is required!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else if(!preg_match($alphabet, $first_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'First name must be only alphabets letter!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if(empty($last_name)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Last name is required!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else if(!preg_match($alphabet, $last_name)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Last name must be only alphabets letter!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if(empty($building)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Building is required!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else if(!preg_match($alphabetSymbol, $building)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Building must be only alphabets letter and `.,-()`!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if(empty($phone)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Phone number is required!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else if(!preg_match($numbers, $phone)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Phone number must be only numbers!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if($tower !== '' && !preg_match($alphanumeric, $tower)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Tower name must be only alphabets letter numbers!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if($landmark !== '' && !preg_match($alphanumeric, $landmark)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Landmark number must be only alphabets letter numbers!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else

                if(empty($floor)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Floor is required!'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else if(!preg_match($numbers, $floor)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Floor must be only numbers and !'];
                    header('Location: /supershine/pages/book.php#booking');
                    exit();
                }else{

                    $sql = "INSERT INTO bookings (id, first_name, last_name, phone, building, floor, tower, landmark) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssss", $id, $first_name, $last_name, $phone, $building, $floor, $tower, $landmark);

                    if ($stmt->execute()) {
                        header('Location: /supershine/pages/book.php#booking');
                    } else {
                        $_SESSION['errors'] = ['type' => 'insert', 'msg' => 'Error inserting data. Try again!'];
                        header('Location: /supershine/pages/book.php#booking');
                        exit();
                    }

                    $conn->close();

                }



            }
    }
?>