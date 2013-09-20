<?
//echo 'config.php';
require_once('classes/Blog.php');


//blog controller
if(isset($_POST['submit_blog'])){
	$blog = new Blog($_POST, $db, $_FILES);
	
}elseif(isset($_POST['submit_save_blog'])){
	$blog = new Blog($_POST, $db, $_FILES);
}




// 3 trash display
//This will update to display the blog into the trash
if(isset($_GET['delete_blog'])){
	
	$deleted_blog = $_GET['delete_blog'];
	$update_q = "UPDATE blog_table SET display = '3' WHERE id = '$deleted_blog' ";
	$result = $db->dbQuery($update_q);		
	//echo $update_q;	
}


// 1 public display
if(isset($_GET['update_status'])){
	
	$update_public = $_GET['update_status'];
	$update_q = "UPDATE blog_table SET display = '1' WHERE id = '$update_public'";
	$result = $db->dbQuery($update_q);
	
}



	
?>
