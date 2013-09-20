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



<div id="formContainer">
	<form id="form7" name="form7" class="wufoo topLabel page" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']?>">	
				
		<ul>	
				
			<li id="foli3" class="">
				<label class="desc" id="title3" for="Field3">New category</label>
				<div>
					<input id="Field3" name="category_name" type="text" class="field text large" value="" maxlength="255" tabindex="1"/>
				</div>
			</li>
			
			<li id="foli5" class="">	
				<label class="desc" id="title5" for="Field5">Content</label>
				<div>
					<textarea id="editor" name="description" class="field textarea medium" rows="10" cols="50"tabindex="2"></textarea>	
				</div>
			</li>	
			
			
			<li id="foli7" class="">
				<label class="desc" id="title7" for="Field7">Tags<br /></label>
				<div>
					<input id="Field7" name="cat_keywords" type="text" class="field text large"" maxlength="255"tabindex="4"/>
				</div>
			</li>
			<br />
			<ul class="form-btn-ul">
			 
				<li class="buttons ">
					<input id="saveForm" name="post_cat" class="btTxt submit" type="submit" value="POST" />
				</li>	

			</ul>
		</ul>
		</form>
</div><!--container-->
