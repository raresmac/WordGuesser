<?php
session_start();
require 'db_project.php';

$name = $password = '';
if($_POST['login']) {
	if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['password']) && $_POST['password']!='') {
		$name = $_POST['name'];
		$password = hash('ripemd160', $_POST['password']);
		$sql = "SELECT `user_id` FROM `users` WHERE `user_name` = '$name' AND `user_password` = '$password' ";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1) {
			$_SESSION['logged'] = True;
			header('Location: main.php');
			exit();
		}
		else {
			$_SESSION['error'] = 'Username or password are wrong';
			header('Location: index.php');
			exit();
		}
	}
	else {
		$_SESSION['error'] = 'Username and password are required';
		header('Location: index.php');
		exit();
	}
}
elseif($_POST['register']){
	if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['password']) && $_POST['password']!='') {
		$name = $_POST['name'];
		$sql = "SELECT `user_id` FROM `users` WHERE `user_name` = '$name'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) != 0) {
			$_SESSION['error'] = 'Username already exists';
			header('Location: index.php');
			exit();
		}
		else {
			$_SESSION['logged'] = True;
			$password = hash('ripemd160', $_POST['password']);
			$sql = "INSERT INTO users (user_name, user_password) VALUES ('$name', '$password')";
			$result = mysqli_query($conn, $sql);

			header('Location: main.php');
			exit();
		}
	}
	else {
		$_SESSION['error'] = 'Username and password are required';
		header('Location: index.php');
		exit();
	}
}
elseif($_POST['forgot']){
	$_SESSION['error'] = 'Not my problem!';
	header('Location: index.php');
	exit();
}
else {
	header('Location: index.php');
	exit();
}
?>