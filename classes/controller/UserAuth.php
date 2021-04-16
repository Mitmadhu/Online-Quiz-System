<?php 

namespace Classes\controller;
/**
 * 
 */
class UserAuth 
{
	
	public function __construct()
	{
	}

	public function viewLogin()
	{
		view('view/login.php');
	}

	public function viewSignup()
	{
		view('view/signup.php');
	}

	public function clean_input($data) {
		$data = str_replace(" ", "", $data);
	  	$data = htmlspecialchars($data);
	  	$data = trim($data);
	  	$data = strip_tags($data);
	  	return $data;
    }

	public function doSignup()
	{   
		$error = array();

		if (strlen($_POST['username']) == 0){
			array_push($error, "Username must not empty.");
		}

		if (strlen($_POST['email']) == 0) {
			array_push($error, "Email Field must not empty.");
		}
		if (strlen($_POST['password']) < 5) {
			array_push($error, "Password must be at least 5 charcter long");
		}
		else{
			if (strcmp($_POST['password'], $_POST['password_confirm']) != 0) {
			array_push($error, "password and confirm password not match");
			}
		}
		if (count($error) > 1){
			
			$_SESSION["signup_errors"] = $error;
			header('location: signup');
			return;
		}
		

		$username = $this->clean_input($_POST['username']);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$con = getConn();

		////check if username already exist
		$select_query = $con->prepare("SELECT * from users WHERE username = :username");
		$select_query->execute(['username' => $username]);
		$select_result = $select_query->fetch();
		if ($select_result != false and count($select_result) > 0) {
			array_push($error, "Username already exist.");
		}

		//check if email already exist

		$select_email = $con->prepare("SELECT * from users WHERE email = :email");
		$select_email->execute(['email' => $email]);
		$select_email_result = $select_email->fetch();

		if ($select_email_result != false and count($select_email_result) > 0) {
			array_push($error, "Email already exist.");
		}

		if (count($error) >= 1){
			$_SESSION["signup_errors"] = $error;
			header('location: signup');
			return;
		}
		
		$query = $con->prepare("INSERT into users(username, password, email) values (?,?,?)");
		$query->execute([$username, $password, $email]);
		$_SESSION['username'] = $username;
		header('location: userDashboard');
	}

	//function for login

	public function doLogin()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$con = getConn();
		$user = $con->prepare("SELECT password, username from users where email = :email LIMIT 1");
		$user->execute([$email]);
		$result = $user->fetch();

		$errors = array();
		if ($result == false){
			array_push($errors, "Account not exist for given mail");
			if (count($errors) >= 1){
				$_SESSION['login_errors'] = $errors;
				header('location: login');
				return;

			}
		}
		else{
			if (password_verify($password, $result['password'])) {
				$_SESSION['username'] = $result['username'];
				header('location: userDashboard');
			}
			else{
				array_push($errors, "Password id wrong");
				if (count($errors) >= 1){
					$_SESSION['login_errors'] = $errors;
					header('location: login');
					return;

				}
			}
		}
	}

	public function doLogout()
	{	


		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		view('view/login.php');
	}
	
	
}