<?
require_once 'classes/Display.php';
require_once 'classes/Paginate.php';

		$display = new Display($db);
		
		$total_pages = $display->total_pages();				
	
		$targetpage = "index.php"; 	
		$limit = 10; 
		
			
		$stages = 3;
		if(isset($_GET['page'])){
			$page = mysql_escape_string($_GET['page']);
		}else{
			$page = null;
		}
		
		if($page){
			$start = ($page - 1) * $limit; 
		}else{
			$start = 0;	
		}	
		
	    // Get page data
		$cat_order = $display->catOrder($start, $limit);

		
		// Initial page num setup
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;
							
	 	echo $total_pages.' Results';
	 // pagination
		$paginate = new Paginate();
	
		$page_nav = $paginate->paginate_display($targetpage, $prev, $next, $lastpage, $LastPagem1, $page, $stages);
		echo $page_nav;
?>