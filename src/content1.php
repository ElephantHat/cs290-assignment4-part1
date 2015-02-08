<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');

session_start();
$content = "";

if (isset($_POST['username'])) {
	if ($_POST['username'] == null || $_POST['username'] == "") {
		$content="A username must be entered.".
			" Click <a href='login.php?reset=true'>here</a>".
			" to return to the login screen.";
		$_SESSION['active'] = false;
	}
	else {
		if(!isset($_SESSION['username'])) {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['counter'] = 0;
			$_SESSION['active'] = true;
			$content = "Hello ".$_SESSION['username']." you have visited this ".
			"page ".$_SESSION['counter']." times before. Click <a href=".
			"'login.php?reset=true'>here</a> to logout.<br>Click <a href=".
			"'content2.php'>here</a> for Content2.php.";
		$_SESSION['counter']++;

		}
    }
}


if (isset($_SESSION['username'])) {
	if (isset($_POST['username'])) {
		if ($_SESSION['username'] != $_POST['username']) {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['counter'] = 0;
			$_SESSION['active'] = true;
			$content = "Hello ".$_SESSION['username']." you have visited this ".
			"page ".$_SESSION['counter']." times before. Click <a href=".
			"'login.php?reset=true'>here</a> to logout.<br>Click <a href=".
			"'content2.php'>here</a> for Content2.php.";
			$_SESSION['counter']++;

		}
		else {
			$content = "Hello ".$_SESSION['username']." you have visited this ".
			"page ".$_SESSION['counter']." times before. Click <a href=".
			"'login.php?reset=true'>here</a> to logout.<br>Click <a href=".
			"'content2.php'>here</a> for Content2.php.";
			$_SESSION['counter']++;
		}

	}
	else {
		$content = "Hello ".$_SESSION['username']." you have visited this ".
			"page ".$_SESSION['counter']." times before. Click <a href=".
			"'login.php?reset=true'>here</a> to logout.<br>Click <a href=".
			"'content2.php'>here</a> for Content2.php.";
		$_SESSION['counter']++;
	}
}

if (!isset($_SESSION['active'])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>CS290 Assignment 4.1 - Content1.php</title>
</head>
<body>

<?php echo $content; ?>

</body>
</html>
