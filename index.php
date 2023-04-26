<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://kit.fontawesome.com/0668abd750.js" crossorigin="anonymous"></script>

  <title>LoginPage</title>
  <link rel="website icon" type="png" href="images/logo4.png">

  <link rel="stylesheet" href="styles/register.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">

</head>

<body>

  <?php
  if (!empty($_SESSION['error'])) {
    echo "<div style='padding-bottom:15px;color:red;'>" . $_SESSION['error'] . "</div>";
  }
  unset($_SESSION['error']);
  ?>

  <div class="letters-in-background">
    <div class="B">B</div>
    <div class="N">N</div>
    <div class="F">F</div>
    <div class="P">P</div>
    <div class="A">A</div>
  </div>

  <div class="container">
    <div class="rectangle-title">
      <div class="title">WordGuesser</div>
    </div>
    <form method="post" class="container" action="login.php">
      <div class="username">
        <div class="username-password-text">
          Username
        </div>
        <input type="text" class="rectangle-username-password" name="name">
      </div>

      <div class="password">
        <div class="username-password-text">
          Password
        </div>
        <input type="password" class="rectangle-username-password" name="password">
      </div>

      <div class="login-register">
        <input type="submit" class="rectangle-login-register" value="Login" name="login">
        <input type="submit" class="rectangle-login-register" value="Register" name="register">
      </div>

      <!-- 
      <input type="submit" class="forgot-password" value="Password forgot" name="forgot"> 
      -->
      <!-- <div class="forgot-password">
        Password forgot
      </div> -->
    </form>
  </div>
</body>
</html>