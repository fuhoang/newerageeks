<?
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
		
		
		
		//GET blog as a list unsorted
		public function blogList(){
			$result = $this->db->dbQuery("SELECT * FROM blog_table 
											WHERE display != 3 ORDER BY id DESC");
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}
		}
		
		
		public function catOrder($start, $limit){
				
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table
										WHERE category.id = blog_table.cat_id
										AND blog_table.display != 3
										ORDER BY blog_table.id DESC LIMIT $start, $limit");
			
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}	
			
		}
		
		public function total_pages(){
			$result = $this->db->dbQuery("SELECT COUNT(*) as num FROM category, blog_table 
											WHERE category.id = blog_table.cat_id
											AND display != 3");
			if($this->db->getRow() > 0){
				
				$total_pages = $this->db->getData();
				
				return($total_pages['num']);
			}
		}
		

	
		//Get blogs and sorted in categories	
		public function blogs_in_cat($id){
			
			//Join category table and blog_table
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table WHERE 
												blog_table.cat_id = $id AND category.id = $id
												ORDER BY blog_table.id DESC" );
			
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}
		}

		
		//GET blog according to the indiviual id		
		public function getBlog($id){
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table 
											WHERE category.id = blog_table.cat_id 
											AND blog_table.id = $id ");
			
			if($this->db->getRow()){
				$blog = $this->db->getObject();
				return($blog);
			}
		}
		
		
		
		//function gets all the draft blog and display in a list
		public function draftedBlog(){
			//Join category table and blog_table
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table 
										WHERE category.id = blog_table.cat_id AND
										blog_table.display = 2 
										ORDER BY blog_table.id DESC");
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}
			
			
		}
		

		//Function get all the deleted blog to display in the trash
		public function deletedBlogList(){
			$result = $this->db->dbQuery("SELECT * FROM category, blog_table 
											WHERE category.id = blog_table.cat_id
											AND display = 3 ORDER BY blog_table.id DESC");
			
			if($this->db->getRow()){
				
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);
			}
		}	
		
				
		public function countComments($id){
			//echo("SELECT COUNT(id) AS comments FROM mynameisfu_comments WHERE blog_id =$id");
			$result = $this->db->dbQuery("SELECT COUNT(id) AS comments FROM mynameisfu_comments WHERE blog_id =$id");
			if($this->db->getRow() > 0){
				$countComment = $this->db->getObject();
				
				return($countComment->comments);
			}
			
		}


		//Get number count of how many blog is saved as draft
		public function countDraft(){
			//echo("SELECT COUNT(id) AS comments FROM mynameisfu_comments WHERE blog_id =$id");
			$result = $this->db->dbQuery("SELECT COUNT(blog_table.id) AS drafts 
									FROM category, blog_table WHERE category.id = blog_table.cat_id 
									AND display = 2");
			if($this->db->getRow() > 0){
				$countDrafts = $this->db->getObject();
				
				return($countDrafts->drafts);
			}
			
		}
		
		//Get number count of how many blog is saved as draft
		public function countTrash(){
			//echo("SELECT COUNT(id) AS comments FROM mynameisfu_comments WHERE blog_id =$id");
			$result = $this->db->dbQuery("SELECT COUNT(blog_table.id) AS trash 
										FROM category, blog_table 
										WHERE category.id = blog_table.cat_id
										AND display = 3");
			if($this->db->getRow() > 0){
				$countTrash = $this->db->getObject();
				
				return($countTrash->trash);
			}
			
		}
		
		public function blogComments($id){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_comments WHERE blog_id = $id ORDER BY date_created ASC ");
			if($this->db->getRow() > 0){
				while($cmt = $this->db->getObject()){
					$comments[] = $cmt;
				}
				
				return($comments);
			}
		}
		
		public function newComments($id){
			$result = $this->db->dbQuery("SELECT COUNT(id) AS new_comments FROM mynameisfu_comments  WHERE blog_id = $id AND unread = '1'");
			if($this->db->getRow() > 0){
				
				$newComments = $this->db->getObject();
				
				return($newComments->new_comments);
			}
		
		}

		public function getCaption($id){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_attachment WHERE mynameisfu_attachment.page_id = $id ORDER BY position ASC" );		
			if($this->db->getRow() > 0){
			
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				
				return($list);
			}
		
		}
		
		
	
		/////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////
		////////////////////////Album display////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////
		
		public function getMenuAlbum(){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_album ORDER BY id DESC");
			
			if($this->db->getRow() > 0){
			
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				return($list);		
			}
		}
		
		public function getAlbum($id){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_album WHERE id = $id");
			
			if($this->db->getRow() > 0){
				$album = $this->db->getObject();
				
				return($album);		
			}
		}	
		
		public function getPicture($id){
			$result = $this->db->dbQuery("SELECT * FROM mynameisfu_pictures WHERE mynameisfu_pictures.album_id = $id" );
			
			if($this->db->getRow() > 0){
			
				while($li = $this->db->getObject()){
					$list[] = $li;
				}
				
				return($list);
			}
		
		}
		
	
	
	}//End of class

?>
