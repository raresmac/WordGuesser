<?php
session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != True) {
	header('Location: index.php');
	exit();
}
?>