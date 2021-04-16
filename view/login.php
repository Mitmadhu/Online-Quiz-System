<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="includes/css/signup.css">

</head>
<body style=" background-image: url('includes/images/image6.jpg');">
  <div class="header">
    <h2>Login</h2>
  </div>
    
  <form method="post" action="doLogin">
     <?php 

     if (isset($_SESSION['login_errors'])) {
        $errors = $_SESSION['login_errors'];
          echo "<div class='alert alert-danger' id='fade' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button>
          <br>";
          foreach ($errors as $error) {
            echo "<p>$error</p>";
          }
          echo "</div>";
     }
     unset($_SESSION['login_errors']);
     ?>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" value="">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Login</button>
    </div>
    <p>
        Not registerd yet? <a href="signup">Sign Up</a>
    </p>
    <p>
        Forget password?? <a href="login">Reset</a>
    </p>
  </form>
  <div>
    <a href="/onlineQuizSystem/" class="home">Back to home</a>
  </div>
  <style>
    .home:link,.home:visited {
      margin-top: 15px;
      margin-left: 45%;
      background-color: #f44336;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $("button").click(function(){
         $("#fade").fadeOut(1000);
       });
     </script>
</body>
</html>