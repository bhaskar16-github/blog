<?php
include 'authenticate.php';

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
if (isset($_POST['signUp'])) {
    $firstName = sanitizeInput($_POST['fName']);
    $lastName = sanitizeInput($_POST['lName']);
    $email = sanitizeInput($_POST['email']);
    $role = sanitizeInput($_POST['role']);
    $password = $_POST['password'];
    $errors = [];

    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }
    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    $validRoles = ['admin', 'editor', 'user'];
    if (!in_array($role, $validRoles)) {
        $errors[] = "Invalid role selected.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $checkEmail = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email Address Already Exists!";
        } else {
            $insertQuery = "INSERT INTO users (firstName, lastName, email, role, password)
                            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("sssss", $firstName, $lastName, $email, $role, $hashedPassword);

            if ($stmt->execute()) {
                header("location: login.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
    
    $sql="SELECT * FROM users WHERE email='$email' and password='$hashedPassword'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
     session_start();
     $row=$result->fetch_assoc();
     $_SESSION['email']=$row['email'];
     header("Location: index.php");
     exit();
    }
    else{
     echo "Not Found, Incorrect Email or Password";
    }
 
 }
?>