<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>Delete a blog Entry</title>
</head>
<body>
	<h1>Delete and Entry</h1>
	<?php // Script 12.8 - delete_entry.php
		$dbc = @mysql_connect('localhost', 'root', 'skateboard');
		mysql_select_db('myblog', $dbc);
		//display entry in form
		if (isset($_GET['id']) && is_numeric($_GET['id']) ) {
			$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
			if ($r = mysql_query($query,$dbc)){
				//retrieve the record and display the entry in a form
				$row = mysql_fetch_array($r);
				print '<form action="delete_entry.php" method="post">
				<p>Are you sure you want to delete this entry?</p>
				<p><h3>' . $row['title'] . '</h3>' . $row['entry'] . '<br />
				<input type="hidden" name="id" value="' . $_GET['id'] . '" />
				<input type="submit" name="submit" value="Delete this Entry!" /></p>
				</form>';
			} else { // couldn't get the information
			print '<p style="color: red;">could not retrieve the blog entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
		} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { //handle the form
			$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
			$r = mysql_query($query, $dbc);
			// check the result of the query
			if (mysql_affected_rows($dbc) == 1) {
				print '<p>The blog entry has been deleted.</p>';
			} else {
				print '<p style="color: red;">Could not delete the blog entry because:<br />' . mysql_error($dbc) . '.</p><p>the query being run was: ' . $query . '</p>';
			}
		} else { // No ID received.
			print '<p style="colord: red;">This page has been accessed in error.</p>';
		} // End of main IF.
		// close the database
		mysql_close($dbc);
	?>
</body>
</html>