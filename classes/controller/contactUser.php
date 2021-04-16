<?php 

namespace Classes\Controller;

/**
 * 
 */
class contactUser
{
	
	function __construct()
	{
		# code...
	}
	public function contactUs()
	{
		view('view/contact.php');
	}

	public function clean_input($data) {
		$data = str_replace(" ", "", $data);
	  	$data = htmlspecialchars($data);
	  	$data = trim($data);
	  	$data = strip_tags($data);
	  	return $data;
    }
	public function doContact()
	{
		$username = $this->clean_input($_POST['Username']);
		$email = $_POST['email'];
		if (strlen($username)>0 and strlen($email)>0) {
			$con = getConn();
			$user = $con->prepare("SELECT * from USERS WHERE username = :username and email = :email LIMIT 1");
			$user->execute(['username' => $username, 'email' => $email]);
			$result = $user -> fetchAll();

			if (count($result) < 1) {
				echo '<script>alert("Username or email is wrong.")</script>';
				view('view/contact.php');
				return;
			}
			else{
				//insert feedback in the table
				$subject = $this->clean_input($_POST['subject']);
				$content = $this->clean_input($_POST['content']);

				$sql = $con->prepare("INSERT INTO feedback (user_name, user_email, subject, message ) VALUES (?,?,?,?)");
				$sql->execute([$username, $email, $subject, $content]);
				view('view/feedbackSubmitted.php');
			}
		}



	}
}



?>