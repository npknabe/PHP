<?php //Script 8.14 - welcome.php and script 9.7
//start session before anything is sent to server
session_start();

define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
include('templates/header.html');

print '<h2>Welcome to the J.D. Salinger Fan Club!</h2>';
print '<p>You\'ve successfully logged in and can now take advantage of everything the site has to offer.</p>';
//info stored in session so call session
print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

//print date/time when logged in
date_default_timezone_set('America/Chicago');
print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '</p>';

//logout link
print '<p><a href="logout.php">Click here to logout.</a></p>';
 
include('templates/footer.html'); 
?>