<?php
	
	//This page begins the HTML header for the site
	
	//check for a $page_title value:
	if(!isset($page_title)) $page_title = 'Default Page Title';
	
?>
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
	
			
			<title><?php echo $page_title; ?></title>
			<meta name="description" content="fufu cms"/> 		
			<meta name="keywords" content="fufu, cms" /> 	
		
			<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?=$PATH_TO_CSS?>style.css" /> 
			<link rel="stylesheet" type="text/css" href="<?=$PATH_TO_CSS?>form.css" />
			<link rel="stylesheet" type="text/css" href="<?=$PATH_TO_CSS?>structure.css" />
			

			
			<!-- Javascripts -->
			<script language="JavaScript" type="text/javascript" src="scripts/uploads.js"></script>
			<script language="JavaScript" type="text/javascript" src="scripts/gallery_uploads.js"></script>
			<script language="JavaScript" type="text/javascript" src="scripts/show_layer.js"></script>
			
 			<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js" ></script>
			<script type="text/javascript">
				tinyMCE.init({
					// General options
					mode : "textareas",
					theme : "advanced",
					plugins : "safari,style,layer,save,advlink,iespell,inlinepopups,searchreplace,print,noneditable,visualchars,nonbreaking,wordcount",
			
					// Theme options
					theme_advanced_buttons1 : "bold,italic,underline|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,anchor,cleanup,code,|,bullist,numlist,|,undo,redo,|,forecolor,backcolor",
					theme_advanced_buttons2 : 
			"search,replace,outdent,indent,blockquote",
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					theme_advanced_statusbar_location : "bottom",
					theme_advanced_resizing : true,
			
				});</script>
		</head>

<body>


  <div id="wrapper">
	  <div id="header">
	  
		  <div id="logo">
		  	<a href="index.php?p=main">FuFu CMS</a>
	      </div>
	  	    
<?
	require_once('includes/main_nav.php');
?>


	   </div>
	   
	   <div class="input-search">
			
			<form method="post" action="index.php?p=search" class="subscribe_form" enctype="multipart/form-data" >
				<label for="search"></label>
				<input id="searchfield" class="search-input" type="text" value="" name="search_keyword"/>
		    
				<input type="submit" name="search_submit" value="Search" class="search-btn" />
			</form>
	
		</div>
	   
	   
	   
	   <?
	   		if(isset($_GET['blog_id'])){
	   
	   ?>
	   
	   
	   <div id="admin-nav">
	   		<ul>
	   			<li><a href="index.php?p=post&edit_blog=<?=$blog_view->id?>">EDIT</a></li>
	   			<li><a href="index.php?p=main&delete_blog=<?=$blog_view->id?>">DELETE</a></li>
	   			
	   		<?
	   			if($blog_view->display == 2){
	   		?>
	   			<li><a href="index.php?p=main&update_status=<?=$blog_view->id?>">POST</a></li>
	   			
	   		<?
				}
	   		?>
	   		</ul>
	   	
	   </div>
	   
	   <?
	   		}
	   ?>
	   
	   
		
	   
	
 		 <div id="content">
          
               
          
				<!-- END OF HEADER.PHP -->




			
			
		
