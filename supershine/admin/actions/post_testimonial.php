<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clean";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if((isset($_POST['submit']))) {


        $beforeName = $_FILES['before']['name'];
        $beforeTmpName = $_FILES['before']['tmp_name'];
        $beforeSize = $_FILES['before']['size'];
        $beforeError = $_FILES['before']['error'];
        $beforeType = $_FILES['before']['type'];


        $afterName = $_FILES['after']['name'];
        $afterTmpName = $_FILES['after']['tmp_name'];
        $afterSize = $_FILES['after']['size'];
        $afterError = $_FILES['after']['error'];
        $afterType = $_FILES['after']['type'];
        $id = strval(time());

        echo '<pre>'.print_r($_FILES).'</pre>';

        if ( $beforeSize === 0 && $afterSize === 0){
            $_SESSION['errors'] = ['type' => 'required', 'msg' => 'images are required!'];
            header('Location: /supershine/admin/pages/uploads.php');
            exit();
        }else
        
        if( $beforeSize === 0){
            $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Before images is required!'];
            header('Location: /supershine/admin/pages/uploads.php');
            exit();
        }else
        
        if( $beforeSize === 0){
            $_SESSION['errors'] = ['type' => 'required', 'msg' => 'After images is required!'];
            header('Location: /supershine/admin/pages/uploads.php');
            exit();
        }else{

            $beforeExt = explode('.', $beforeName);
            $afterExt = explode('.', $afterName);
            $beforeActualExt =    strtolower(end($beforeExt));
            $afterActualExt =    strtolower(end($afterExt));
            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($beforeActualExt, $allowed) && in_array($afterActualExt, $allowed) ){

                if ($beforeError === 0 && $afterError === 0) {

                    $beforeNewName = uniqid('').".".$beforeActualExt;
                    $afterNewName = uniqid('').".".$afterActualExt;
                        $beforeDestination = "../uploaded_image/testimonials/".$beforeNewName;
                        $afterDestination = "../uploaded_image/testimonials/".$afterNewName;
                        $moveBefore = move_uploaded_file($beforeTmpName, $beforeDestination);
                        $moveAfter = move_uploaded_file($afterTmpName, $afterDestination);
                        if ($moveBefore && $moveAfter) {
                            $sql = "INSERT INTO testimonials (id, beforeImage, afterImage) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $id, $beforeNewName, $afterNewName);

                            if ($stmt->execute()) {
                                header('Location: /supershine/admin/uploads/new-testimonial.php');
                            } else {
                                $_SESSION['errors'] = ['type' => 'insert', 'msg' => 'Error inserting data. Try again!'];
                                header('Location: /supershine/admin/uploads/new-testimonial.php');
                                exit();
                            }

                            $conn->close();
                        }

                }else{
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => '"OOOps error occurred uploading image!"'];
                    header('Location: /supershine/admin/uploads/new-testimonial.php');
                    exit();
                }

            }else{
                $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Image must be of type JPG, JPEG or PNG!'];
                header('Location: /supershine/admin/uploads/new-testimonial.php');
                exit();
            }

        }
    }