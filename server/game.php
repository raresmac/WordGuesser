<?php
session_start();

var_dump($_POST);

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
    header('Location: index.php');
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

    <title>Rules Page</title>
    <link rel="website icon" type="png" href="../images/logo4.png">

    <link rel="stylesheet" href="../styles/game.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
</head>

<body>
    <form>
        <div>
            <input style="text-transform: uppercase;" type="text" name="name">
        </div>
        <div>
            <input style="text-transform: uppercase;" type="text" name="password">
        </div>
        <button type="button">Home</button>
    </form>
</body>

</html>