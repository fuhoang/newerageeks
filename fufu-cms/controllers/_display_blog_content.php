<?
//echo '_display_blog_content.php';

require_once('classes/Display.php');

$display = new Display($db);

//$blogList = $display->blogList();

//$cat_order = $display->catOrder();

//Get the draftedBlog() to display drafted Blog in list
$draft = $display->draftedBlog();

//
$deletedBlog = $display->deletedBlogList();


$draftCount = $display->countDraft();
//echo $draftCount;

$trashCount = $display->countTrash();
//echo $trashCount;

//Display blog lists sorted categories 
if(isset($_GET['cat'])){

	$cat = $_GET['cat'];
	//echo $cat;
	$blogInCat = $display->blogs_in_cat($cat);
	//echo $getBlog;
}//End if()


if(isset($_GET['blog_id'])){
	
	$blog_id = $_GET['blog_id'];

	$blog_view = $display->getBlog($blog_id);	
	
	$id = $blog_view->id;
	$title = $blog_view->blog_title;
	$content = $blog_view->blog_content;
	//echo $blog_view->id;
}else{
		
	$id = NULL;
	$title = NULL;
	$content = NULL;
	
}

if(isset($_GET['edit_blog'])){
	
	$blog_id = $_GET['edit_blog'];

	$blog_view = $display->getBlog($blog_id);	
	
	$id = $blog_view->id;
	$cat_id = $blog_view->cat_id;
	$category_name = $blog_view->category_name;
	$title = $blog_view->blog_title;
	$content = $blog_view->blog_content;
	$author = $blog_view->author;
	$img = $blog_view->image_url;
	$embed_url = $blog_view->embed_url;
	$keywords = $blog_view->keywords;
	$date_posted = $blog_view->date_posted;
	$display = $blog_view->display;
	


}else{
	
	$id = NULL;
	$cat_id = null;
	$categories = NULL;
	$title = NULL;
	$content = NULL;
	$author = NULL;
	$img = NULL;
	$embed_url = NULL;
	$keywords = NULL;
	$date_posted = NULL;
	$display = NULL;
	
	
}






?>
