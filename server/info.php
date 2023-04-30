<?php
session_start();

$info = array('word' => $_SESSION['word'], 'tries' => $_SESSION['tries']);
$data = json_encode($info);
echo $data;
?>