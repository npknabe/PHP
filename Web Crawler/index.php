<?php

$to_crawl = "http://www.cnn.com";

//this will be the array that allows us to follow all links
$c = array(); 

function get_links($url) {
	global $c;
	$input = @file_get_contents($url);

	// this code cuts out everything except the needed info (links in this case)
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>"; 

	//finds all links on page $matches is the array
	preg_match_all("/$regexp/siU", $input, $matches); 
	$base_url = parse_url($url, PHP_URL_HOST);

	// l is also the array, the array gives tons of info on the page, the [2] is the second element of the array (the links)
	$l = $matches[2]; 

	//this is so it does not index multiples of the same page
	foreach($l as $link) {
		if (strpos($link, "#")) { 
			// first variable to pass the the string, second variable is where you want to start in the string, thrid is the ending point
			$link = substr($link, 0, strpos($link, "#")); 
		}

		//this looks for pages within the main page that that start with ., then starts them on the second part of the string ex: google.com/about vs ./about
		if (substr($link,0,1) == "."){  
			$link = substr($link, 1);
		}

		//we end with 7 because http:// is 7 chars
		if (substr($link, 0, 7) == "http://") { 
			$link = $link;
		} else if (substr($link, 0, 8) == "https://") { //we end with 8 because https:// is 8 chars
			$link = $link;
		} else if (substr($link, 0, 2) == "//") { //we end with 2 because // is 2 chars
			$link = substr($link, 2);
		} else if (substr($link, 0, 1) == "#") { // this one is for if there is a # for a url we will just give it the acutal url
			$link = $url;
		} else if (substr($link, 0, 7) == "mailto:") { // this one is for if there is a # for a url we will just give it the acutal url
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
		// this will push all the $links not in the array into $c so we can follow them 
			array_push($c, $link); 
		}
	}
}
//this is a variable to pass the website through
get_links($to_crawl); 

//this crawls through each of the links. this for each loop only runs once, so crawler does not go as far as it could if we put it in the function with being repeditive
foreach($c as $page) {  
	get_links($page);
}

//this echos out all of the links
foreach($c as $page) { 
	echo $page."<br />";
}

?>