<?php
  session_start();
  include 'connection/connection.php';

  if(isset($_SESSION['user'])) {
    header('location:/');
  } else {
  ?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <link rel="stylesheet" href="assets_auth/style.css" />
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
          <img src="assets_auth/bg_register.png" alt="" />
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
          <a href="/" style="text-decoration: none;">
            <h1 style="color: #37474f">
              Mini<span style="color: #f6b50e">mal</span>
            </h1>
            </a>
            <div class="title">Create a New Account</div>
            <div style="text-align: center">It’s Quick And Easy</div>
            <form action="controller/register.php" method="POST">
              <div class="input-boxes">
                <label for="name">Name</label>
                <div class="input-box">
                  <i class="fas fa-user" style="padding: 3%"></i>
                  <input
                    type="text"
                    placeholder="your name"
                    required
                    name="name" />
                </div>
                <label for="username">Username</label>
                <div class="input-box">
                  <i class="fas fa-user" style="padding: 3%"></i>
                  <input
                    type="text"
                    placeholder="your username"
                    required
                    name="username" />
                </div>
                <label for="password">Email</label>
                <div class="input-box">
                  <i class="fas fa-envelope" style="padding: 3%"></i>
                  <input
                    type="email"
                    placeholder="enter your email"
                    required
                    name="email" />
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
                <label for="password">confirm Password</label>
                <div class="input-box">
                  <i class="fas fa-lock" style="padding: 3%"></i>
                  <input
                    type="password"
                    placeholder="confirm your password"
                    required
                    name="konfirmasi" />
                </div>
                <div class="button input-box">
                  <input
                    type="submit"
                    value="Register"
                    style="text-align: center" />
                </div>
                <div class="text sign-in-text" style="text-align: center">
                  already have an account? ?
                  <a href="login.php"
                    ><label style="color: #f6b50e">Sign In</label></a
                  >
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
