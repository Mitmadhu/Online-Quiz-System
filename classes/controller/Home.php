<?php 

/**
 * 
 */
namespace Classes\controller;
class Home 
{
	
	function __construct()
	{
	}

	public function viewHome()
	{
		view('view/home.php');
	}

	public function viewDash()
	{
		if (isset($_SESSION['username'])) {
			view('view/userDashboard.php');
		}
		else{
			view('view/login.php');
		}
	}
}

