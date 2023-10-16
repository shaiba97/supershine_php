<?php 
session_start();
$id = $_GET['param'];
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
            <div class="uploads service">
                <div class="title">
                    <h3>Service</h3>
                </div>
                <div class="forms">
                <?php 
                    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
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
                        <?php if ($row = $result->fetch_assoc()) { ?>
                    <form action="/supershine/admin/actions/update_service.php?param=<?php echo $id ?>" class="english" method="post">
                    <div class="back mb-3">
                            <a href="/supershine/admin/elements/services.php">
                                <svg style="color: #000;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="service" id="service" placeholder="Service" value="<?php echo $row['services'] ?>">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Description..."></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn"> Update Service </button>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                            <?php echo $row['comment'] ?>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>