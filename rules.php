<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
    header('Location: index.php');
    exit();
}

// if (isset($_SESSION['letters']) && !empty($_SESSION['letters']) && isset($_SESSION['tries']) && !empty($_SESSION['tries'])) {
//     header('Location: choose.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/0668abd750.js" crossorigin="anonymous"></script>

    <title>Rules Page</title>
    <link rel="website icon" type="png" href="images/logo4.png">

    <link rel="stylesheet" href="styles/default.css">
    <link rel="stylesheet" href="styles/gameRules.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    unset($_SESSION['letters']);
    unset($_SESSION['tries']);
    ?>
    <div class="gameRules">
        <div class="rules-text">Number of letters:</div>

        <div class="choice">
            <input type="button" class="rectangle-number-choice" value="4" name="letters4">
            <input type="button" class="rectangle-number-choice" value="5" name="letters5">
            <input type="button" class="rectangle-number-choice" value="6" name="letters6">
            <input type="button" class="rectangle-number-choice" value="7" name="letters7">
            <input type="button" class="rectangle-number-choice" value="8" name="letters8">
            <input type="button" class="rectangle-number-choice" value="?" name="letters?">
        </div>

        <div class="rules-text">Number of tries:</div>
        <div class="choice less-space-after-choice">
            <input type="button" class="rectangle-number-try" value="4" name="tries4">
            <input type="button" class="rectangle-number-try" value="5" name="tries5">
            <input type="button" class="rectangle-number-try" value="6" name="tries6">
            <input type="button" class="rectangle-number-try" value="!" name="tries!">

            <div class="rectangle-number-fill"></div>
            <div class="rectangle-number-fill"></div>
        </div>
        <script src="scripts/select.js"></script>
    </div>
    <form method="post">
        <button class="rectangle-next-arrow next-arrow"><i class="fa-solid fa-arrow-right"></i></button>
    </form>
</body>

</html>