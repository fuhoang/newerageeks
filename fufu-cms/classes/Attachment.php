<?
class Attachment{
	private $title;
	private $caption;
	private $position;
	private $id;
	private $page_id;
	private $update_caption;
	
	public function __construct($_POST, Database $db, $_FILES){
		
		$this->db = $db;
		
		$this->id = $_POST['id'];
		$this->update_caption = $_POST['update_caption'];

		
		$this->title = $_POST['title'];
		$this->caption = $_POST['caption'];
		$this->position = $_POST['position'];
		$this->page_id = $_POST['page_choice'];
		
		$this->max_uploads = $_POST['max_uploads'];
		
		for($i = 1; $i <= $this->max_uploads; $i++){
			if(is_uploaded_file($_FILES['picture'.$i]['tmp_name'])){
				$this->picture[$i] = $this->upload_picture($_FILES, "picture".$i);
			}
		}
		
		if($this->id == null){
		
			for($i = 1; $i <= $this->max_uploads; $i++){
			
				$next_picture = $this->picture[$i];
				
				$this->insert_pic($next_picture);
			}
			
		}else{
		
			for($i = 0; $i < sizeof($this->update_caption); $i++){
			
				$title = trim(htmlentities(addslashes($this->title[$i])));
				$caption = trim(htmlentities(addslashes($this->caption[$i])));
				$position = trim(htmlentities(addslashes($this->position[$i])));
				$update_caption = trim(htmlentities(addslashes($this->update_caption[$i])));
				
				$update_q = "UPDATE mynameisfu_attachment SET title='$title',caption='$caption', position='$position' WHERE id = $update_caption";
				$result = $this->db->dbQuery($update_q);
				
				echo $update_q;
			}
		}
		
		
	}//End of __construct()
	
	public function insert_pic($next_picture){
			
			$query = "INSERT INTO mynameisfu_attachment (page_id, picture) VALUES ('$this->page_id', '$next_picture')";
			$result = $this->db->dbQuery($query);
			
			$location = "Location:index.php?p=add-caption&caption=$this->page_id";
			header($location);	
			
			//echo $query;
	}
	
	
	
	private function upload_picture($_FILES, $filename){
	
			//echo($filename);
			
			//check file type
			if ($_FILES[$filename]['type'] == "image/gif" || 
				$_FILES[$filename]['type'] == "image/jpeg" ||
				$_FILES[$filename]['type'] == "image/jpg" ||
				$_FILES[$filename]['type'] == "image/pjpeg"){
				
				//making a directory using the followig format YYYYMMDD
				$dir_name = "attachment/" . date("Ymd");
							
				//checking if the directory already exists otherwise the script will error if it does	
				if(!is_dir($dir_name)){
				
					mkdir($dir_name) or die("could not create directory " . $dir_name);
				}
							
				$i = 1;
				
				$orig_filename = $_FILES[$filename]['name'];
							
				while(file_exists($dir_name . "/" . $_FILES[$filename]['name'])){
				
					$_FILES[$filename]['name'] = $i . "_" . $orig_filename;
				
					$i++;
				}
	
				move_uploaded_file($_FILES[$filename]['tmp_name'],
				$dir_name ."/". $_FILES[$filename]['name']);
				
				$feedback = "attachment/" . date("Ymd") ."/". $_FILES[$filename]['name'];
				return($feedback);					
															
			}
			else
			{
			$feedback['type']= "FILETYPE ERROR: Wrong file type.";
			}	
			
	return($feedback);
	}

}//End of class


?>