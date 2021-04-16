<!DOCTYPE html>
<html>
<head>
	<?php 
		require_once('headerLink.php');
	?>
	<link rel="stylesheet" type="text/css" href="includes/css/result.css">
	<title>Result page</title>
</head>
<body>
	<?php 
		$qusestionObj = new Classes\Model\Question();
		$result = $qusestionObj->getResult();
	 ?>
 	<div id="result-container">
 		<div class="header">
 			<h3>Thank You <?php echo $_SESSION['username'] ?> for giving quiz.</h3>
 		</div>
 		<div>
 			<h3>Your score : <b><?php echo $result['marks'] ?></b></h3>
 		</div>
 		<div class="make-flex">
 			<div class="report">
 				<h3 style="color: green">correct</h3>
 				<p><?php echo $result['correct'] ?></p>
 			</div>

 			<div class="report">
 				<h3 style="color: red">incorrect</h3>
 				<p><?php echo $result['wrong'] ?></p>
 			</div>

 			<div class="report">
 				<h3>unattemted</h3>
 				<p><?php echo $result["unattempted"] ?></p>
 			</div>
 		</div>
 		<br>
 		<div>
 			<a href="/onlineQuizSystem/userDashboard" class="button" style="align:center">Back to Home</a>
 		</div>
 	</div>
	<?php 
		require_once('footerlink.php');
	?>
</body>
</html>