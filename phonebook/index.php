<!DOCTYPE html>
<html>
  <head>
    <title>My Phone book</title>
    <link href="assets/css/bootstrap.min.css" type =text/css rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1">
  </head>
  <body>


    <div class="onejumbo">
      <div class="container text-center">
        <h1 style="font-size:60px;">My Phonebook</h1>
        <small class="text-muted">..a personalised documentation</small>
      </div>
    </div>

    <h3 style="text-align:center; text-decoration:underline;">Login</h3>
  <div class=" theform">
    <form method="POST" id="loginform">
    <div class="form-items">
      <label>Username</label>
      <input type="text" name="username" placeholder="JohnDoe" id="username">
      <label>Account Password</label>
      <input type="password" name="password" placeholder="Enter Password" id="password">
      <label>What's the code name?</label>
      <input type="password" name="code" placeholder="Code Name" id="code">
      <button type="submit" name="submit">Log in</button>
    </div>
    <div id="msg" style="color:red;"></div>
    </form>
  </div>


<?php
    
    if (isset($_POST['submit'])){
      if ($_POST['username'] !='Qudusini' || $_POST['password'] != 'abdulqudus' || $_POST['code'] != 'abd'){
        echo("Please fill in correct fields or Exit this world");
      }
      else
        header("Location:contact.php");
    }


?>

    <script type="text/javascript" src="assets/JQuery/jquery.min.js"></script>
    <script type = "text/javascript" src="assets/bootstrap.min.js"></script>
  </body>


</html>
