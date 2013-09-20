<?
class Blog{

	private $blog_title;
	private $blog_content;
	private $embed_url;
	private $keywords;
	private $image_url;
	private $date_posted;
	
	private $db;
	private $id;
	private $cat_id;
	
	public function __construct($_POST, Database $db, $_FILES){
	
		$this->db = $db;	
		
		

		$this->id = $_POST['blog_id'];
		
		//1 is to view the blog
		//2 is to hide the blog 
		
		if(isset($_POST['submit_blog'])){
				
			$this->display = 1;
			
		}elseif(isset($_POST['submit_save_blog'])){
				
			$this->display = 2;
			
		}

		if($_POST['category']) {
			$this->cat_id = $_POST['category'];
		}
			
		if(trim($_POST['blog_title']) != ''){			
			$this->blog_title = htmlentities($_POST['blog_title']);		
		}else{		
			$this->errors['blog_title'] = "You need to enter a title name";			
		}
		
		$this->blog_content =trim($_POST['blog_content']);		
	
		
		if(trim($_POST['embed_url']) != ''){			
			$this->embed_url = htmlentities($_POST['embed_url']);		
		}else{		
			$this->errors['embed_url'] = "You need to enter a title name";			
		}
		
		if(trim($_POST['keywords']) != ''){			
			$this->keywords = htmlentities($_POST['keywords']);		
		}else{		
			$this->errors['keywords'] = "You need to enter keywords";			
		}
		
		if(trim($_POST['author']) != ''){			
			$this->author = htmlentities($_POST['author']);		
		}else{		
			$this->errors['author'] = "You need to enter author's name";			
		}
		
		
		if(is_uploaded_file($_FILES['image_url']['tmp_name'])){
			$this->image_url = $this->upload_picture($_FILES);
		}
		
		if($_POST['image_url'] != NULL){
			$this->image_url = $_POST['image_url'];
			
		}
			
		
		$this->date_posted = time();
				
				
		$this->insertBlog();
			
	}//End of __construct();
	
	public function insertBlog(){
	
		if($this->id == null){
			$query = "INSERT INTO blog_table (cat_id, blog_title, blog_content,"; 
			$query.= "keywords, embed_url, date_posted, image_url , display, author ) VALUES ";
			$query.= "('$this->cat_id', '$this->blog_title', '$this->blog_content',"; 
			$query.= "'$this->keywords', '$this->embed_url', '$this->date_posted',";
			$query.= " '$this->image_url', '$this->display', '$this->author')"; 	
			
			$result = $this->db->dbQuery($query);
			
			echo $query;
			
		}elseif($this->id != NULL){
		
			$update_q = "UPDATE blog_table SET cat_id = '$this->cat_id', blog_title='$this->blog_title',";
			$update_q .= "blog_content='$this->blog_content', keywords='$this->keywords',";
			$update_q .= "embed_url='$this->embed_url', image_url='$this->image_url',";
			$update_q .= "display='$this->display', author='$this->author' "; 
			$update_q .= "WHERE id = $this->id";
			
			$result = $this->db->dbQuery($update_q);
			
			echo $update_q;
		}				
	}//End of insertBlog();
	
	private function upload_picture($_FILES){
	
		if($_FILES['image_url']['type'] == "image/gif"  ||
		   $_FILES['image_url']['type'] == "image/jpeg" ||
		   $_FILES['image_url']['type'] == "image/jpg"  ||
	   	   $_FILES['image_url']['type'] == "image/pjpeg" ){
		
		$dir_name = "picture/" . date("Ymd");
		
			if(!is_dir($dir_name)){
			
			mkdir($dir_name) or die("could not create directory " . $dir_name);
			
			}
			
			$i = 1;						
			$orig_filename = $_FILES['image_url']['name'];
			
			while(file_exists($dir_name . "/" . $_FILES['image_url']['name'])){
			
			$_FILES['image_url']['name'] = $i . "_" . $orig_filename;
			
			$i++;
			}
			move_uploaded_file($_FILES['image_url']['tmp_name'], $dir_name ."/". $_FILES['image_url']['name']);
			
			$feedback = "picture/" . date("Ymd") ."/". $_FILES['image_url']['name'];
			return($feedback);			
		
		}else{
		$feedback['type'] = "FILETYPE ERROR: Wrong file type.";
		}
	}//End of upload_picture();	
	
	
}//End of blog
?>
