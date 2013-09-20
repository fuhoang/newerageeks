<?php
	
	/*
	 *This is the main content modulex	
	 *This page is included by index.php
	 */
	 
	 
	 //Redirect if this page was accessed directly:
	 if(!defined('BASE_URL')){
	 	
	 	$url = BASE_URL . 'index.php';
	 	header("Location: $url");
	 	exit;
	 }//END OF DEFINED() IF.

?>
<?
echo $_SESSION['username'];

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
	<table id="rounded-corner" summary="2007 Major IT Companies' Profit">	
	    <thead>
	    	<tr>
	        	<th scope="col" class="rounded-company">Recent blogs</th>
			<th scope="col" class="rounded-company">Category</th>
	        	<th scope="col" class="rounded-q3">Date</th>
	        	<th>Status</th>
	            <th scope="col" class="rounded-q2">Comment(s)</th>
	            <th></th>
	           
	
	        </tr>
	    </thead>
	        <tfoot>
	    	<tr>
	    		<td></td>
	    		<td></td>
	        	<td colspan="4" class="rounded-foot-left">&nbsp;</td>
	        	
	        </tr>
	    </tfoot>	
	    <tbody>
	 
<?
		//echo mktime();
			
		//echo time();
		require_once 'includes/paginate_nav.php';
		
		if(is_array($cat_order)){
	  		foreach($cat_order as $li){

?>

	    	<tr>
	        	<td><a href="index.php?p=view-blog&blog_id=<?=$li->id?>"><?=$li->blog_title?></a></p></td>  
			<td><?=$li->category_name?></td> 
	            	<td><?php
			
			//$today_date = time();
			
			//echo date("d m y", $today_date);
				echo date("d M Y", $li->date_posted);	
			

			?></td>
			<?php
				if($li->display == 1){
			?>
					<td>Public</td>
	         <?
				}elseif($li->display == 2){
	         ?>
	         		<td>Private</td>
	         <?
	         	}
			 ?>
			    	<td><span class="red">(6)</span></td>
	            	<td><a href="index.php?p=main&delete_blog=<?=$li->id?>">Trash</a></td>
	        </tr>	

<?
			}
		}
?>
		
	    </tbody>
	</table>
</div>

