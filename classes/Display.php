<?php

class Display{
		
	protected $db;
		
		public function __construct(Database $db){
			$this->db = $db;
		}
		
		public function displayPage($id){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_pages WHERE id = $id");
			
			if($this->db->getRow()>0){
				$pages = $this->db->getObject();
				return($pages);
			}		
		}
		
		public function blogOrderList(){
				
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table
										WHERE category.id = blog_table.cat_id
										AND blog_table.display != 3 AND cat_id != 4
										ORDER BY blog_table.id DESC");
			
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}	
			
		}
		
				
		public function blogInCat($id){			
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table
										WHERE blog_table.cat_id = $id
										AND category.id = $id
										AND blog_table.display != 3
										ORDER BY blog_table.id DESC"); 
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}	
			
		}
		
		
		public function blogCatTitle($id){			
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table
										WHERE blog_table.cat_id = $id
										AND category.id = $id
										AND blog_table.display != 3
										ORDER BY blog_table.id DESC"); 
			
			if($this->db->getRow()){
				
				$list = $this->db->getObject();
				return($list);
			}	
			
		}
		
		public function getBlog($id){
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table 
											WHERE category.id = blog_table.cat_id 
											AND blog_table.id = $id ");
			
			if($this->db->getRow()){
				$blog = $this->db->getObject();
				return($blog);
			}
		}
		
		public function featureOrderList(){
				
			$result = $this->db->dbQuery("SELECT * FROM blog_table
										WHERE cat_id = 4 AND blog_table.display != 3
										ORDER BY id DESC LIMIT 4");
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}	
			
		}
}
?>
