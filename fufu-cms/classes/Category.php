<?php

class Category{
	
	private $category_name;
	private $description;
	private $cat_keywords;
	private $db;
	private $id;
	
	
	public function __construct($_POST, Database $db, $_FILES){
		
		$this->db = $db;
		
		if($_POST['category_name']){
			$this->category_name = $_POST['category_name'];
			
		}
		
		if($_POST['description']) {
			$this->description = $_POST['description'];
		}
		
		if($_POST['cat_keywords']) {
			$this->cat_keyowrds = $_POST['cat_keywords'];
		}
		
		$this->insertCat();
		
		
	}//end __contruct();
	
	public function insertCat(){
				
			$query = "INSERT INTO category (category_name, description, cat_keywords ) VALUES ";
			$query.= "('$this->category_name', '$this->description', '$this->cat_keywords')";
			
			$result = $this->db->dbQuery($query); 	
			echo $query;

	}
	
	
	
}

?>
