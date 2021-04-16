<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="includes/css/contact.css">
</head>

<body>
<div class="bg-img">   

    <form role = "role" method = "post" action="doContact" class="container">
    <h1>Contact Us</h1>
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Enter Name" name="Username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="no"><b>Subject</b></label>
    <input type="text" placeholder="Enter Subject" name="subject" required>

    <label for="msg"> <b>Message</b></label>

    <div>
      <textarea rows="5" cols="60" placeholder="Enter your message" name="content" required></textarea>
    </div>

    <button type="submit" class="btn">Submit </button>
    <div>
      <a href="/onlineQuizSystem/" class="home">Back to home</a>
    </div>
    <style>
      .home:link,.home:visited {
        margin-top: 15px;
        margin-left: 33%;
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
      }
    </style>
  </form>
</div>
</body>
</html>
