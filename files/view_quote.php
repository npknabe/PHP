<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>View a Quotation</title>
</head>
<body>
	<h1>Random Quotations</h1>
	<?php // Script 11.3 - view_quote.php

	$data = file('../quotes.txt');

	$n = count($data);
	$rand = rand(0, ($n - 1));

	print '<p>' . trim($data[$rand]) . '</p>';
	?>
</body>
</html>