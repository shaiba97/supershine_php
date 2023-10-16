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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/admin/side-nav.css">
    <link rel="stylesheet" href="../../style/admin/forms.css">
    <link rel="stylesheet" href="../../style/admin/generals.css">
    <title>SuperShine | Profile</title>
</head>
<body>
<div class="wrappers">
        <div class="nav">
            <?php include('../side-nav/nav.php') ?>
        </div>
        <div class="container">
        <div class="content">
            <div class="uploads">
                <div class="member">
                    <div class="title">
                        <h3>Profile</h3>
                    </div>

                    
                    <div class="forms">
                    <?php if(isset($_SESSION['errors'])){ ?>
                        <div class="errors" id="errors">
                            <div class="error" id="error">
                                <small class="text-danger"><?php print_r($_SESSION['errors']['msg']); unset($_SESSION['errors']); ?></small>
                            </div>
                        </div>
                        <?php } ?>
                        <?php 
                            $stmt = $conn->prepare("SELECT * FROM admins WHERE id = ?");
                            $stmt->bind_param("i", $_SESSION['user_id']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
    
                        <form action="../actions/update_profile.php" class="english" method="POST" enctype="multipart/form-data">
                            
                            <div class="image mb-3">
                                <img src="../uploaded_image/admins/<?php echo $row['image'] ?>" id="memberImage" alt="">
                                <div class="mb-3">
                                    <input class="form-control" name="file" accept="images/*" onchange="onChangeMemberImage(event)" (click)="delete($event)" id="image" type="file">
                                </div>
                            </div>
                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $row['first_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $row['last_name'] ?>">
                                </div>
                            </div>


                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $row['phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?php echo $row['password'] ?>">
                                </div>
                            </div>
                            <button type="submit" name="submit"  id="member_submit" class="btn"> Update </button>
                        </form>

                        <?php } 
                        }?>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>