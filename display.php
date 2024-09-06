<?php 
    include "script.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php
            if (isset($_GET['page-nr'])){
                $id = $_GET['page-nr'];
            }else{
                $id=1;
            }
        ?>
        <link rel="stylesheet" href="./styles.css">
    </head>

    <body id="<?php echo $id ?>">
    <div class="container">
    <div class="content">
        <?php 
            while ($row=$data->fetch_assoc()){
        ?>
         <div class="row mb-4 p-4 bg-subtle border border-primary border-subtle rounded-3 bg-dark text-light">
                        <div class="col-sm-2">
                            <?php echo $row["date"]; ?>
                        </div>
                        <div class="col-sm-3">
                           <marquee><h2> <?php echo $row["title"]; ?></h2></marquee>
                        </div>
                        <div class="col-sm-5">
                            <?php echo $row["content"]; ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary border text-light">READ MORE</a>
                        </div>
                    </div>
            <?php 
            }
        ?>
    </div>
    
    <div class="page-info"> 
        <?php 
            if (!isset ($_GET['page-nr'])){
                $page = 1;
            }else{
                $page = $_GET['page-nr'];
            }
        ?>
        Showing <?php echo $page ?> of <?php echo $pages ?> Pages
    </div>

    <nav aria-label="...">
        <ul class="pagination justify-content-end">
        
        <li class="page-item active d-flex border">
        <?php
            if(isset($_GET['page-nr'])&& $_GET['page-nr']>1){
        ?>
            <a class="page-link active" href="?page-nr=<?php echo $_GET['page-nr'] -1 ?>">Previous</a>
        <?php 
            }else{
        ?>
            <a class="page-link active">Previous</a>

        <?php
            }
        ?>
        </li>
        
            <div class="page-numbers d-flex border">
                <?php 
                    for ($counter = 1; $counter <= $pages; $counter ++){
                ?>
                <a class="page-link" href="?page-nr= <?php echo $counter ?>"><?php echo $counter ?></a> 
                <?php   
                    }
                ?>    

        </div>

        <li class="page-item active d-flex border">
        <?php
        if(!isset($_GET['page-nr'])){

        ?>

        <a class="page-link active" href="?page-nr=2">Next</a>

        <?php

        }else{

        if($_GET['page-nr'] >= $pages) {

        ?>

        <a class="page-link active">Next</a>


        <?php


        }else{

        ?>

        <a class="page-link active" href="?page-nr=<?php echo $_GET['page-nr'] +1 ?>">Next</a>

        <?php

        }

        }

        ?>
        </li>
        </ul>
    </nav>
    </div>
<script>
    let links = document.querySelectorAll('.page-numbers > a');
    let bodyId = parseInt(document.body.id) - 1;
    links [bodyId].classList.add("active");
</script>
</body>
</html>