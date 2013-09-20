<?php
//Establish database connection
require_once('classes/Database.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'chinaman');
define('DB_DATABASE', 'new_era_geeks');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

//echo 'hello';





$root = $_SERVER['DOCUMENT_ROOT'];

$PATH_TO_CSS = "css/";
$PATH_TO_IMGS = "imgs/";

$PATH_TO_INCLUDES="$root/mediasyntax/includes/";

$SITE_URL="http://sadpandadesign.com/";
$SITE_NAME= "Media Syntax";

/* File name: config.php
 * Created by Fu Hoang
 * 
 *
 *Configuration file does the following things
 * 
 *
 */

#*****************************#
#**********SETTING************#

	//Errors are emailed here.
		
	//$contact_email = "fuhoang@hotmail.com";
	
	
	
	//determine whether we're working on a local server
	//or on the real server:
	if (stristr($_SERVER['HTTP_HOST'], 'local')||(substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')){
	
	 
		$local = TRUE;
		
	} else {
		
		$local = FALSE;
	}





	//Determine location of files and the URL of the site:
	//Allow for development on different servers
	if($local){
		
		//Always debug when running locally:
		$debug = TRUE;
		
		//Define the constants
		
		define('BASE_URI', '/PATH/TO/LIVE/HTML/FOLDER/');
		define('BASE_URL', 'http://localhost/directory/');
		define('DB', '/path/to/mysql.php');
	
	}else{
	
		define('BASE_URI', '/PATH/TO/LIVE/HTML/FOLDER/');
		define('BASE_URL', 'http://www.sadpandadesign.com/mediasyntax');
		define('DB', '/path/to/mysql.php');
	
	
	}
	
/*
 *
 *Most important setting
 *The $debug variable is used to set error management.
 *To debug a specific page, add this to the index.php page:
 *
 
 	if($p == 'thismodule')$debug = TRUE;
 	require_once('/include/config.php');
 	
 	* To Debug the entire site, do
 	
 	$debug = TRUE;
 	
 	* before this next conditional.
 	*/
 	
 	
 	
 	
 	//Assume debugging is off.
 	if(!isset($debug)){
 		$debug = FALSE;
 	}

	
	#************SETTING************#
	#*******************************#
	
	
	
	
	
	
	
	
	#*******************************************#
	#*************ERROR MANAGEMENT**************#
	
	//Create the error handler.
	function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
	
	
		global $debug, $contact_email;
		
		//Build the error message
		$message = "An error occurred in script '$e_file' on line $e_line: \n<br/>$e_message\n<br/> ";
		
		//Add the date and time.
		$message .= "Date/Time:".date('n-j-Y H:i:s'). "\n<br/>";
		
		//Append $e_vars to the $message.
		$message .= "<pre>" . print_r($e_vars, 1) . "</pre>\n<br/>";
		
		if($debug){//show thw error
			
			echo'<p class="error">' .$message. '</p>';
		
		}else{
		
			//Log the error:
			error_log($message, 1, $contact_email); //send email
			
			//Only print an error message if the error isn't a notice or strict.
			if(($e_number != E_NOTICE)&&($e_number < 2048)){
			
				echo'<p class = "error"> A system error occurred. We apologize for the inconvenience';
				
			
			}
			
		}//End Of $debug IF
	
	}//End of myerror_handler() definition.
	
	//use my error handler:
	set_error_handler('my_error_handler');
	
	
?>
