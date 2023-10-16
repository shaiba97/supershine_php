<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/pages/nav.css">
    <link rel="stylesheet" href="../style/pages/general.css">
    <link rel="stylesheet" href="../style/pages/blogs.css">
    <link rel="stylesheet" href="../style/pages/footer.css">


    <title>Supershine | Blogs</title>
</head>
<body>
    <header>
        <?php include('../pages/menu-nav.php') ?>
    </header>


    <div class="wrapper-blogs ">
    <div class="container">
        <div class="content">
            <div class="divider title">
                <h1> Blogs </h1>
            </div>
            <div class="blogs">
            <div class="figures">
                    <?php if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>
                        <figure class="card">
                            <img loading="lazy" class="rounded img-thumbnail" src="../admin/uploaded_image/blogs/<?php echo $row['image'] ?>" alt="">
                            <figcaption>
                                <h3><?php echo $row['title'] ?></h3>
                                <p><?php echo $row['blog'] ?></p>
                                <div>
                                <a href="/supershine/pages/blog.php?param=<?php echo $row['id'] ?>" class="btn read_more">Read More</a>
                                </div>
                            </figcaption>
                        </figure>
                        <?php }
                            }?>
                    </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
    </div>

    <?php include('../pages/footer.php') ?>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>