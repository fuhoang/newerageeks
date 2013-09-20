<?php
	
	/*
	 *This is the main content module
	 *This page is included by index.php
	 */
	 
	 
	 //Redirect if this page was accessed directly:
	 if(!defined('BASE_URL')){
	 	
	 	$url = BASE_URL . 'index.php';
	 	header("Location: $url");
	 	exit;
	 }//END OF DEFINED() IF.

?>
<div id="side-nav">
	<ul>
		<li><a href="index.php?p=post">Compose</a></li>
		<li><a href="index.php?p=draft">Drafts ( <?=$draftCount?> )</a></li>
		<li><a href="index.php?p=comment">Comments</a></li>
		<li><a href="index.php?p=trash">Trash ( <?=$trashCount?> )</a></li>
	</ul>

</div>

 	

<div id="tableContainer">
	
	<div id="blog_container">
		
		<h2><?=$blog_view->blog_title;?></h2>
		
		Time posted:<?php
		$date_p = $blog_view->date_posted;
		
		$date_created = date('D d M Y', $date_p);
		
		echo $date_created;
		
		?>
		<br/>
		Posted by: <?=$blog_view->author?>
		<br/>
		
		<?
			if($blog_view->display == 2){
		?>
		Saved in Draft
		
		<?
			}elseif($blog_view->display == 1){
		?>
		Status: Public
		
		<?
		}		
		?>
		<br />
		
		
		<img src="<?=$blog_view->image_url?>" alt="<?=$blog_view->blog_title?>" /> 
	
		<p><?=$blog_view->blog_content?></p>
	
	</div>	
</div>

