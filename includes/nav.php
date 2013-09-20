<?php
	require_once 'classes/Navigation.php';
	
	$topNav = new Navigation($db);
	
	$nav = $topNav->showNav();

?>

<div id="main-nav">
	
	<?
		if(is_array($nav)){
			foreach($nav as $li){
	
	?>
			<li><a href="http://localhost/newerageeks/blog/<?=$li->id?>"><?=$li->category_name?></a></li>
	<?
		
			}	
		}
			
	?>		
										
		</div>	
