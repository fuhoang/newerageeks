<?
require_once('classes/Display.php');
$display = new Display($db);

//get all the blog for the main page
$blogOrderList = $display->blogOrderList();

$featureOrderList = $display->featureOrderList();

if(isset($_GET['cat'])){
			
		$cat = $_GET['cat'];
		$blogInCat = $display->blogInCat($cat);
		//echo $category_name;
		
		$cat_title = $display->blogCatTitle($cat);
		$cat_name_title = $cat_title->category_name;
		
}else{
	$cat_name_title = null;
	
}

if(isset($_GET['blogId'])){
	$blogId = $_GET['blogId'];
	$getBlog = $display->getBlog($blogId);
	
	$id = $getBlog -> id;
	$blog_title = $getBlog->blog_title;
	$blog_content = $getBlog->blog_content;
	$image_url = $getBlog->image_url;
	$author = $getBlog->author;
	$category_name = $getBlog->category_name;
	$date_posted = $getBlog->date_posted;
	
	
}else{
	$blog_title = null;
	$blog_content = null;
	$image_url = NULL;
	$author = NULL;
	$category_name = NULL;
	$date_posted = NULL;
	
	
}

?>
