<?
	class Newsletter{
		private $name;
		private $email;
		private $subject;
		private $emails;
		private $id;
		private $db;
		
		public function __construct(Database $db){
			$this->db = $db;	
		}	
		
		public function newsletter(){
		
			$this->subject = trim(stripslashes($_POST['subject']));
			$this->content = trim(stripslashes($_POST['content']));
			
			if(trim($_POST['email']) != ''){
				$this->emails = explode(',', $_POST['email']);
			}
			
			if(is_array($this->emails) && sizeof($this->emails) > 0){
				// Get the mail in single or multiple 
				
				foreach($this->emails as $e){
					$subject = $this->subject;
					$to = $e;
					$from = "My Name Is Fu";
					
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					// Additional headers
					$headers .= 'To: '.$e."\r\n";
					$headers .= 'From: '.$from.' <info@mynameisfu.com>' . "\r\n";		
					
					$mail = mail($to, $subject, nl2br($this->content), $headers);
	
				}
			}else{
			
				$query = "SELECT name, email FROM mynameisfu_mail";
				$result = $this->db->dbQuery($query);
				
				if($this->db->getRow()){
					while($contact = $this->db->getObject()){
						$subject = $this->subject;
						$to = $e;
						$from = "My Name Is Fu";
						
						// To send HTML mail, the Content-type header must be set
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						
						// Additional headers
						$headers .= 'To: '.$contact->name.' <'.$contact->email.'> ' . "\r\n";
						$headers .= 'From: '.$from.' <info@mynameisfu.com>' . "\r\n";
					
						$mail = mail($to, $subject, nl2br($this->content), $headers);
						
					}	
				}	
			}
			
		}//end of newsletter()
	}//end of class

?>