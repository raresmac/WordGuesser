<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
	header('Location: index.php');
	exit();
}

if (isset($_POST['new'])) {
	unset($_POST);
	header("Location: rules.php");
	exit();
}

if (isset($_POST['logout'])) {
	session_destroy();
	header("Location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://kit.fontawesome.com/0668abd750.js" crossorigin="anonymous"></script>

	<title>Main Menu</title>
	<link rel="website icon" type="png" href="../images/logo4.png">

	<link rel="stylesheet" href="../styles/mainMenu.css">
  <link rel="stylesheet" href="../styles/default.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">

</head>

<body>
	<div class="mainMenu">
		<div class="rectangle-title">
			<div class="title">WordGuesser</div>
		</div>
		<form method="post" class="mainMenu">
			<input type="submit" class="newgame-logout-text rectangle-newgame" value="New Game" name="new">
			<input type="submit" class="newgame-logout-text rectangle-logout" value="Logout" name="logout">
		</form>
	</div>
</body>

</html>