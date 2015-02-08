<?php
session_start();
if(isset($_GET['reset']) && $_GET['reset'] == true) {
	$_SESSION = array();
	session_destroy();
	$content = "<p>Logged out successfully!<br>Log in again below!</p>";
}

if (isset($_SESSION['active']) && $_SESSION['active'] == true) {
	$content= "<p>Welcome back, ".$_SESSION['username']."! If you are not ".
		$_SESSION['username'].", please <a href='login.php?reset=true'>logout".
		"</a>. Otherwise, click <a href='content1.php'>here</a> to continue.</p>";
       }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
</head>
<body>
<?php echo $content; ?>
<form action="content1.php" method="POST">
  <label><input type="text" name="username" />Username: </label>
  <input type="submit" name="submit" value="Login" />
</form>

</body>
</html>
