<!DOCTYPE html>
<html>
<head>
	<?php 
		require_once('headerLink.php');
	?>
	<link rel="stylesheet" type="text/css" href="includes/css/result.css">
	<title>Thanks</title>
</head>
<body>
 	<div id="result-container">
 		<div class="header">
 			<h3>Thank You <?php echo $_SESSION['username'] ?> for contacting us.</h3>
 		</div>
 		<div class="header">
 			<h3>We will contact you sooon.</h3>
 		</div>

 		<div>
 			<a href="/onlineQuizSystem/" class="button" style="align:center">Back to Home</a>
 		</div>
 	</div>
	<?php 
		require_once('footerlink.php');
	?>
</body>
</html>