<?php session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clean";

    $conn = new mysqli($servername, $username, $password, $database);

    $idToFetch = $_GET['param'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

 ?>

 <style>
    img{
        object-fit: cover;
        object-position: center;
    }
 </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/admin/side-nav.css">
    <link rel="stylesheet" href="../../style/admin/generals.css">
    <link rel="stylesheet" href="../../style/admin/uploads.css">
    <link rel="stylesheet" href="../../style/admin/forms.css">
    <title>SuperShine | Uploads</title>
</head>
<body>

    <div class="wrappers">
        <div class="nav">
            <?php include('../side-nav/nav.php') ?>
        </div>
        <div class="container">
        <div class="content">
        <div class="uploads blog">
                <div class="member">
                    <div class="title">
                        <h3>Blog</h3>
                    </div>
                    <div class="forms">
                    <?php
                            $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
                            $stmt->bind_param("i", $idToFetch);
                            $stmt->execute();
                            $result = $stmt->get_result();
                     if(isset($_SESSION['errors'])){ ?>
                        <div class="errors" id="errors">
                            <div class="error" id="error">
                                <small class="text-danger"><?php print_r($_SESSION['errors']['msg']); unset($_SESSION['errors']); ?></small>
                            </div>
                        </div>
                        <?php } ?>
                        <form action="../actions/update_blog.php?param=<?php echo $_GET['param'] ?>" class="english" method="post" enctype="multipart/form-data">
                        <div class="back mb-3">
                            <a href="/supershine/admin/elements/blogs.php">
                            <svg style="color: #000" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                          </svg>
                            </a>
                        </div>
                            <div class="image mb-3">
                                <img src="" id="blogImage" class="rounded">
                                <div class="mb-3">
                                    <input class="form-control" name="file" accept="images/*" onchange="onChangeBlogImage(event)" (click)="delete($event)" type="file" id="image">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="blog" id="blog" rows="3" placeholder="Blog Goes Here"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn"> Update Blog </button>
                        </form>
                    </div>

                </div>

                <hr>

                <div class="blog-detail detail">
                <?php if ($row = $result->fetch_assoc()) {?>
                    <div class="title">
                        <h1><?php echo $row['title'] ?></h1>
                    </div>

                    <img style="width: 100%; height: 50vh" class="rounded mx-auto d-block img-fluid img-fluid img-thumbnail rounded" src="../uploaded_image/blogs/<?php echo $row['image']  ?>" alt="">
                    <br><br>
                    <div class="blog-text">
                        <?php echo $row['blog'] ?>
                    </div>
                <?php }?>
                </div>

                <div class="divider"></div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="../../javascript/image.js"></script>
</body>
</html>