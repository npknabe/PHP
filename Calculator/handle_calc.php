<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type"
			content="text/html;
			charset=utf-8"/>
		<title>Product Cost Calculator</title>
		<style type="text/css" media="screen"> .number { font-weight: bold; }</style>
	</head>
	<body>
		<?php //Script 4.2 - handlue_calc.php
		/*
		This script takes values from calculator.html 
		and performs total cost and monthly payment calculations. 
		*/
			//error reports to dispaly all errors
			ini_set('display_errors', 1);
			error_reporting(E_ALL | E_STRICT);

			//variables
			$price = $_POST['price'];
			$payments = $_POST['payments'];
			$shipping = $_POST['shipping'];
			$quantity = $_POST['quantity'];
			$tax = $_POST['tax'];
			$discount = $_POST['discount'];

			//calculations

			//total
			$total = (($price * $quantity) + $shipping)- $discount;

			//tax rate
			$taxrate = $tax/100;
			$taxrate++;

			//tax rate added in to total
			$total = $total * $taxrate;

			//monthly payments
			$monthly = $total / $payments;

			//Number formatting
			$total = number_format ($total, 2);
			$monthly = number_format ($monthly, 2);

			//printing results
			print "<p>You have selected to purchase:<br/> <span class=\"number\">$quantity</span> widget(s) at <br /> 
			$<span class=\"number\">$price </span> price each plus a<br /> 
			$<span class=\"number\">$shipping </span> shipping cost and a <br /> <span class=\"number\":>$tax </span> percent tax rate.<br />
			After your $<span class=\"number\"> $discount</span> discount, the total cost is 
			$<span class=\"number\">$total</span>.<br />

			Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";
		?>
	</body>
</html>