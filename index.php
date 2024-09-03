<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header class="bg-dark text-center p-3">
        <h1 class="text-light text-decoration-none">Blogs Are Here</h1>
    </header>
    <div class="post-list mt-1">
        <form class="row justify-content-center" action="" method="GET">
            <div class="col-5">
                <input type="text" name="search" require value="<?php if(isset($_GET['search'])) {echo htmlspecialchars($_GET['search']);} ?>" class="form-control border border-secondary" placeholder="Search Here"> 
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                <button type="submit" class="btn btn-secondary mb-3"  onclick="clearSearch()"><i class="fa-solid fa-x"></i></button>
            </div> 
            <script>
                
             function clearSearch() {
                document.querySelector('input[name="search"]').value = '';
                window.location.href = window.location.pathname + "?clear=1";
                }
            </script>
        </form>

            <?php

                $con = mysqli_connect("localhost","root", "", "cms");

                if(isset($_GET['search']))

                {

                $filtervalues = $_GET['search'];

                $query = "SELECT * FROM posts WHERE CONCAT(title, content) LIKE '%$filtervalues%' ";

                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach ($query_run as $row){
            ?>
                        <div class="row  p-3 bg-secondary text-light border rounded-3">
                            <div class="col-sm-2">
                                <?php echo htmlspecialchars($row["date"]); ?>
                            </div>
                            <div class="col-sm-3">
                                <h2><?php echo htmlspecialchars($row["title"]); ?></h2>
                            </div>
                            <div class="col-sm-5">
                                <?php echo htmlspecialchars($row["content"]); ?>
                            </div>
                            <div class="col-sm-2">
                                <a href="view.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary border border-dark text-dark">READ MORE</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <p>No record found..!</p>
                <?php
                     }
                 }
                ?>
        <div class="container" style="width: 1250px; height: 475px;">   
            <?php include "display.php"; ?>
        </div>
    </div>
    <div class="footer bg-dark p-3 mt-4">
        <a href="admin/logout.php" class="text-light btn btn-primary">Admin Panel</a>
    </div>
</body>
</html>
