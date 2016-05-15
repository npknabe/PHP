<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>No Soup for You!</title>
</head>
<body>
	<h1>Mmm...soups</h1>
<?php
// Script 7.3 - soups3.php 
	//error handling
	ini_set ('display_errors', 1);
	error_reporting (E_ALL | E_STRICT);

	$soups = array (
		'Monday' => 'Clam Chowder',
		'Tuesday' => 'White Chicken chili',
		'Wednesday' => 'Vegetarian',
		'Thursday' => 'Chicken Noodle',
		'Friday' => 'Tomato',
		'Saturday' => 'Cream of Broccoli'
	);	

	//print each key and value
	foreach ($soups as $day => $soup) {
		print "<p>$day: $soup</p>\n";
	}
?>

		
</body>
</html>