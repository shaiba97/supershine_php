<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $members = "SELECT * FROM members";
    $resultMembers = $conn->query($members);

    $bookings = "SELECT * FROM bookings";
    $resultBookings = $conn->query($bookings);

    $comments = "SELECT * FROM comments";
    $resultComments = $conn->query($comments);

    $services = "SELECT * FROM services";
    $resultServices = $conn->query($services);

    $testimonials = "SELECT * FROM testimonials";
    $resultTestimonials = $conn->query($testimonials);

    $blogs = "SELECT * FROM blogs";
    $resultBLogs = $conn->query($blogs);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/admin/side-nav.css">
    <link rel="stylesheet" href="../../style/admin/dashboard.css">
    <link rel="stylesheet" href="../../style/admin/generals.css">
    <title>SuperShine | Dashboard</title>
</head>
<body>
    <div class="wrappers">
        <div class="nav">
            <?php include('../side-nav/nav.php') ?>
        </div>
        <div class="container dashboard">
        <div class="content">
            <div class="title">
                <h1>Control Panel</h1>
            </div>
            <div class="row text-center row-gap-3">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Bookings </h3>
                        </div>
                        <div class="card-body">
                            <h1><?php echo $resultBookings->num_rows ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Comments </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            <?php echo $resultComments->num_rows ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Members </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            <?php echo $resultMembers->num_rows ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Services </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            <?php echo $resultServices->num_rows ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Testimonial </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            <?php echo $resultTestimonials->num_rows ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Blogs </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            <?php echo $resultBLogs->num_rows ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>