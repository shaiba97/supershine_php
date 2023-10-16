<?php session_start(); ?>
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
            <div class="uploads">
                <div class="member">
                    <div class="title">
                        <h3>New Member</h3>
                    </div>
                    <div class="forms">
                    <?php if(isset($_SESSION['errors'])){ ?>
                        <div class="errors" id="errors">
                            <div class="error" id="error">
                                <small class="text-danger"><?php print_r($_SESSION['errors']['msg']); unset($_SESSION['errors']); ?></small>
                            </div>
                        </div>
                        <?php } ?>
                        <form action="../actions/post_member.php" class="english" method="POST" enctype="multipart/form-data">
                            
                            <div class="image mb-3">
                                <img src="" id="memberImage" alt="">
                                <div class="mb-3">
                                    <input class="form-control" name="file" accept="images/*" onchange="onChangeMemberImage(event)" (click)="delete($event)" id="image" type="file">
                                </div>
                            </div>
                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" (click)="delete($event)" name="first_name" id="first_name" placeholder="First Name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" (click)="delete($event)" name="last_name" id="last_name" placeholder="Last Name">
                                </div>
                            </div>


                            <div class="two">
                                <div class="mb-3">
                                    <input type="text" class="form-control" (click)="delete($event)" name="position" id="position" placeholder="Position">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" (click)="delete($event)" name="phone" id="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" (click)="delete($event)" name="comment" rows="3" id="comment" placeholder="What he/she thinks about the company..."></textarea>
                            </div>
                            <button type="submit" name="submit"  id="member_submit" class="btn"> Add Member </button>
                        </form>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="config">
                <?php 
                $routes = [
                    'new member' => '../pages/uploads.php',
                    'new service' => '../uploads/new-service.php',
                    'new testimonial' => '../uploads/new-testimonial.php',
                    'new blog' => '../uploads/new-blog.php',
                ];
                ?>
                <ul>
                    <?php foreach ($routes as $key => $value) {?>
                        <li><a href="<?php echo $value ?>"><?php echo $key ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="../../javascript/image.js"></script>
</body>
</html>