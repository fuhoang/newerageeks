<?
	/*
	 *This is the main page.
	 *This page includes the configuration file 
	 *the templates, and any content-specific modules.
	 */

	//Require the configuration file before any php code:
	
	ini_set('display_errors',1); 
 	error_reporting(E_ALL);
	
	
	require_once ('controllers/_session.php');
	require_once('controllers/_session_check.php');
	
	require_once('includes/config.php');
	
	require_once('controllers/_post_controller.php');
	require_once('controllers/_post_category.php');
	//require_once('controllers/_search_controller.php');
	
	require_once('controllers/_display_blog_content.php');
	
	//Validate what page to show
	if(isset($_GET['p'])){
	
		$p = $_GET['p'];
		
	}elseif (isset($_POST['p'])){ //FORMS
	
		$p = $_POST['p'];
		
	}else{
	
		$p = NULL;
		
	}
	
	//Determine what page to display:
	switch($p){
		case 'Main':
			
			$page = 'main.php';
			$page_title = 'Main';
			break;
		
			
		case 'post':
			$page = 'post.php';
			$page_title = 'Fu Fu CMS || Blog Form';
			break;
		/*	
		case 'feature':
			require_once('controllers/_post_feature.php');
			$page = 'feature.php';
			$page_title = 'Fu Fu CMS || Feature Form';
			break;
			*/
		
		case 'blog':
			$page = 'blog_display.php';
			$page_title = 'Fu Fu CMS';
			break;

		case 'view-blog':
			$page = 'blog_view.php';
			$page_title = 'Fu Fu CMS';
			break;
		
		case 'comment':
			$page = 'comment.php';
			$page_title = 'Fu Fu CMS';
			break;

		case 'draft':
			$page = 'draft.php';
			$page_title = 'Fu Fu CMS';
			break;
		
		case 'trash':
			$page = 'trash.php';
			$page_title = 'Fu Fu CMS';
			break;
		
		case 'cat':
			//require ('controllers/_post_category.php');	
			$page = 'category.php';
			$page_title = 'Fu Fu CMS';
			break;	
			
		case 'logout':
			$page = 'logout.php';
			$page_title = 'Fu Fu CMS';
			break;
		
			
			
		case 'search':
			require_once('controllers/_search_controller.php');
			
			$page = 'search.php';
			$page_title = 'Search Results';
			break;
			
		case 'login':
			//require_once('controllers/_search_controller.php');
			
			$page = 'login.php';
			$page_title = 'Search Results';
			break;	
		
		
		//Default is to include the main page
		
		default:
			$page = 'main.php';
			$page_title = 'Fu fu CMS';
			break;
		
		
		
	}//End of main switch
	
	//Make sure the file exists.
	if(!file_exists('modules/' . $page)){
		
		$page = 'main.php';
		$page_title = 'Site Home Page';
		
	}
	
	
	//Include the header file
	include_once('includes/header.php');
	
	//include the content-specific module:
	//$page is determined from the above switch.
	include('modules/' . $page);
	
	//Include the footer file to complete the template:
	include_once('includes/footer.php');
	
	






?>
  
