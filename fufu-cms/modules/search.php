<?php
	
	/*
	 *This is the search content module
	 *This Page is included by index.php
	 *This page expext to receive $_GET['terms'].
	 */

	
	//Redirect if this page was accessed directly:

 
	foreach($search as $li){
					
		echo "<p>" . $li->blog_title. "</p>";
		
	
	}
?>		