<?
	class Results{
	
		public function __construct(){
			
		}//End of __construct();
		
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
		
		public function getInsertID(){
			return(mysql_insert_id());
		}

	}

?>