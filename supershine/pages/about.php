<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "SELECT * FROM members LIMIT 3";
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
    <link rel="stylesheet" href="../style/pages/about.css">
    <link rel="stylesheet" href="../style/pages/footer.css">


    <title>Supershine | About</title>

</head>
<body>
    <header>
        <?php include('../pages/menu-nav.php') ?>
    </header>

    <div class="wrapper-about">
    <div class="container">
        <div class="content">
            <div class="about">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <div class="figures">
                    <?php if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>
                            <figure>
                        <div class="image">
                            <img src="../admin/uploaded_image/members/<?php echo $row['image'] ?>" alt="" class="rounded img-fluid">
                        </div>
                        <figcaption>
                            <div class="person">
                                <h3><?php echo $row['first_name'].' '.$row['last_name'] ?></h3>
                                <span><?php echo $row['position'] ?></span>
                            </div>
                            <p> <?php echo $row['comment'] ?></p>
                        </figcaption>
                    </figure>
                    <?php }
                    } ?>
                </div>

                <div class="divider"></div>

                <div class="about-us card">
                    <h3>About us</h3>
                    <p>
                        We are a God-centered family owned and operated business. Since our founding, we have grown tremendously to proudly serve Humble, Houston, Kingwood, and Spring. Great service begins and ends with experienced and friendly professionals, which is why we
                        put so much consideration into selecting only the best to join our team. We complete jobs efficiently and on schedule, and go above and beyond to form lasting relationships with our clients. For ease of mind, Bluebonnet Cleaning
                        is insured because we care about the safety and protection of our clients
                    </p>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>
    </div>

    <?php include('../pages/footer.php') ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>