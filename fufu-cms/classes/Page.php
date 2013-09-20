<?
	class Page{
	
	protected $page_name;
	protected $title;
	protected $url;
	protected $keywords;
	protected $descripton;
	protected $content;
	protected $position;
	protected $picture;
	protected $date_created;
	
	protected $page_id;
	protected $db;
	
		public function __construct($_POST, Database $db, $_FILES){
			
			$this->db =$db;
			$this->page_id = $_POST['page_id'];
			
			$this->page_name = addslashes(trim(htmlentities($_POST['page_name'])));
			$this->title = addslashes(trim(htmlentities($_POST['page_title'])));
			$this->url = addslashes(trim(htmlentities($_POST['url'])));
			$this->keywords = addslashes(trim(htmlentities($_POST['keywords'])));
			$this->description = addslashes(trim(htmlentities($_POST['description'])));
			$this->content = addslashes(trim(htmlentities($_POST['content'])));
			
			$this->date_created = time();
			
			$this->position = addslashes(trim(htmlentities($_POST['position'])));
			
			if(is_uploaded_file($_FILES['picture']['tmp_name'])){
				$this->picture = $this->upload_picture($_FILES);
			}
			
			$this->update();
		}//End of construct()
		
	
		
		public function update(){
		
			if($this->page_id == null){
		
				$query  = "INSERT INTO mynameisfu_pages (page_name, page_title, url, keywords, description,";
				$query .= "content, position, picture, date_created) VALUES ('$this->page_name', ";
				$query .= "'$this->title', '$this->url', '$this->keywords', '$this->description',";
				$query .= "'$this->content', '$this->position', '$this->picture', '$this->date_created')";
				
				$result = $this->db->dbQuery($query);	
				
				//echo $query;
			}else{
				
				$update_q = "UPDATE mynameisfu_pages SET page_name='$this->page_name', page_title='$this->title', url='$this->url',";
				$update_q .= "keywords='$this->keywords', description='$this->description', content='$this->content',"; 
				$update_q .= "position='$this->position', picture='$this->picture'"; 
				$update_q .= "WHERE id = $this->page_id";
			
				$result = $this->db->dbQuery($update_q);	
				
				echo $update_q;
			}
			
		}//End update();
	
		private function upload_picture($_FILES){
			
			if($_FILES['picture']['type'] == "image/gif"  ||
			   $_FILES['picture']['type'] == "image/jpeg" ||
			   $_FILES['picture']['type'] == "image/jpg"  ||
			   $_FILES['picture']['type'] == "image/pjpeg" ){
			   
			   $dir_name = "uploads/" . date("Ymd");
			   
			   if(!is_dir($dir_name)){
			   
			    	mkdir($dir_name) or die("could not create directory " . $dir_name);
			    	
				}
				
				$i = 1;						
				$orig_filename = $_FILES['picture']['name'];
							
				while(file_exists($dir_name . "/" . $_FILES['picture']['name'])){
							
					$_FILES['picture']['name'] = $i . "_" . $orig_filename;
							
					$i++;
				}
				move_uploaded_file($_FILES['picture']['tmp_name'], $dir_name ."/". $_FILES['picture']['name']);
				
				$feedback = "uploads/" . date("Ymd") ."/". $_FILES['picture']['name'];
				return($feedback);			
					
			}else{
				$feedback['type'] = "FILETYPE ERROR: Wrong file type.";
			}
		}//End of upload_picture();	
	
	}//End of class
?>