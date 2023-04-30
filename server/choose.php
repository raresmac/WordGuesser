<?php
session_start();
require 'db_project.php';

if(!isset($_SESSION['logged']) || $_SESSION['logged']!=True) {
	header('Location: index.php');
	exit();
};

if(isset($_SESSION['letters']) || !empty($_SESSION['letters'])) {
    if($_SESSION['letters'] == 1000){
        $sql_query = "SELECT word FROM words ORDER BY RAND() LIMIT 1";
    }
    else{
        $sql_query = "SELECT word FROM words WHERE LENGTH(word) = ".$_SESSION['letters']." ORDER BY RAND() LIMIT 1";
    }
    $result = mysqli_query($conn, $sql_query);
    $_SESSION['word'] = $result->fetch_array()['word'];
    header('Location: game.php');
    exit();
}
?>