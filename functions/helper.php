<?php 
	

	//function to connect with database using PDO
	function getConn()
	{
		$host = "localhost";
		$db = "cloudcomputing";
		$username = "cloudcomputing";
		$password = "madhu@ayushi";

		$options = [
		    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		    \PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$dsn = "mysql:host=$host;dbname=$db;";
		try {
		     $con= new \PDO($dsn, $username, $password, $options);
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
		return $con;

	}


	function view($path)
	{
		require_once($path);
	}

