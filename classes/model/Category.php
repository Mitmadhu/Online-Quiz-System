<?php 

/**
 * 
 */
namespace Classes\Model;
class Category
{
	
	public function category_show()
    {	

    	$conn = getConn();
        $stmn = $conn->prepare("SELECT * from category");
        $stmn->execute();
        return $stmn->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function contact_us($data)
    {
        $this->conn->query($data);
        return true;
        
    }


    public function answer($data)
    {
        //print_r($data);
    }




    /* Redirection Function*/
    public function url($url)
    {
        header("location:".$url);
    }

}



?>