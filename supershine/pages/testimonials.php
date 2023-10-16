<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "SELECT * FROM testimonials";
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
    <link rel="stylesheet" href="../style/pages/testimonials.css">    
    <link rel="stylesheet" href="../style/pages/footer.css">




    <title>Supershine | Testimonials</title>
</head>
<body>
    <header>
        <?php include('../pages/menu-nav.php') ?>
    </header>


    <div class="wrapper-testimonials">
                <div class="divider title">
                    <h1> Our Works </h1>
                </div>

                <div class="container">
                    <div class="images">
                    <?php if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>
                        <div class="card">

                            <div class="time">
                                <img src="../admin/uploaded_image/testimonials/<?php echo $row['beforeImage'] ?>" class="d-block w-100 img-thumbnail img-fluid" alt="...">
                            </div>
                            <div class="time">
                                <img src="../admin/uploaded_image/testimonials/<?php echo $row['afterImage'] ?>" class="d-block w-100 img-thumbnail img-fluid" alt="...">
                            </div>
                        </div>
                        <?php }
                    } ?>

                    </div>
                </div>

                <div class="divider"></div>
    </div>


    <?php include('../pages/footer.php') ?>


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>