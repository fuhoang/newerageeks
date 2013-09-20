<?php
require_once('classes/Category.php');

if(isset($_POST['post_cat'])){
	$cat = new Category($_POST, $db, $_FILES);
	echo 'hello';	
}

?>
