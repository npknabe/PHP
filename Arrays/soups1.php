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
// Script 7.1 and 7.2 - soups1.php 
	//error handling
	ini_set ('display_errors', 1);
	error_reporting (E_ALL | E_STRICT);

	$soups = array (
		'Monday' => 'Clam Chowder',
		'Tuesday' => 'White Chicken chili',
		'Wednesday' => 'Vegetarian'
		);

	$count1 = count($soups);
	print "<p>The soups array originally had $count1 elements.</p>";

	//add three elements to array $soups
	$soups['Thursday'] = 'Chicken Noodle';
	$soups['Friday'] = 'Tomato';
	$soups['Saturday'] = 'Cream of Broccoli';

	$count2 = count($soups);
	print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";


	//prints the array contents, cannot use [print "<p>$soups</p>";] function, has issue converting array to string
	print_r ($soups);

	//counts how many elements are in the array example
	//$how_many = count($soups);
	//print "<p>$how_many</p>";

?>

		
</body>
</html>