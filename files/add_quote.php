<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Add a Quotation</title>
</head>
<body>

	<?php // Script 11.1 - add_quote.php
	$file = '../quotes.txt'; //NOT SURE IF THIS WILL ACCESS THE FILE, IT WAS PUT IN C:/APACHE24
	if ($_SERVER['REQUEST_METHOD'] =='POST'){
		if ( !empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.') ) {
			if (is_writable($file)) {
				file_put_contents($file, $_POST['quote'] . PHP_EOL, FILE_APPEND | LOCK_EX);
				print '<p>Your quotation has been stored.</p>';
			} else { //could not open file
				print '<p style="color: red;">Your quotation could not be stored due to a system error.</p>';
			}
			} else { //failed to enter a quotation
			print '<p style="color: red;">Please enter a quotation!</p>';
		}
	} // end of submitted IF
	?>

	<!-- HTML form -->
	<form action="add_quote.php" method="post">
		<textarea name ="quote" rows="5" cols="30">Enter your quotation here.</textarea><br />
		<input type="submit" name="submit" value="Add This Quote!" />
		<input type="hidden" name="submitted" value="true" />
	</form>
</body>
</html>