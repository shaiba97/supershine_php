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

 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/admin/side-nav.css">
    <link rel="stylesheet" href="../../style/admin/uploads.css">
    <link rel="stylesheet" href="../../style/admin/forms.css">
    <link rel="stylesheet" href="../../style/admin/details.css">
    <link rel="stylesheet" href="../../style/admin/generals.css">
    <title>SuperShine | Uploads</title>
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
                        <h3>Member</h3>
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
                                $stmt = $conn->prepare("SELECT * FROM members WHERE id = ?");
                                $stmt->bind_param("i", $idToFetch);
                                $stmt->execute();
                                $result = $stmt->get_result();
                        if ($row = $result->fetch_assoc()) { ?>
                        <form action="../actions/update_member.php?param=<?php echo $_GET['param']?>" class="english" method="POST" enctype="multipart/form-data">
                            <div class="back mb-3">
                                <a href="./../pages/elements.php" style="color: #000">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                          </svg>
                                </a>
                            </div>
                            <div class="image mb-3">
                                <img src="" id="memberImage" alt="">
                                <div class="mb-3">
                                    <input class="form-control" name="file" accept="images/*" onchange="onChangeMemberImage(event)" id="image" type="file">
                                </div>
                            </div>
                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $row['first_name'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $row['last_name'] ?>">
                                </div>
                            </div>


                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="position" id="position" placeholder="Position" value="<?php echo $row['position'] ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $row['phone'] ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="comment" rows="3" id="comment" placeholder="What he/she thinks about the company..." value="<?php echo $row['comment'] ?>"></textarea>
                            </div>
                            <button type="submit" name="submit"  id="member_submit" class="btn"> Add Member </button>
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