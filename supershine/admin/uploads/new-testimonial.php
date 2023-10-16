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
        <div class="uploads testimonial">
                <div class="member">
                    <div class="title">
                        <h3>New Testimonial</h3>
                    </div>
                    <div class="forms">

                        <form action="../actions/post_testimonial.php" class="english col-6" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <div class="input">
                                    <label for="before" class="form-label">Before</label>
                                    <input class="form-control" name="before" onchange="onChangeBeforeImage(event)" accept="images/*" type="file">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input">
                                    <label for="after" class="form-label">After</label>
                                    <input class="form-control" name="after" onchange="onChangeAfterImage(event)" accept="images/*" type="file">
                                </div>
                            </div>

                            <div class="button">
                                <button type="submit" name="submit" class="btn"> Add Testimonial </button>
                            </div>
                        </form>

                        <div class="images col-6">
                            <div class="image">
                                <img src="" id="beforeImage" class="rounded mx-auto d-block img-fluid img-fluid img-thumbnail rounded" alt="">
                            </div>
                            <div class="image">
                                <img src="" id="afterImage" class="rounded mx-auto d-block img-fluid img-fluid img-thumbnail rounded" alt="">
                            </div>
                        </div>
                    </div>
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