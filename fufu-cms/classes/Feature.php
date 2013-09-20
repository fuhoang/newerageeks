<?
class Feature {
	private $f_title;
	private $f_content;
	private $f_tags;
	private $f_image;
	private $date_posted;

	private $db;
	private $id;

	public function __construct($_POST, Database $db, $_FILES) {

		$this -> db = $db;

		$this -> id = $_POST['feature_id'];

		//1 is to view the blog
		//2 is to hide the blog
/*
		if (isset($_POST['submit_blog'])) {
			$this -> display = 1;
		} elseif (isset($_POST['submit_save_blog'])) {
			$this -> display = 2;
		}
*/

		if (trim($_POST['f_title']) != '') {
			$this -> f_title = htmlentities($_POST['f_title']);
		} else {
			$this -> errors['f_title'] = "You need to enter a title name";
		}


		$this -> f_content = trim($_POST['f_content']);

		if (trim($_POST['f_tags']) != '') {
			$this -> f_tags = htmlentities($_POST['f_tags']);
		} else {
			$this -> errors['f_tags'] = "You need to enter keywords";
		}

		if (is_uploaded_file($_FILES['f_image']['tmp_name'])) {
			$this -> f_image = $this -> upload_picture($_FILES);
		}

		/*if($_POST['image_url'] != NULL){
		 //$this->image_url = $_POST['image_url'];
		 }*/

		$this -> date_posted = time();
		$this -> insertBlog();
	}

	public function insertBlog() {

		if ($this -> id == null) {
			$query = "INSERT INTO feature (title, content, tags, feature_image, date_posted) VALUES ";
			$query .= "('$this->f_title', '$this->f_content', '$this->f_tags',";
			$query .= " '$this->f_image', '$this->date_posted')";

			$result = $this -> db -> dbQuery($query);

			echo $query;

		} elseif ($this -> id != NULL) {

			$update_q = "UPDATE blog_table SET cat_id = '$this->cat_id', blog_title='$this->blog_title',";
			$update_q .= "blog_content='$this->blog_content', keywords='$this->keywords',";
			$update_q .= "embed_url='$this->embed_url', f_image='$this->f_image',";
			$update_q .= "display='$this->display', author='$this->author' ";
			$update_q .= "WHERE id = $this->id";

			$result = $this -> db -> dbQuery($update_q);

			echo $update_q;
		}
	}//End of insertBlog();

	private function upload_picture($_FILES) {

		if ($_FILES['f_image']['type'] == "image/gif" || $_FILES['f_image']['type'] == "image/jpeg" || $_FILES['f_image']['type'] == "image/jpg" || $_FILES['f_image']['type'] == "image/pjpeg") {

			$dir_name = "picture/" . date("Ymd");

			if (!is_dir($dir_name)) {

				mkdir($dir_name) or die("could not create directory " . $dir_name);

			}

			$i = 1;
			$orig_filename = $_FILES['f_image']['name'];

			while (file_exists($dir_name . "/" . $_FILES['f_image']['name'])) {

				$_FILES['f_image']['name'] = $i . "_" . $orig_filename;

				$i++;
			}
			move_uploaded_file($_FILES['f_image']['tmp_name'], $dir_name . "/" . $_FILES['f_image']['name']);

			$feedback = "picture/" . date("Ymd") . "/" . $_FILES['f_image']['name'];
			return ($feedback);

		} else {
			$feedback['type'] = "FILETYPE ERROR: Wrong file type.";
		}
	}//End of upload_picture();

}
?>