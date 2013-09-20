<?php
class Navigation{
	
	
	public function __construct($db){
		
			$this->db = $db;
	}
	
	
	public function showNav(){
		
		
		$result = $this->db->dbQuery("SELECT id, category_name, description FROM category");
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}
		
		
	}
	
	
	
}



?>
