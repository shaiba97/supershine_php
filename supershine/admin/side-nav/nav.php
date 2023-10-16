<?php

if(isset($_SESSION['user_id'])){
    $id =  $_SESSION['user_id'];
}else{
    header("Location: /supershine/login.php");
    exit();
}

// Define your routes
$routes = [
    'dashboard' => '/supershine/admin/pages/dashboard.php',
    'bookings' => '/supershine/admin/pages/bookings.php',
    'uploads' => '/supershine/admin/pages/uploads.php',
    'elements' => '/supershine/admin/pages/elements.php',
    'profile' => '/supershine/admin/pages/profile.php',
];

$servername = "localhost";
$username = "root";
$password = "";
$database = "clean";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("SELECT * FROM admins WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
}

?>


<section class="side-nav-wrapper">
    <ul class="logo">
        <li>
            <a>
                <a href="dashboard">
                    <img class="rounded" src="../../clean-media/clean-logo.jpg" alt="">
                </a>
            </a>
        </li>
    </ul>

    <ul>

        <?php foreach ($routes as $key => $value) {?>
            <li><a href="<?php echo  $value ?>"><?php echo $key ?></a></li>
        <?php }?>
    </ul>


    <div class="admin">
    <?php 
        $stmt = $conn->prepare("SELECT * FROM admins WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) { ?>
        <figure>
            <span class="admin-profile">
            <img style="object-fit:cover; object-position: center;" src="../uploaded_image/admins/<?php echo $row['image'] ?>" alt="">
            <span class="admin-text">
                <span><?php echo $row['first_name']. ' '. $row['last_name'] ?></span>
            </span>
            </span>

            <figcaption>
                <a href="/supershine/admin/actions/post_logout.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                </a>
            </figcaption>
        </figure>
        <?php }?>
    </div>
</section>