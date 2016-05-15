<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns-"http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type"
		content="text/html;
		charset=utf-8"/>
	<title>View My Blog</title>
</head>
<body>
	<h1>My Blog</h1>
	<?php // Script 12.7 - view_entries.php
	$dbc = @mysql_connect('localhost', 'root', 'skateboard');
	mysql_select_db('myblog', $dbc);
	//define the query
	$query = 'SELECT * FROM entries ORDER BY date_entered DESC';
	//run the query
	if ($r = mysql_query($query, $dbc)){
		while ($row = mysql_fetch_array($r)){
			print "<p><h3>{$row['title']}</h3>
			{$row['entry']}<br />
			<a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
			<a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
			</p><hr />\n";
		}
	} else { //handle the errors if the query didnt run
		print '<p style="color: red;"> Could not retrieve the data because<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query. '</p>';
	}
	//close the database
	mysql_close($dbc);
	?>
</body>
</html>