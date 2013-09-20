 <?php
class Login{

private $myusername = "username";
private $mypassword = "password";
private $db;

	public function __construct($_POST, Database $db){
		define('HASH_PASSWORD_KEY', 'Ch1n4m4n1984');
	
		if(trim($_POST['username']) !== ''){
		
		$this->myusername = $_POST['username'];
		
		}
		
		if(trim($_POST['password']) !== ''){
		
		$this->mypassword = $_POST['password'];
		
		}
		
		$this->myusername = stripslashes($this->myusername);
		$this->mypassword = stripslashes($this->mypassword);
		$this->myusername = mysql_real_escape_string($this->myusername);
		$this->mypassword = mysql_real_escape_string($this->mypassword);
		
		//echo hash('sha256', $this->mypassword);
		
		$this->mypassword =  $this->create('sha256', $this->mypassword, HASH_PASSWORD_KEY); 
		//echo $this->password;
		
		$this->db = $db;
		$this->match_login();
	
	}//End of construct
	
	public function match_login(){
	
		$query = "SELECT * FROM users WHERE username='$this->myusername' and password='$this->mypassword'";
		$result=mysql_query($query) or die("Could not open select from tabel" . mysql_error());
		
		//echo $query;
		
		
		if (mysql_num_rows($result) >0){
				
				$row = mysql_fetch_array ($result);
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row ['password'];
				
				//echo $_SESSION['username'];
		
				header("location:index.php?p=main");
				
		}else{
		
		$errors['Wrong'] = "Wrong Username or Password";
		
		}

	
	}//End of match_details()
	
	
	public function create($algo, $data, $salt){
		
		
		 $context = hash_init($algo, HASH_HMAC, $salt);
		 hash_update($context, $data);
		 
		 return hash_final($context);
	}

}//End of Class

?>