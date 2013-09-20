<?php
	ini_set('display_errors',1); 
 	error_reporting(E_ALL);
/*
 *This is the main page
 *This page includes the config file
 *the template and the modules files
*/

// require the configuration file before any php code

require_once('includes/config.php');


// Validate which file to show
	//echo 'index';
	//echo $_GET['p'];
	//echo $_GET['cat'];
	
	
	If(isset($_GET['p'])){
		
		$p = $_GET['p'];	
			
			
	}elseif(isset($_POST['p'])){
		
		$p = $_POST['p'];
	}else{
		$p = null;	
	}

//Determine which page to display

	switch($p){
		
		case 'main':
		require_once('controller/_display_controller.php');	
		$page = 'main.php';
		$page_title = 'New Era Geeks';
		
		break;
		
		case 'blog':
		require_once('controller/_display_controller.php');	
			
		$page = 'blog.php';
		$page_title = 'New Era Geeks';
		
		break;
		
		case 'view_blog':
		require_once('controller/_display_controller.php');	
			
		$page = 'view_blog.php';
		$page_title = 'New Era Geeks';
		
		break;
			
		case 'about':
		
		$page = 'about.php';
		$page_title = 'New Era Geeks || About';
		
		break;	

		case 'news':
		
		$page = 'news.php';
		$page_title = 'New Era Geeks || News';
		
		break;	

		case 'music':
		
		$page = 'music.php';
		$page_title = 'New Era Geeks || Music';
		
		break;

		case 'contact':
		
		$page = 'contact.php';
		$page_title = 'New Era Geeks || Contact';
		
		break;

	

	//Default to the main page	
	default:
		require_once('controller/_display_controller.php');	
		
		$page = 'main.php';
		$page_title = 'New Era Geeks';
		break;

				
		
		
	}// end of switch 


//make sure the file_exists

	if(!file_exists('modules/' . $page)){
		
		$page = 'main.php';
		$page_title = 'New Era Geeks';
	}


//includes the header.php
	require_once('includes/header.php');


//include the specific modules
	include('modules/' . $page );

//includes the footer file to complate the template
	require_once('includes/footer.php');
		

	
?>	
