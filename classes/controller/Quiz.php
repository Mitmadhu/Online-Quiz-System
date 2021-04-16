<?php 

namespace Classes\controller;

/**
 * 
 */
class Quiz 
{

	public function show()
	{
		view('view/viewQuestion.php');
	}

	public function showResult()
	{
		view('view/result.php');
	}

	
}

