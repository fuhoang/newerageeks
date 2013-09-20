<?
require_once 'classes/Search.php';

//Search post
if(isset($_POST['search_submit'])){
	$searchResult = new Search($_POST, $db);
	$search = $searchResult->search();
	
	//echo $search;
}

?>