<?php
session_start();
include("templates/header.php");
?>

<div class="posts-list w-100 p-5">
<?php
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        session_start();

// Get the current user ID from session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Get the user's role


// Function to generate tags based on the user's role
function generateTags($role) {
    $tags = [];

    switch ($role) {
        case 'admin':
            $tags = ['view', 'edit', 'delete'];
            break;

        case 'editor':
            $tags = ['view', 'delete'];
            break;

        case 'user':
            $tags = ['view'];
            break;

        default:
            echo "Invalid role.";
            break;
    }

    return $tags;
}

// Get the appropriate tags for the current user
$tags = generateTags($role);

?>
  ?>
        
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;"> Created At</th>
                <th style="width:15%;">Title</th>
                <th style="width:45%;">Content</th>
                <th style="width:25%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../connect.php');
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($Conn,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $data["date"]?></td>
            <td><?php echo $data["title"]?></td>
            <td><?php echo $data["content"]?></td>
            <td>
                 <?php if (in_array('view', $tags)): ?>
                    <button class="btn btn-info" href="view.php?id=<?php echo $data['id']; ?>">View</button>
                <?php endif; ?>
                
                <?php if (in_array('edit', $tags)): ?>
                    <button class="btn btn-warning" href="edit.php?id=<?php echo $data['id']; ?>">Edit</button>
                <?php endif; ?>

                <?php if (in_array('delete', $tags)): ?>
                    <button class="btn btn-danger" href="delete.php?id=<?php echo $data['id']; ?>">Delete</button>
                <?php endif; ?>
            </td>
            </tr>
            <?php
            }
            ?>
           
        </tbody>
    </table>
</div>

<?php
include("templates/footer.php");
?>