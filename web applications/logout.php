<?php // Script 9.8 - logout.php
session_start(); //start session
$_SESSION = array(); //clear session to array
session_destroy(); //end session
define('TITLE', 'Logout');
include('templates/header.html');
?>
<h2>Welcome to the J.D> Salinger Fan Club!</h2>
<p>You are now logged out.</p>
<p>Thank you for using this site. We hope that you liked it<br />
	blah blah blah
	blah blahey blah...</p>
<?php include('templates/footer.html');