<?php
session_start();

unset($_SESSION['letters']);
unset($_SESSION['tries']);

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['letters4']) && $_POST['letters4'] == True) {
    $_SESSION['letters'] = 4;
} elseif (isset($_POST['letters5']) && $_POST['letters5'] == True) {
    $_SESSION['letters'] = 5;
} elseif (isset($_POST['letters6']) && $_POST['letters6'] == True) {
    $_SESSION['letters'] = 6;
} elseif (isset($_POST['letters7']) && $_POST['letters7'] == True) {
    $_SESSION['letters'] = 7;
} elseif (isset($_POST['letters8']) && $_POST['letters8'] == True) {
    $_SESSION['letters'] = 8;
} elseif (isset($_POST['letters9']) && $_POST['letters9'] == True) {
    $_SESSION['letters'] = 1000;
}

if (isset($_POST['tries4']) && $_POST['tries4'] == True) {
    $_SESSION['tries'] = 4;
} elseif (isset($_POST['tries5']) && $_POST['tries5'] == True) {
    $_SESSION['tries'] = 5;
} elseif (isset($_POST['tries6']) && $_POST['tries6'] == True) {
    $_SESSION['tries'] = 6;
} elseif (isset($_POST['tries7']) && $_POST['tries7'] == True) {
    $_SESSION['tries'] = 1000;
}

if (isset($_SESSION['letters']) && !empty($_SESSION['letters']) && isset($_SESSION['tries']) && !empty($_SESSION['tries'])) {
    header('Location: choose.php');
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

    <link rel="stylesheet" href="../styles/default.css">
    <link rel="stylesheet" href="../styles/gameRules.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceberg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
</head>

<body>
    <form method="post">
        <div class="gameRules">
            <div class="rules-text">Number of letters:</div>

            <div class="choice">
                <input type="radio" id="a4" name="letters4">
                <label for="a4" class=rectangle-number-choice>4</label>
                <input type="radio" id="a5" name="letters5">
                <label for="a5" class=rectangle-number-choice>5</label>
                <input type="radio" id="a6" name="letters6">
                <label for="a6" class=rectangle-number-choice>6</label>
                <input type="radio" id="a7" name="letters7">
                <label for="a7" class=rectangle-number-choice>7</label>
                <input type="radio" id="a8" name="letters8">
                <label for="a8" class=rectangle-number-choice>8</label>
                <input type="radio" id="a9" name="letters9">
                <label for="a9" class=rectangle-number-choice>?</label>
            </div>

            <div class="rules-text">Number of tries:</div>
            <div class="choice less-space-after-choice">
                <input type="radio" id="t4" name="tries4">
                <label for="t4" class=rectangle-number-try>4</label>
                <input type="radio" id="t5" name="tries5">
                <label for="t5" class=rectangle-number-try>5</label>
                <input type="radio" id="t6" name="tries6">
                <label for="t6" class=rectangle-number-try>6</label>
                <input type="radio" id="t7" name="tries7">
                <label for="t7" class=rectangle-number-try>!</label>

                <div class="rectangle-number-fill"></div>
                <div class="rectangle-number-fill"></div>
            </div>
            <script src="../scripts/select.js"></script>
        </div>
        <button class="rectangle-next-arrow next-arrow"><i class="fa-solid fa-arrow-right"></i></button>
    </form>
</body>

</html>