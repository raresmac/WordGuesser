<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
	header('Location: ../index.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="website icon" type="png" href="../images/logo4.png">

  <title>Game Page</title>
  <link rel="stylesheet" href="../styles/game.css">
  <link rel="stylesheet" href="../styles/default.css">
  <link rel="stylesheet" href="../styles/lost.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://kit.fontawesome.com/0668abd750.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
</head>

<body>
  <div class="enableBlur" id="enableBlur">
    <div id="icon-game-page">
      <!-- <div class="show-how-many-hints">
        <i class="fa-solid fa-lightbulb icon-hint"></i>
        <div class="text-show-hints">5/7</div>
      </div> -->
      <a href="main.php">
        <i class="fa-solid fa-house icon-home"></i>
      </a>
    </div>

    <div id="game-board"></div>

    <button id="submit-button">
      Submit
    </button>

    <div class="mainMenu disableBlur" id="mainMenuLost">
      <div class="rectangle-lost">
        <div class="text-you-lost">You lost! :&#40</div>
        <div class="text-the-word-was">The word was:</div>
        <div class="text-correct-word"><?php echo strtoupper($_SESSION['word']); ?></div>
        <div class="icons">
          <a href="choose.php">
            <button class="icons-style color-green" onclick=><i class="fa-solid fa-play"></i></button>
          </a>
          <a href="rules.php">
            <button class="icons-style color-magenta"><i class="fa-solid fa-gear"></i></button>
          </a>
          <a href="main.php">
            <button class="icons-style color-purple"><i class="fa-solid fa-house"></i></button>
          </a>
        </div>
      </div>
    </div>
    <div class="mainMenu disableBlur" id="mainMenuWon">
      <div class="rectangle-lost">
        <div class="text-you-lost">You won!</div>
        <div class="text-the-word-was">You used:</div>
        <div class="text-correct-word">X hints</div>
        <div class="icons">
          <a href="choose.php">
            <button class="icons-style color-green"><i class="fa-solid fa-play"></i></button>
          </a>
          <a href="rules.php">
            <button class="icons-style color-magenta"><i class="fa-solid fa-gear"></i></button>
          </a>
          <a href="main.php">
            <button class="icons-style color-purple"><i class="fa-solid fa-house"></i></button>
          </a>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="../scripts/game.js" type="module"></script>
</body>

</html>