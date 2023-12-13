<?php
session_start();
include '../connection/connection.php';
if(isset($_SESSION['admin'])) {
  header('location:index.php');
} else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets_auth/style.css" />
    <!-- Fontawesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="container">
      <input type="checkbox" id="flip" />
      <div class="cover">
        <div class="front">
          <img src="../assets_auth/bg.png" alt="" />
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <h1 style="color: #37474f">
              Mini<span style="color: #f6b50e">mal</span>
            </h1>
            <div class="title">Login Admin</div>
            <div style="text-align: center">Welcome Back</div>
            <form action="controller/login.php" method="POST">
              <div class="input-boxes">
                <label for="username">Username</label>
                <div class="input-box">
                  <i class="fas fa-envelope" style="padding: 3%"></i>
                  <input
                    type="text"
                    placeholder="enter your Username"
                    autofocus
                    required
                    name="username" />
                </div>
                <label for="password">Password</label>
                <div class="input-box">
                  <i class="fas fa-lock" style="padding: 3%"></i>
                  <input
                    type="password"
                    placeholder="enter your password"
                    required
                    name="password" />
                </div>
                <div class="button input-box">
                  <input
                    type="submit"
                    value="Login"
                    style="text-align: center" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
}
?>
