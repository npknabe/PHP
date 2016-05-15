<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>I Have This Sorted Out</title>
</head>
<body>
	
<?php
// Script 7.7 - list.php
$words_array = explode(' ' ,$_POST['words']);
sort($words_array);

//convert words_array to a string (string_words)
$string_words = implode('<br />', $words_array);
print "<p>An alphabetized version of you list is: <br />$string_words</p>";
?>
</body>
</html>