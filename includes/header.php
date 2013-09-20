<?php
	
	//This page begins the HTML header for the site
	
	//check for a $page_title value:
	if(!isset($page_title)) $page_title = 'Default Page Title';
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title><?php 
			if(isset($_GET['blogId'])){
					echo $page_title . ' || '.$blog_title;
				}else{
					echo $page_title;
				}?></title>
	<meta name="keywords" content="new era geeks, lifestyle, music, fashion"/>
	<meta name="description" content="New era geeks"/>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="http://localhost/newerageeks/css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/newerageeks/css/bjqs.css" />

	
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="script/bjqs-1.3.min.js"></script>
</head>

<body>

<div id="wrapper">

	<div id="header">
		<a href="http://localhost/newerageeks/main"><div id="logo"><h1>New Era Geeks</h1></div></a>
		
		<div id="follow">			
				<ul class="follow-us">
					<li class="text">Follow us on</li>
					<li><a href="#"><img src="http://localhost/newerageeks/imgs/socialize-twitter.png"></a></li>
					<li><a href="#"><img src="http://localhost/newerageeks/imgs/socialize-facebook.png"></a></li>
					<li><a href="#"><img src="http://localhost/newerageeks/imgs/tumblr.png"></a></li>
					<li><a href="#"><img src="http://localhost/newerageeks/imgs/google_plus.png"></a></li>
				</ul>			
		</div>
	<?
		require_once 'includes/nav.php';
	?>		
	</div>
	
	



	<!--end of header-->
