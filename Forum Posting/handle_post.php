<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Forum Posting</title>
</head>
<body>
<?php //Script 5.2 - handlue_post.php
	//Let me learn from my mistakes!
	ini_set('display_errors', 1);
	//Show all possible problems
	error_reporting (E_ALL | E_STRICT);		

	//variables from posting.html transferred into $_POST php variable
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$posting = trim($_POST['posting']);

	//concatenation of first name and last name using . ' ' .
	$name = $first_name . ' ' . $last_name;

	//get word count
	$words = str_word_count($posting);

	//replaces "bad word"
	$posting = str_ireplace('badword1', 'XXXXX', $posting);
	$posting = str_ireplace('badword2', '*%*&^', $posting);
	$posting = str_ireplace('badword3', 'XX&%$#', $posting);

	//print out results
	print "<div>Thank you, $name, for your posting:
	<p>$posting</p>
	<p>($words words)</div>";
?>
</body>
</html>