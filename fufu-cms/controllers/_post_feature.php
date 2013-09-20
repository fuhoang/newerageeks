<?
require_once('classes/Feature.php');

if(isset($_POST['submit_feature'])){
	$feature = new Feature($_POST, $db, $_FILES);
}



?>