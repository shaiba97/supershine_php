<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/pages/nav.css">
    <link rel="stylesheet" href="../style/pages/general.css">
    <link rel="stylesheet" href="../style/pages/book.css">
    <link rel="stylesheet" href="../style/pages/footer.css">


    <title>Supershine | Book</title>
</head>
<body>
    <header>
        <?php include('../pages/menu-nav.php') ?>
    </header>



    <div class="booking">
        <div class="info container">
            <form action="../admin/actions/post_booking.php" method="post" class="card" id="booking">
            <?php if(isset($_SESSION['errors'])){ ?>
                            <div class="errors" id="errors">
                                <div class="error" id="error">
                                    <small class="text-danger"><?php print_r($_SESSION['errors']['msg']); unset($_SESSION['errors']); ?></small>
                                </div>
                            </div>
                            <?php } ?>
                <div class="inputs" id="inputs">
                    <div class="two">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number">
                        <div id="contactHelp" class="form-text">We'll never share your contact with anyone else.</div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="building" id="building" placeholder="Building">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="floor" id="floor" placeholder="floor">
                        </div>
                    </div>

                    <div class="two">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="tower" id="tower" placeholder="tower (Optional)">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="landmark" id="landmark" placeholder="landmark (Optional)">
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn" value="Book">
            </form>
        </div>
    </div>

    <?php include('../pages/footer.php') ?>




    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>