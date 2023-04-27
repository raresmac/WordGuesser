<?php
session_start();
require 'db_project.php';

if(!isset($_SESSION['logged']) || $_SESSION['logged']!=True) {
	header('Location: index.php');
	exit();
}
var_dump($_POST);

$_SESSION['letters'] = $_POST['letters'];
$_SESSION['tries'] = $_POST['tries'];

if(isset($_SESSION['letters']) || !empty($_SESSION['letters'])) {
    if($_SESSION['letters'] == '?'){
        $sql_query = "SELECT word FROM words ORDER BY RAND() LIMIT 1";
    }
    else{
        $sql_query = "SELECT word FROM words WHERE LENGTH(word) = ".$_SESSION['letters']." ORDER BY RAND() LIMIT 1";
    }
    $result = mysqli_query($conn, $sql_query);
    $_SESSION['word'] = $result->fetch_array()['word'];
    //unset($_SESSION['letters']);
    header('Location: game.php');
    exit();
}
?>