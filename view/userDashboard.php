<?php 
// require_once('../classes/model/Category.php');
$profile = new Classes\Model\Category;

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./includes/css/userDashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title> user dashboard</title>

<!-- Styling -->
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
  <!--<h1>Up for TRIVIA ?</h1>-->
  <h1 style="font-size:50px">TRIVIA Quizlet</h1>
  <h3>Hello 
        <?php if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
        } 
        else{
            echo "Folks";
        }
        ?>
    , this is an online quiz platform. <p>
    Enjoy ! </p></h3>
</div>

<div class="container">
                  
  <ul class="nav nav-tabs">
    <li class="active"><a href="/onlineQuizSystem/"> <b>Home</b>
    <span class="glyphicon glyphicon-home"></span></a></li>
    <li> <a href="/onlineQuizSystem/doLogout"> <b>Logout</b>
    <span class="glyphicon glyphicon-log-out"></span></a></li>
</ul>


    <br>
    
    <center> <button type = "button" class="btn btn-primary" data-toggle ="tab" href = "#select" > Let the Trivia Begin ! </button> </center>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"> <br>
    
    <div id = "select" class = "tab-pane fade">
    <label for="Category">Select a Category and click on Submit </label>
    

        <form method = "post" action = "viewQuestion">

	        <select class = "form-control" id = "" name = "catId">
	        

	        <?php
	        $categories = $profile->category_show();
	        foreach ($categories as $category)
	        {?>
	        
	            <option value= "<?php echo $category['category_id']; ?>"> <?php echo $category['category_name']; ?> </option>
	            
	        <?php 
	        }?> 

	        </select>

	        <br>
	        <input type ="Submit" value = "Submit Category" class="btn" />
        </form>
    </div>
    </div>
    <div class="col-sm-4"></div>
</div>

</body>
</html>

  

