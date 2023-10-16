<?php 
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: /supershine/admin/pages/dashboard.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/admin/login.css">
    <title>Supershine | ADMIN</title>
</head>
<body>
    <div class="login">
        <div class="container">
            <div class="content">
            <header>
                <img src="clean-media/clean-logo.jpg" alt="" class="logo rounded">
            </header>
            <div class="login-form">
            <form action="admin/actions/post_login.php" method="post">
            <?php if(isset($_SESSION['errors'])){ ?>
                <div class="errors" id="errors">
                    <div class="error" id="error">
                        <small class="text-danger"><?php print_r($_SESSION['errors']['msg']); unset($_SESSION['errors']); ?></small>
                    </div>
                </div>
            <?php } ?>  
                <div class="inputs">
                    <input type="text" name="phone" id="" class="form-control" placeholder="phone">
                    <input type="password" name="password" id="" class="form-control" placeholder="password">
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
            </form>
            </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>