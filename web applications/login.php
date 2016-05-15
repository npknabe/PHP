<?php // Script 8.8 - login.php
define('TITLE', 'Login');
include('templates/header.html');
print '<h2> Login Form</h2>
<p>Users who are logged in can take advantage of certain features like this, that, and the other thing.</p>';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
		if ( (strtolower($_POST['email']) == 'npknabe@gmail.com') && ($_POST['password'] == 'skateboard') ) {
			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['loggedin'] = time();
			ob_end_clean();
			header ('Location: welcome.php');
			exit();
		} else { 
			print '<p>Please make sure you enter both an email address and a password!<br />Go back and try again.</p>';
	} 	} else { 
				print '<p>The submitted email address does not match the one on file!<br />Please go back and try again. </p>';
		}		
} 		else {
				print '<form action="login.php" method="post">
			<p>Email Address: <input type="text" name="email" size="20" /></p>
			<p>Password: <input type="password" name="password" size="20"/></p>
			<p><input type="submit" name="submit" value="Log In!" /></p>
			</form>';
		}
include('templates/footer.html');
?>



