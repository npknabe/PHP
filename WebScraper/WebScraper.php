<?PHP
/*
This class is set up so all the user has to do is create WebScraper object,
and pass whichever URL into the constructor. 
This will output the h1, img, and p elements.

*/
class WebScraper{
	private $url;
	//The h1 tag was used instead of the title tag due to how the url tags were labeled
	private $elements = array('h1', 'img', 'p');
	private $doc = null;

	public function __construct($url){
		if($url){
			$this->url = $url;
			$this->scrapeData();
				if($this->doc){
					$this->parse();
				} else {
					echo "Error: The DOMDocument object is not set.";
				}
		
		} else {
			echo "Error: Invalid URL";
		}
	}
/*
The scrapeData method takes all of the HTML content of the URL out and loads it into the DOMDocument.
*/
	private function scrapeData(){
		$urlContents = @file_get_contents($this->url);
		if($urlContents){
			$this->doc = new DOMDocument();
		 	libxml_use_internal_errors(true);
			$this->doc->loadHTML($urlContents);
			libxml_use_internal_errors(false);
		} else {
			echo "Error: You did not get all of the HTML Content";
		}
	}

/*
parse method iterates the element tags specific in $this->elements
and echos results from the DOMDocument.
@TODO move the output to its own method
*/
	private function parse(){
		foreach($this->elements as $element){
        	$domElements = $this->doc->getElementsByTagName($element);
	   		foreach($domElements as $domElement){
	            if($element == 'img'){
	                echo $domElement->getAttribute('src') . "\n  <br> "  ;
	            }
	           	else{
	                echo $domElement->nodeValue . "\n  <br>"  ;
	            }
        	}
    	}
	}
}
?>