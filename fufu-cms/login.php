<?php
ini_set('display_errors',1); 
 	error_reporting(E_ALL);

require_once ('controllers/_session.php');
//require_once('controllers/_session_check.php');


require_once 'includes/config.php';
require_once 'classes/Login.php';

//$login = new Login($db);

if(isset($_POST['user_login'])){
	$login = new Login($_POST, $db);
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
	
			
			<title>New Era Geeks || Admin Login</title>
			<meta name="description" content="fufu cms"/> 		
			<meta name="keywords" content="fufu, cms" /> 	
		
			<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
			
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="" /> 
	
			
		</head>

<body>

<div id="wrapper">

	<div id="header">
		<a href="index.php?p=main"><div id="logo"><h1>New Era Geeks</h1></div></a>
			
	</div>	
	
	<div id="content">
		
		<form name="form7" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']?>">	
				
		<ul>	
			<li>
				<label>Username</label>
				<div>
					<input name="username" type="text" class="field text large" maxlength="255" tabindex="1"/>
				</div>
			</li>
			
			<li>
				<label>Password</label>
				<div>
					<input name="password" type="password"" class="field text large" maxlength="255" tabindex="2"/>
				</div>
			</li>
		
				<li class="buttons ">		
					<input id="saveForm" name="user_login" class="btTxt submit" type="submit" value="Login" />
				</li>
			</ul>
		</ul>
		</form>
	</div>	
	
	
	
	
		
	<div id="footer">
		<p>2011 Copyright © New Era Geeks | Design and Developed by <a href="http://www.mynameisfu.co.uk" target="_blank">MyNameIsFu</a></p>
	</div><!--footer-->


</div><!-- end of wrapper-->


</body>