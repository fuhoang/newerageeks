<?php
	class Database
	{
	
		private $server = "server";
		private $username = "username";
		private $password = "password";
		private $database = "database";
		private $result;
		public $connection;
		private $db;
		
		public function __construct($server, $username, $password, $database){
			
			$this->server = $server;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
			
			$this->connection = mysql_connect($this->server, $this->username, $this->password, $this->database);
			
			
			$this->dbSelect();
		
		}//End of __construct();
			
		public function dbSelect()
		{
			$this->db = mysql_select_db($this->database, $this->connection);
		
		}
		
		public function dbQuery($query)
		{
			$this->result = mysql_query($query);
			return($this->result);
			
		}
		
		//RESULTS
	
		public function getRow()
		{
			return mysql_num_rows($this->result);
		}
		
		public function getData()
		{
			return mysql_fetch_array($this->result);
		}
				
		public function getAssoc(){
				return(mysql_fetch_assoc($this->result));
		}
		
		public function getObject(){
				return(mysql_fetch_object($this->result));
		}
	
		public function getNumeric(){
				return(mysql_fetch_row($this->result));
		}

		public function escapeString(){
				return(mysql_real_escape_string($this->result));	
		}
		
		public function getInsertID(){
			return(mysql_insert_id());
		}
	}//End of Database Class;
?>
