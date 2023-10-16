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
    <link rel="stylesheet" href="../../style/admin/generals.css">
    <link rel="stylesheet" href="../../style/admin/uploads.css">
    <link rel="stylesheet" href="../../style/admin/tables.css">
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
                        <h3>Comments</h3>
                    </div>

                    <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $sql = "SELECT * FROM comments";
                        $result = $conn->query($sql);if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {?>

                                <tr>
                                    <td><?php echo $row["first_name"] ?></td>
                                    <td><?php echo $row["last_name"] ?></td>
                                    <td><?php echo $row["phone"] ?></td>
                                    <td style="text-align:justify; width: 340px" ><?php echo $row["comment"] ?></td>
                                    <td>
                                        <?php 
                                            $timestamp = strtotime($row['date']);
                                            $formattedDate = date('F d, Y', $timestamp);
                                            echo $formattedDate;
                                         ?>
                                    </td>
                                    <td class="cta">
                                        <a href="/supershine/admin/actions/delete_comment.php?param=<?php echo $row['id']?>" class="btn delete" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </a >
                                    </td>
                                </tr>

                                <?php }
                            }?>
                    </tbody>
            </table>
                </div>
            </div>
            <div class="config">
                <?php 
                $routes = [
                    ' member' => '/supershine/admin/pages/elements.php',
                    ' service' => '/supershine/admin/elements/services.php',
                    ' testimonial' => '/supershine/admin/elements/testimonials.php',
                    ' blog' => '/supershine/admin/elements/blogs.php',
                    ' comment' => '/supershine/admin/elements/comments.php',
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


