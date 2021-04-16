<?php

//object name can be anything
$questionObj = new \Classes\Model\Question;
$questionSet = $questionObj->getQuestion($_POST['catId']);
?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

h1{
    
    color: crimson;
}


</style>
    

</head>
<body>
​
<div class="container">
<div class="col-sm--2"></div>
<div class="col-sm--8">
    <h1> <b> Welcome to Trivia Quizlet ! </b></h1> 
    <p> <b> Are You Ready?  <br>
    Let's Begin. </b></p> 
    <b><p id="quiz-time-left"></p> </b>   

    <form method ="post" action ="result">

    <!-- Question Counter -->
    <?php $i = 1; ?>


    <?php foreach($questionSet as $ques) {?>
    <table class="table table-bordered">
        <thead>
        <tr class ="danger">
            <th> <?php echo 'Q '.$i.'.'; ?> <?php echo $ques['question']; ?> </th>
        </tr>
        </thead>
    <tbody>
    
    <?php if(isset($ques['option1'])) { ?> 
      <tr class =" warning">
        <td> &nbsp; <input type = "radio" value = "1" name = "<?php echo $ques['id']; ?>" /> &emsp; 1. &nbsp; <?php echo $ques['option1']; ?></td>
      </tr>
    <?php } ?>


    <?php if(isset($ques['option2'])) { ?>   
      <tr class =" active">
        <td> &nbsp; <input type = "radio"  value = "2"  name = "<?php echo $ques['id']; ?>" /> &emsp; 2. &nbsp; <?php echo $ques['option2']; ?></td>
      </tr>
    <?php } ?>


    <?php if(isset($ques['option3'])) { ?> 
      <tr class =" warning">
        <td> &nbsp; <input type = "radio"  value = "3" name = "<?php echo $ques['id']; ?>" /> &emsp; 3. &nbsp; <?php echo $ques['option3']; ?></td>
      </tr>
    <?php } ?>
    

    <?php if(isset($ques['option4'])) { ?> 
      <tr class =" active">
        <td> &nbsp; <input type = "radio" value = "4" name = "<?php echo $ques['id']; ?>" /> &emsp; 4. &nbsp;  <?php echo $ques['option4']; ?></td>
      </tr>
    <?php } ?>

    <!-- Not attempted -->
    <!-- If nothing selected, sending invalid value for option say "5", will help in checking right response -->
    <tr class =" active">
        <td> <input type = "radio" checked = "checked" style = "display: none" value = "5" name = "<?php echo $ques['id']; ?>" /> </td>
      </tr>


    </tbody>
    </table>
    <?php $i++; } ?>

    <center> <input type = "Submit" id="submit_quiz" value = "Submit" class = "btn btn-success" /> </center>
    </form>

    </div>
<div class="col-sm--2"></div>
</div>


<script type="text/javascript" src = "includes/js/quizTimer.js"></script>
</body>
</html>
​
