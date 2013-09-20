<?
	require_once 'classes/Navigation.php';
	
	$topNav = new Navigation($db);
	
	$nav = $topNav->showNav();
	
	//echo $nav;
?>


	
<div id="middlebar">
	<ul>
		<li><a href="index.php?p=main">Main</a></li> 
		<li><a href="index.php?p=logout">Sign Out</a></li>
		<li><a href="index.php?p=cat">Add Category</a></li> ||
<?

if(is_array($nav)){
	foreach($nav as $li){
		//echo $li->category_name;
		
?>	

		<li><a href="index.php?p=blog&cat=<?=$li->id?>"><?=$li->category_name?></a></li>
		
<?		
		
	}
}
?>
				
	</ul>
</div>

