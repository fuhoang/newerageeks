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
				<label class="desc" id="title3" for="Field3">Choose a Category</label>
				<select name="category">
					<option value="0" selected>Pick a category</option>
					
				<?
					
					if(is_array($nav)){
						foreach($nav as $li){
							//echo $li->category_name;
				
				?>	
				
				<?
							if($cat_id == $li->id){
				?>			
					
							<option value="<?=$cat_id?>" selected><?=$li->category_name?></option>
				<?
							}elseif($cat_id != $li->id){
				?>
							
							<option value="<?=$li->id?>"><?=$li->category_name?></option>
					

				<?
							}
					
						}
					}				
				?>
				
				
				
				
				</select>
			
			</li>
				
			<li id="foli3" class="">
				<label class="desc" id="title3" for="Field3">Title</label>
				<div>
					<input id="Field3" name="blog_title" type="text" class="field text large" value="<?=$title?>" maxlength="255" tabindex="1"/>
				</div>
			</li>
			
			<li id="foli5" class="">	
				<label class="desc" id="title5" for="Field5">Content</label>
				<div>
					<textarea id="editor" name="blog_content" class="field textarea medium" rows="10" cols="50" tabindex="2"><?=$content?></textarea>	
				</div>
			</li>	
			
			
			<li id="foli6" class="">
				<label class="desc" id="title6" for="Field6">Author's name</label>
				<div>
					<input id="Field6" name="author" type="text" class="field text large" value="<?=$author?>" maxlength="255" tabindex="3"/>
				</div>
			</li>
			
			<li id="foli6" class="">
				<label class="desc" id="title6" for="Field6">Embeded URL's</label>
				<div>
					<input id="Field6" name="embed_url" type="text" class="field text large" value="<?=$embed_url?>" maxlength="255" tabindex="3"/>
				</div>
			</li>
			
			<li id="foli7" class="">
				<label class="desc" id="title7" for="Field7">Tags<br /></label>
				<div>
					<input id="Field7" name="keywords" type="text" class="field text large" value="<?=$keywords?>" maxlength="255" tabindex="4"/>
				</div>
			</li>
			
			
			<li id="foli8" class="">
				<label class="desc" id="title8" for="Field8">Upload Picture</label>
				<div>
					<input id="Field8" name="image_url" type="file" class="field text large" value="" maxlength="255" tabindex="7"/>
				</div>
			</li>
			<br />
			<img src="<?=$img?>" width="200" height="170" />
			<input type="hidden" name="image_url" value="<?=$img?>" />
			<br />
			<ul class="form-btn-ul">
			 
				<li class="buttons ">
					<input type="hidden" name="blog_id" value="<?=$id?>" />
					<input id="saveForm" name="submit_save_blog" class="btTxt submit" type="submit" value="Save and view" />
				</li>	

				<li class="buttons ">
					>
					<input id="saveForm" name="submit_blog" class="btTxt submit" type="submit" value="Post and view" />
				</li>

				<li class="buttons ">
					
					<input id="saveForm" name="submit_blog" class="btTxt submit" type="submit" value="Discard" />
				</li>
			</ul>
		</ul>
		</form>
</div><!--container-->
