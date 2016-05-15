<?PHP
/* 
Nick Knabe
11/22/2015

Project Requirements:
-Use Class structures
-Have a Constructor
-Ok to use native PHP, but no 3rd party libraries

Project:
Make a php web application that accepts url of cnn.com's article page.
Make it spit out: 
	1.Headline
	2.A photo(if there is one)
	3.Story

**Make sure to strip out all HTML tags, for example, the story will be text only**

-main.php is the driver file
-WebScraper is a class that you could plug into another program, such as a web cralwer

*/
include ('WebScraper.php');

//@TODO: Add a front-end that passes in $URL
$url = $_POST['website'];
new WebScraper($url);

?>