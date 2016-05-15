<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
<title>Register</title>
<style type ="text/css" media="screen">
.error { color: red; }
</style>
</head>
<body>
	<h1>Register</h1>
<?php // Script 11.6 - register.php
$dir = '../users/';
$file = $dir . 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$problem = FALSE;
	if (empty($_POST['username'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a username!</p>';
	}
		if (empty($_POST['password1'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password!</p>';
	}
		if($_POST['password1'] != $_POST['password2']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password!</p>';
	}
	//check for problems
	if (!$problem) {
		if (is_writable($file)) {
			$subdir = time() . rand(0, 4596);
			$data = $_POST['username'] . "/t" . md5(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;
			file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
			mkdir($dir . $subdir);
			print '<p>You are now registered!</p>';
		} else { // couldnt write the file
			print '<p class="error">You are could not be registered due to a system error.</p>';
		}
		} else { // forgot a field.
			print '<p class="error">Please go back and try again!</p>';
		}
	} else{
?>

<form action="register.php" method="post">
	<p>Username: <input type="text" name="username" size="20" /></p>
	<p>Password: <input type="password" name="password1" size="30" /></p>
	<p>Confirm Password: <input type="password" name="password2" size="30" /></p>
	<input type="submit" name="submit" value="Register" />
</form>

<?php } // end of submission IF. ?>

</body>
</html>