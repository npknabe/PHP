<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Larry Ullman's Books and Chapters</title>
</head>
<body>
	<h1>Some of Larry Ullman's Books</h1>
<?php
// Script 7.4 - books.php THIS IS FOR MULTIDEMINSIONAL ARRAYS 
	//error handling
	ini_set ('display_errors', 1);
	error_reporting (E_ALL | E_STRICT);

	//1st array
	$phpvqs = array (1 => 'Getting Started with PHP', 'Variables', 'HTML forms and PHP', 'Using Numbers');

	//2nd array
	$phpadv = array (1 => 'Advanced PHP Techniques', 'Developing Web Applications', 'Advanced Database Concepts', 'Security Techniques');

	//3rd array
	$phpmysql = array (1 => 'Introduction to PHP', 'Programming with PHP', 'Creating Dynamic Web Sites', 'Introduction to MySQL');

	//this is the  multidimensioanl array
	$books = array ( 
		'PHP VQS' => $phpvqs,
		'PHP Advanced VQP' => $phpadv,
		'PHP and MySQL VQP' => $phpmysql
		);

	print "<p>The thrid chapter of my first book is <i>{$books['PHP VQS'][3]}</i>.</p>";
	print "<p>The first chapter of my second book is <i>{$books['PHP Advanced VQP'][1]}</i>.</p>";
	print "<p>The fourth chapter of my third book is <i>{$books['PHP VQS'][4]}</i>.</p>";

	foreach ($books as $key => $value)
	{
		print "<p>$key: $value</p>\n";
	}
?>

		
</body>
</html>