<?php
    session_start();
    $alphabet = '/^[A-Z a-z]+$/';
    $numbers = '/^[0-9]+$/';
    $alphanumeric = '/^[A-Z a-z0-9.,]+$/';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clean";
    $id = $_GET['param'];

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

        $title = $_POST['title'];
        $blog = $_POST['blog'];

            if (empty($title) && empty($blog)  && $fileSize === 0){
                $_SESSION['errors'] = ['type' => 'required', 'msg' => 'All fields are required!'];
                header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                exit();
            }else{
                if($fileSize === 0){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Image is required!'];
                    header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                    exit();
                }else
                if(empty($title)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'Title is required!'];
                    header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                    exit();
                }else if(!preg_match($alphabet, $title)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Title must be only alphabets letter!'];
                    header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                    exit();
                }else

                if(empty($blog)){
                    $_SESSION['errors'] = ['type' => 'required', 'msg' => 'blog is required!'];
                    header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                    exit();
                }else if(!preg_match($alphanumeric, $blog)){
                    $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'blog must be only alphabets letter, numbers and `,.`!'];
                    header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                    exit();
                }else
                
                {

                        $fileExt = explode('.', $fileName);
                        $fileActualExt =    strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png');

                        if(in_array($fileActualExt, $allowed)){

                            if ($fileError === 0) {

                                $fileNewName = uniqid('').".".$fileActualExt;
                                    $fileDestination = "../uploaded_image/blogs/".$fileNewName;
                                    $move = move_uploaded_file($fileTmpName, $fileDestination);
                                    if ($move) {
                                        $sql = "UPDATE `blogs` SET `image`='$fileNewName',`title`='$title',`blog`='$blog' WHERE `id`= ? ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("i", $_GET['param']);

                                        if ($stmt->execute()) {
                                            header('Location: /supershine/admin/details/blog.php?param='.$_GET['param']);
                                        } else {
                                            $_SESSION['errors'] = ['type' => 'insert', 'msg' => 'Error inserting data. Try again!'];
                                            header('Location: /supershine/admin/details/blog.php?param='.$_GET['param']);
                                            exit();
                                        }

                                        $conn->close();
                                    }

                            }else{
                                $_SESSION['errors'] = ['type' => 'required', 'msg' => '"OOOps error occurred uploading image!"'];
                                header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                                exit();
                            }

                        }else{
                            $_SESSION['errors'] = ['type' => 'regex', 'msg' => 'Image must be of type JPG, JPEG or PNG!'];
                            header('Location: /supershine/admin/details/blog.php?param='.$_GET['param'] );
                            exit();
                        }

                }



            }
    }
?>