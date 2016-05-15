<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Registration</title>
	<style type="text/css" media="screen"> .error { color: red; } </style>
</head>
<body>
	<h1>Registration Results</h1>
	<?php //Script 6.2 - handle_reg.php

		//Flag variable to check that form was fully completed in boolean (yes or no)
		$okay = TRUE;

		//validate the email address
		if (empty($_POST['email'])){
		 print '<p class="error">Please enter your email address.</p>';
		 $okay = FALSE;
		}

		//validate password
		if (empty($_POST['password'])){
		 print '<p class="error">Please enter your password.</p>';
		 $okay = FALSE;
		}

		//validate both password fields match
		if ($_POST['password'] != $_POST['confirm']){
			print '<p class="error">Your confirmed password does not match the original password.</p>';
			$okay = FALSE;
		}

		//validate birth year
		//first if checks if the year entered is 4 digits
		if (is_numeric($_POST['year']) AND (strlen($_POST['year']) == 4) ) {
			//validate year is before 2011
			if ($_POST['year'] < 2011) {
				$age = 2011 - $_POST['year'];
			} else {
				print '<p class="error">Either you entered your birth year wrong or you come from the future...fuuuttuuuurreeee.</p>';
			}
		} else {
			print '<p class="error">Please enter the year you were born as four digits.</p>';
			$okay = FALSE;
		}
		//checking that user is born before test year (2011)
		if ($_POST['year'] >= 2011){
			print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
			$okay = FALSE;
		}

		//checking to make sure check box (terms and agreements) is checked
		if (!isset($_POST['terms'])) {
			print '<p class="error">You must accept the terms.</p>';
			$okay = FALSE;
		}

/*
		//if-elseif-else statement to validate colors
		if ($_POST['color'] == 'red'){
			$color_type = 'primary';
		} elseif ($_POST['color'] == 'yellow'){ 
			$color_type= 'primary';
		} elseif ($_POST['color'] == 'green'){
			$color_type = 'secondary';
		} elseif ($_POST['color'] == 'blue'){
			$color_type = 'primary';
		} else {print'<p class="error">Please select your favorite color.</p>';
		$okay = FALSE;
		}
*/				
			
		//switch conditional
		switch($_POST['color']){
			case 
				'red': $color_type = 'primary';
				break;
			case 
				'yellow': $color_type = 'primary';
				break;
			case 
				'green': $color_type = 'secondary';
				break;
			case 
				'blue': $color_type = 'primary';
				break;		
			default: print '<p class="error">Please seelct your favorite color.</p>';
			$okay = FALSE;
			break;
		}

		//if no errors are present, this message will print
		if ($okay){
			print '<p>You have been successfully registered(but not really).</p>';
			print "<p>You will turn $age this year.</p>";
			print "<p>Your favorite color is a $color_type color.</p>";
		}
	?>


</body>
</html>