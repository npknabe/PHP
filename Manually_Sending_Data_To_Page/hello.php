<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Predefined Variables
	</title>
</head>
<body>
<?php //Script3.7 - helloo.php
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);

$name = $_GET['name'];
print "<p>Hello, <span style=\"font-weight:bold;\">$name</span>!</p>";

?>
</body>
</html>