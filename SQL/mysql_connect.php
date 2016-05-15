<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Connect to MySql and Create Database</title>
</head>
<body>
	<?php // Script 12.1 - mysql_connect.php
	if ($dbc = @mysql_connect('localhost', 'root', 'skateboard')){
		print '<p>Successfully connected to MySql!</p>';
		/*	//create the database ran this script once and then commented out, because database exists after one run
			if (@mysql_query('CREATE DATABASE myblog', $dbc)) {
				print '<p>The database has been created!</p>';
			} else {
				print '<p style="color: red;">Could not create the database because:<br />' . mysql_error($dbc) . '.</p>';
			}*/
	//select the database
	if (@mysql_select_db('myblog', $dbc)) {
		print '<p>The database has been selected!</p>';
	} else {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
	}
	mysql_close($dbc);
	} else {
			print '<p style="color: red;">Could not connect to MySQL: <br />' . mysql_error() . '.</p>';
	} 
	?>
</body>
</html>