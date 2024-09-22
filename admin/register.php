<?php 

include 'authenticate.php';

if (isset($_POST['signUp'])) {
    $firstName = trim($_POST['fName']);
    $lastName = trim($_POST['lName']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);
    if (empty($firstName) || empty($lastName) || empty($email) ||  empty($role) || empty($password)) {
        echo "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long!";
    } else {
        $passwordHash = md5($password);
        $checkEmailQuery = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmailQuery->bind_param("s", $email);
        $checkEmailQuery->execute();
        $result = $checkEmailQuery->get_result();

        if ($result->num_rows > 0) {
            echo "Email Address Already Exists!";
        } else {
            $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, role, password) VALUES (?, ?, ?, ?, ?)");
            $insertQuery->bind_param("sssss", $firstName, $lastName, $email, $role, $passwordHash);

            if ($insertQuery->execute()) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
        $checkEmailQuery->close();
        $insertQuery->close();
    }
}

if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "Both email and password are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else {
        $passwordHash = md5($password);
        $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $sql->bind_param("ss", $email, $passwordHash);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            echo "Not Found, Incorrect Email or Password";
        }
        $sql->close();
    }
} 
?>