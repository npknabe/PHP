<?php
/*
Nick Knabe
This is a web crawler to crawl links through websites.
This can be modified to make multiple crawls via a loop on the actual crawler to go deeper on the sites.
*/

$to_crawl = "http://www.cnn.com";
$c = array(); 

function get_links($url) {
	global $c;
	$input = @file_get_contents($url);
	
	//I used reg expression rather than domdocument just to try it
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>"; 

	preg_match_all("/$regexp/siU", $input, $matches); 
	$base_url = parse_url($url, PHP_URL_HOST);

	$l = $matches[2]; 

	//this is so it does not index multiples of the same page
	foreach($l as $link) {
		if (strpos($link, "#")) { 
			$link = substr($link, 0, strpos($link, "#")); 
		}

		//this looks for pages within the main page that that start with, then starts them on the second part of the string ex: google.com/about vs ./about
		if (substr($link,0,1) == "."){  
			$link = substr($link, 1);
		}

		if (substr($link, 0, 7) == "http://") { 
			$link = $link;
		} else if (substr($link, 0, 8) == "https://") { 
			$link = $link;
		} else if (substr($link, 0, 2) == "//") { 
			$link = substr($link, 2);
		} else if (substr($link, 0, 1) == "#") { 
			$link = $url;
		} else if (substr($link, 0, 7) == "mailto:") {
			$link = "[".$link."]";
		} else {
			if (substr($link, 0, 1) != "/") {
				$link = $base_url."/".$link;
			} else {
				$link = $base_url.$link;
			}
		}

		//checking if it is an http, https, or mailto link
		if (substr($link, 0, 7) != "http://" && substr($link, 0, 8) != "https://" && substr($link, 0, 1) != "[") { 
			if (substr($url, 0, 8) == "https://") {
				//prepend https
				$link = "https://".$link;
			} else {
				// prepend http
				$link = "http://".$link;
			}
		}
		//if not in the array of $link, pass it into the $c array
		if (!in_array($link, $c)) {
			array_push($c, $link); 
		}
	}
}

get_links($to_crawl); 

//this crawls through each of the links. this for each loop only runs once, so crawler does not go as far as it could if we put it in the function with being repeated
foreach($c as $page) {  
	get_links($page);
}

foreach($c as $page) { 
	echo $page."<br />";
}
?>