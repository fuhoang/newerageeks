<?php
class Album{

private $album_name = "album_name";
private $album_id;
private $images;
private $caption = "caption";
private $title = "title";
private $date = "date";
private $db;
private $max_uploads;
private $caption_id;
private $update_caption;

	
	public function __construct($_POST, Database $db){
		
		$this->caption_id = $_POST['caption_id'];
		$this->title = $_POST['title'];
		$this->caption = $_POST['caption'];
		$this->update_caption = $_POST['update_caption'];
		
	
		if($_POST['album_name'] !== ''){
		
			$this->album_name = str_replace(" ", "-", trim(htmlentities($_POST['album_name'])));
		
		}else{
			$errors['album_name'] = "Incorrect Album Name.";		
		}
		
				
		$this->album_id = trim(htmlentities($_POST['choice']));
		
		$this->max_uploads = $_POST['max_uploads'];
			
		for($i = 1; $i <= $this->max_uploads; $i++){
			if(is_uploaded_file($_FILES['image'.$i]['tmp_name'])){
				$this->images[$i] = $this->upload_picture($_FILES, "image".$i);
			}
		}
		
		$this->date_created = time();
	
		$this->db = $db;
		

		
		if($this->caption_id == null){
			
			if($this->album_id == 0){
				
				//insert new album and get album id
				$new_album = "INSERT INTO mynameisfu_album(album_name, date_created)"; 
				$new_album .="VALUES('$this->album_name', '$this->date_created')";
				$new_album_insert = $this->db->dbQuery($new_album);
				
				$this->album_id = mysql_insert_id();
		
			}
				
			for($i = 1; $i <= $this->max_uploads; $i++){
			
				$next_image = $this->images[$i];
				
				$this->post_album($next_image);
			}
			
		}else{
			for($i = 0; $i < sizeof($this->update_caption); $i++){
				
				$title = trim(htmlentities(addslashes($this->title[$i])));
				$caption = trim(htmlentities(addslashes($this->caption[$i])));
				$update_caption = trim(htmlentities(addslashes($this->update_caption[$i])));
				
				$update_q ="UPDATE mynameisfu_pictures SET title='$title',";
				$update_q .="caption='$caption' WHERE id = $update_caption";
		
				$result = $this->db->dbQuery($update_q);
		
				echo $update_q;
			}
		
		}
	}//End of construct();
	
	private function post_album($next_image){
		
		$add_picture = "INSERT INTO mynameisfu_pictures(album_id, image) VALUES('$this->album_id', '$next_image')";				
		$result = $this->db->dbQuery($add_picture);
			
		$location = "Location:index.php?p=gallery-caption&album=$this->album_id";
		header($location);		
	}
	

	
	private function upload_picture($_FILES, $filename){
	
			//echo($filename);
			
			//check file type
			if ($_FILES[$filename]['type'] == "image/gif" || 
				$_FILES[$filename]['type'] == "image/jpeg" ||
				$_FILES[$filename]['type'] == "image/jpg" ||
				$_FILES[$filename]['type'] == "image/pjpeg"){
				
				//making a directory using the followig format YYYYMMDD
				$dir_name = "albums/" . date("Ymd");
							
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
				
				$feedback = "albums/" . date("Ymd") ."/". $_FILES[$filename]['name'];
				return($feedback);					
															
			}
			else
			{
			$feedback['type']= "FILETYPE ERROR: Wrong file type.";
			}	
			
	return($feedback);
	}

}//End of Album Class

?>