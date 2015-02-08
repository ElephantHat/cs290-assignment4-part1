<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');

session_start();


if (!isset($_SESSION['active'])) {
	header("Location: login.php");
}
else if(!$_SESSION['active']){
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>CS290 Assignment 4.1 - Content2.php</title>
</head>
<body>

<p>There really isnt't much here. Why not go back to <a href='content1.php'>the first page</a>?</p>

</body>
</html>
