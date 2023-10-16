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
    $testimonials = "SELECT * FROM testimonials LIMIT 4";
    $resultTestimonials = $conn->query($testimonials);

    $blogs = "SELECT * FROM blogs LIMIT 4";
    $resultBLogs = $conn->query($blogs);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/pages/nav.css">
    <link rel="stylesheet" href="style/pages/general.css">
    <link rel="stylesheet" href="style/pages/home.css">
    <link rel="stylesheet" href="style/pages/testimonials.css">
    <link rel="stylesheet" href="style/pages/blogs.css">
    <link rel="stylesheet" href="style/pages/footer.css">


    <title>Supershine | Home</title>
</head>
<body>
    <header>
        <?php include('pages/menu-nav.php') ?>
    </header>

    <div class="wrapper-home">
    <div class="containers">
        <div class="contents">
            <div class="hero-section">

                <div class="hero">
                    <div class="hero-text">
                        <h1>Meet the professional Company in UAE</h1>
                        <p>
                            Get in touch today to see how we can help you!
                        </p>
                        <a href="/supershine/pages/book.php" class="btn"> Book Now </a>
                    </div>
                </div>

                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="clean-media/francesca-tosolini-tHkJAMcO3QE-unsplash.jpg" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="clean-media/zac-gudakov-95UK5aVgx54-unsplash.jpg" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="clean-media/tetiana-shyshkina-rt4vVJHmmu4-unsplash.jpg" class="d-block img-fluid w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon btn" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon btn" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>

            <div class="title"></div>

            <div class="price container" style="display: flex; place-content: center;">
                <img style="width: 50%;" src="../../../assets/clean-media/price-clean.jpg" alt="">
            </div>

            <div class="title"></div>

            <div class="why-us">
                <div class="title">
                    <h1> why us </h1>
                </div>
                <div class="content">
                    <div class="box card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                      </svg>
                        <span>Customer Satisfaction</span>
                    </div>
                    <div class="box card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"
                            />
                            </svg>
                        <span>Transparent Pricing</span>
                    </div>
                    <div class="box card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                        <span>Clear Communication</span>
                    </div>
                    <div class="box card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                        <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
                      </svg>
                        <span>Flexible Scheduling</span>
                    </div>
                </div>
            </div>

            <div class="title"></div>

            <div class="wrapper-testimonials">
                <div class="divider title">
                    <h1> Our Works </h1>
                </div>

                <div class="container">
                    <div class="images">
                    <?php if ($resultTestimonials->num_rows > 0) {
                            while ($row = $resultTestimonials->fetch_assoc()) {?>
                        <div class="card">

                            <div class="time">
                                <img src="admin/uploaded_image/testimonials/<?php echo $row['beforeImage'] ?>" class="d-block w-100 img-thumbnail img-fluid" alt="...">
                            </div>
                            <div class="time">
                                <img src="admin/uploaded_image/testimonials/<?php echo $row['afterImage'] ?>" class="d-block w-100 img-thumbnail img-fluid" alt="...">
                            </div>
                        </div>
                        <?php }
                    } ?>

                    </div>
                </div>

                <div class="divider"></div>
            </div>

            <div class="wrapper-blogs ">
    <div class="container">
        <div class="content">
            <div class="divider title">
                <h1> Blogs </h1>
            </div>
            <div class="blogs">
            <div class="figures">
                    <?php if ($resultBLogs->num_rows > 0) {
                            while ($row = $resultBLogs->fetch_assoc()) {?>
                        <figure class="card">
                            <img loading="lazy" class="rounded img-thumbnail" src="admin/uploaded_image/blogs/<?php echo $row['image'] ?>" alt="">
                            <figcaption>
                                <h3><?php echo $row['title'] ?></h3>
                                <p><?php echo $row['blog'] ?></p>
                                <div>
                                <a href="/supershine/pages/blog.php?param=<?php echo $row['id'] ?>" class="btn read_more">Read More</a>
                                </div>
                            </figcaption>
                        </figure>
                        <?php }
                            }?>
                    </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
            </div>

            <div class="title"></div>

            <div class="contact container">
                <div class="title">
                    <h3>serving you, always priority. here we are</h3>
                </div>
                <div class="content">
                    <div class="box x">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                          <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                        </svg>
                    </div>
                    <div class="box snapchat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-snapchat" viewBox="0 0 16 16">
                          <path d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1.416 1.416 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.387 3.387 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.338.338 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.397 1.397 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.829 1.829 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.294 4.294 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0c-.92 0-1.76.216-2.505.641-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.83 1.83 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.398 1.398 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.38.38 0 0 1 .109.11c.026.053.027.11-.012.217a3.363 3.363 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075.119.125.257.23.409.31a4.43 4.43 0 0 0 1 .4.66.66 0 0 1 .202.09c.118.104.102.26.259.488.079.118.18.22.296.3.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.625.625 0 0 1 .19-.087 4.446 4.446 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047Zm-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082-1.519 0-2.045-.801-2.904-1.084-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a.93.93 0 0 1 .197.022c.396.086.78.285 1.002.338.027.007.054.01.082.011.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.35.35 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a.912.912 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464Z"/>
                        </svg>
                    </div>
                    <div class="box instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </div>
                    <div class="box facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="title"></div>

            <a class="container books" href="/supershine/pages/book.php">
             <span class="book">BOOK NOW</span>
            </a>
            <div class="title"></div>
        </div>
    </div>
    </div>

    <?php include('pages/footer.php') ?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>