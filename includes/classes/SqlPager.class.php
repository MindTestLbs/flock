<?php
/**-***********************************************************************************************
***************************************************************************************************
* Takes in a SQL query and makes a paging system to display the results of the query. Uses there
* 		LIMIT keyword to divide the result into sections.
***************************************************************************************************/
class SqlPager extends db{
	////////////////////////////////// Public Variables /////////////////////////////
	var $items_per_page = 1;
	var $query = "";
	var $page  = 1;
	
	//Options
	var $opt_links_count = 5; 		//Number of Page Number links shown at the bottom - if 0, show all links.
	//Display Texts
	var $opt_texts = array(
		'back' => 'Prev',     'next' => 'Next',		//Next and Previous Texts
		'first'=> 'First', 'last' => 'Last',	//First and Last Links
		'current_page_indicator_left'=>'','current_page_indicator_right'=>'',
		'links_seperator' => " "					//The text used to seperate the links(Page numbers). 
	);

	///////////////////////////////// (Idealy) Private Variables //////////////////////////////
	//These should be private variables - but I don't know how to make them private in PHP4
	var $_total_items = 0; //Total number of items
	var $_total_pages = 0; //Total number of pages
	var $_page_link   = "";//The text that must be used while making links to other pages.

	/**
	* Constructor
	*/
	
	function SqlPager($query,$totalRows,$conditionValues,$page_link="",$items_per_page=25,$dbDetails) {
		$query = preg_replace("/LIMIT [0-9]+,[0-9]+/i","",$query); //Remove the LIMIT option if there is one.
		//Get all the options that must be there.
		$this->query = $query;
		parent::__construct($dbDetails); 
		
		//Number of items that must be displayed in one page.
		$this->items_per_page = ($_REQUEST['items_per_page']) ? (int)($_REQUEST['items_per_page']) : (int)($items_per_page);
		$items_per_page = $this->items_per_page;
		
		//The pager is located in which page... Used to give the page numbers as a GET request.
		$page_link = ($page_link) ? $page_link : basename($_SERVER['PHP_SELF']).'?';
		$last_char = $page_link[strlen($page_link)-1];
		if($last_char != '&' and $last_char != '?') { //If the given page dont end with a ? or a &,
			if(strpos($page_link,'?') === false) $page_link .= '?';// Add the '?' if there is no '?'
			else $page_link .= '&'; //If there is a '?', add a '&' at the end.
		}
		//Add the items per page option to the page link.
		if($_REQUEST['items_per_page']) {
			$page_link .= "items_per_page=$items_per_page&";
		}
		$this->_page_link = $page_link;

		$this->page = ($_REQUEST['page']) ? $_REQUEST['page'] : 1; //Get the current page we are on.

		//Get the total number of items.
		//$this->prepareConditionStatement($query,$conditionValues);
		//$sql_count=$this->getAffectedRows();
		$this->_total_items = $totalRows; 
		$this->_total_pages = ceil($this->_total_items/$items_per_page); //And total pages
	 	}
		
		
		function getPage($conditionValues) {
		$query = $this->query;
		$arr = array();

		//Break the result into sections using the LIMIT keyword.
		$from = ($this->page-1) * $this->items_per_page;
		if($from<=0) $from = 0;
		$query .= " LIMIT $from,$this->items_per_page";
		$result = $this->resultSetAll($query,$conditionValues);
		//Get the data from the Database
		//Put all the data into 1 array
		foreach($result as $val) {
			array_push($arr,$val);
		}
		return $arr;
	}
	
	
	function getSqlHandle() {
		$query = $this->query;

		//Break the result into sections using the LIMIT keyword.
		$from = ($this->page-1) * $this->items_per_page;
		if($from<=0) $from = 0;
		$query .= " LIMIT $from,$this->items_per_page";

		//Get the Handle of the Database
		$result = mysql_query($query) or die("MySQL Error : " . mysql_error() . "<br />" . $query);

		return $result;
	}
	
	
	function getLink($dir="next") {
		$dir = strtolower($dir);
		$text = $this->opt_texts; //Get all Options

     if($dir=='previous')
	 $image="Prev";
	 elseif($dir=='next')
	 	 $image="Next";
	 elseif($dir=='first')
	 	 $image="First";
	 elseif($dir=='last')
	 	 $image="Last";
		 $class = "left_btn";

		//We just make the template here. Depending on the value of '$dir' the values to be inserted in 
		//		the place of the replacement texts(like %%PAGE%%) will change.
		$template = '<a id="sqlpager-'.$dir.'" href="'. $this->_page_link .'page=%%PAGE%%" >'.$image.'</a>' ."\n"; //Template
		$replace_these = array("%%PAGE%%","%%CLASS%%","%%TEXT%%"); //Stuff to replace

		if($dir == "previous" || $dir == "back") { //Get the back link
			$back = $this->page-1;
			$back = ($back > 0) ? $back : 1; //Never let the value of $back be lesser than 1(first page)
	
			$with_these = array($back,"pre",$text['back']);

		} elseif($dir == "next" || $dir == "forward") { //Get the forward link
			$next = $this->page+1;
			$next = ($next > $this->_total_pages) ? $this->_total_pages : $next; //Never let the value of $next go beyond the total number of pages
			
			$with_these = array($next,"pre",$text['next']);
 		}
		
		elseif($dir == "first" || $dir == "start") { //Get the first link
			$with_these = array(1,"pre",$text['first']);

		} elseif($dir == "last" || $dir == "end") { //Get the last link.
			$with_these = array($this->_total_pages,"pre",$text['last']);
		}
		$link = str_replace($replace_these,$with_these,$template); //Replace the texts
		
		return $link;
	}
	
	
	function showPager($show_numbers=1, $show_next_previous=1, $show_first_last=0) {
		$page = $this->page; //Current Page
		$max = $this->opt_links_count; //Number of page number links to be displayed
		
		if($this->_total_pages == 1) return; //No need to display pager if only one page is there.

		//Decides which page number should be the first in page number display.
		//	For example, the 'opt_links_count' has the value '5'. This means that 5 page numbers will be displayed.
		//	So if we are on page 1, the displayed numbers will be [1] 2 3 4 5. If we are on page 5, the displayed 
		//	numbers will be 3 4 [5] 6 7. If we are on page 9(And the total number of pages are also 9, the 
		//	displayed numbers will be 5 6 7 8 [9]
		//	For the following comments, we are assuming that 
		//		'opt_links_count' is 5, we are at page '4' in total '9' pages.
		//		So... opt_links_count($max)=5 ; $page = 4; $_total_pages  = 9;
		if($this->opt_links_count) {
			$start_from = $page - round($max/2) + 1; 			// = 4 - round(5/2) + 1 = 4-3+1 = 2
			$start_from = ($this->_total_pages - $start_from < $max) ? $this->_total_pages - $max + 1 : $start_from ; //(9-2) < 9 ? If yes, 9-5+1. | If no, no change.
			$start_from = ($start_from > 1) ? $start_from : 1;	// If it is lesser than 1, make it 1(all paging must start at the '1' page as it is the first page) : = 2
		} else { // If $opt_links_count is 0, show all pages
			$start_from = 1;
			$max = $this->_total_pages;
		}

		if($this->opt_texts['first'] and $show_first_last and $page > 1)
			print $this->getLink("first"); //Link to First Page

		//Print the 'Previous' Link
		if($page > 1 and $show_next_previous)
			print $this->getLink("previous");

		//Initializations
		$i = $start_from;
		$count = 0;

		if($show_numbers) {
			//Display '$opt_links_count' number of links
			while ($count++ < $max) {
				if($i == $page) print " <a class=\"active\">" 
					. $this->opt_texts['current_page_indicator_left'] . $i . $this->opt_texts['current_page_indicator_right']
					. "</a>" . $this->opt_texts['links_seperator'];
			
				else print "<a href=\"$this->_page_link" . "page=$i\"  title='Page $i'>$i</a>" . $this->opt_texts['links_seperator'];
				$i++;

				if($i > $this->_total_pages) break; //If the current page exceeds the total number of pages, get out.
			}
		}

		//Print the 'Next' Link
		if($page < $this->_total_pages and $show_numbers)
			print  "\n" . $this->getLink("next");

		if($page < $this->_total_pages and $this->opt_texts['last'] and $show_first_last) 
			print $this->getLink("last"); //Link to the last page.
	}


function showGoToDropDown() {
		print <<<END
<script language="javascript" type="text/javascript">
function goToPageDropDown(page) {
	document.location.href = "$this->_page_link" + "page="+page;
	return false;
}
</script>

<form name="goto_page_dropdown" onSubmit="return goToPageDropDown(this.page_number.value)">
<select name="page_number" onchange="goToPageDropDown(this.value)" class="form-control page-count">
END;
		for($i=1;$i<=$this->_total_pages;$i++) {
			$sel="";
			if($i == $this->page) $sel = "selected='selected'"; //Make sure the current page is selected.
			print "	<option value='$i'$sel>$i</option>";
		}
		print "</select>\n</form>\n";
	}
	
	function showItemsPerPageChooser() {
		print <<<END
<script language="javascript" type="text/javascript">
function itemsPerPageChooser(number) {
	var link = "$this->_page_link";
	if(link.indexOf('items_per_page=')+1) {
		link = link.replace(/items_per_page=\d+/,'');
	}
	if(!link) link = "";
	document.location.href = link + "items_per_page="+number;
	return false;
}
</script>

<span class="blacktxt">Show</span> <select name="number" onchange="itemsPerPageChooser(this.value)" class="textmenu"> 
END;
		for($i=5; $i<=100; $i+=5) {
			$sel="";
			if($i == $this->items_per_page) $sel = "selected='selected'"; //Make sure the current page is selected.
			print "	<option value='$i'$sel>$i</option>";
		}
		print "</select>\n <span class='blacktxt11'></span>\n</form>\n";
	}
	


	
}


?>
