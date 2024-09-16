<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Blog Is Here</a></h1>
    </header>
    <div class="post-list ">
        <div class="container">
            <?php
                $id = $_GET['id'];
                if ($id) {
                    include("connect.php");
                    $sqlSelect = "SELECT * FROM posts WHERE id = $id";
                    $result = mysqli_query($conn,$sqlSelect);
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                       <div class="post bg-dark p-4 mt-3 bg-subtle border rounded-3 text-light">
                        <h1><?php echo $data['title']; ?></h1>
                        <p><?php echo $data['date']; ?> </p>
                        <p><?php echo $data['content']; ?> </p>
                       </div>
                    <?php
                    }
                }else{
                    echo "No post found";
                }
            ?>
         </div>
    </div>
    <div class="footer bg-dark p-3">
        <a href="admin/index.php" class="btn btn-primary border border-white text-light">Admin Panel</a>
    </div>
</body>
</html>