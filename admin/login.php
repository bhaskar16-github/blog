<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form id="signUpForm" method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name">
           <label for="fname">First Name</label>
           <small class="error-message" id="fNameError"></small>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name">
            <label for="lName">Last Name</label>
            <small class="error-message" id="lNameError"></small>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email">
            <label for="email">Email</label>
            <small class="error-message" id="emailError"></small>
        </div>
        <i class="fas fa-user"></i> 
        <label>Role</label>
          <div class="input-group d-flex flex-row mt-2 justify-content-center">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="role" id="admin" value="admin">
              <label class="btn btn-dark border p-2 text-light" for="admin">Admin</label>

              <input type="radio" class="btn-check" name="role" id="editor" value="editor">
              <label class="btn btn-dark border p-2 text-light" for="editor">Editor</label>

              <input type="radio" class="btn-check" name="role" id="user" value="user">
              <label class="btn btn-dark border p-2 text-light" for="user">User</label>
            </div>
          </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
            <small class="error-message" id="passwordError"></small>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

<!-- SignIn Modal -->

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form id="signInForm" method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="signInEmail" placeholder="Email">
              <label for="email">Email</label>
              <small class="error-message" id="signInEmailError"></small>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="signInPassword" placeholder="Password">
              <label for="password">Password</label>
              <small class="error-message" id="signInPasswordError"></small>
          </div>
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
