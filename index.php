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
                <input type="text" name="search" required value="<?php if(isset($_GET['search'])) {echo htmlspecialchars($_GET['search']);} ?>" class="form-control border border-secondary" placeholder="Search Here"> 
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary border border-dark mb-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                <button type="button" class="btn btn-secondary border border-dark mb-3"  onclick="clearSearch()"><i class="fa-solid fa-x"></i></button>
            </div> 
        </form>

        <?php
            $con = mysqli_connect("localhost","root", "", "cms");

            if(isset($_GET['search'])) {
                $filtervalues = $_GET['search'];

                if($filtervalues != "") {
                    $query = "SELECT * FROM posts WHERE CONCAT(title, content) LIKE '%$filtervalues%'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
        ?>
                        <div class="container"style="height: 480px;">
                            <div class="row p-3 bg-dark text-light border rounded-3">
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
                                    <a href="view.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary border border-light text-light">READ MORE</a>
                                </div>
                            </div>
                        </div>
        <?php
                        }
                    } else {
                        echo "<p>No record found..!</p>";
                    }
                } else {
                    include "display.php";
                }
            } else {
                include "display.php";
            }
        ?>
    </div>
    
    <footer class="bg-dark p-3">
        <a href="admin/login.php" class="text-light btn btn-primary border">Admin Panel</a>
    </footer>

    <script>     
        function clearSearch() {
            document.querySelector('input[name="search"]').value = '';
            window.location.href = window.location.pathname + "?search=";
        }
    </script>
</body>
</html>
