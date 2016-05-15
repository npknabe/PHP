<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Date Menus</title>
</head>
<body>
	<?php // Script 10.1 - menus.php
	function make_date_menus(){
		$months = array(1 => 'January', 'February', 'March', 'April', 'May', 'june', 'July', 'August', 'September', 'October', 'November', 'December');
		print '<select name="month">';
		foreach ($months as $key => $value) {
			print "\n<option value=\"$key\">$value</option>";
		}
		print '</select>';
		print'<select name="day">';
		for ($day = 1; $day <= 31; $day++) {
			print "\n<option value=\"$day\">$day</option>";
		}
		print '</select>';
	} // end of make_date_menus() function

	print '<form action="" method="post">';
	make_date_menus();
	print '</form>';
	?>
</body>
</html>

