<?
	Class Search{
		
		public $search_keyword;
		
		public function __construct($_POST, Database $db){
			
			$this->db = $db;
		}
		
		
		public function search(){
				
				if(trim($_POST['search_keyword'])){
					$this->search_keyword = $_POST['search_keyword'];
				}
										
				$result = $this->db->dbQuery("SELECT * FROM blog_table 
												WHERE keywords 
												LIKE '%$this->search_keyword%'");
				
				
				if($this->db->getRow()){
				
					while($li = $this->db->getObject()){
						$list[] = $li;
					}
					return($list);
				}
		}	
	}

?>