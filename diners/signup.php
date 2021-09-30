<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    
    if (isset($_REQUEST['username'])) {
        $user_fullname = stripslashes($_REQUEST['user_fullname']);        
        $user_fullname = mysqli_real_escape_string($con, $user_fullname);
        $username = stripslashes($_REQUEST['username']);        
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $dateofbirth = stripslashes($_REQUEST['dateofbirth']);        
        $dateofbirth = mysqli_real_escape_string($con, $dateofbirth);
        $gender = stripslashes($_REQUEST['optradio']);        
        $gender = mysqli_real_escape_string($con, $gender);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (user_fullname, username, email, password, dateofbirth, gender, create_datetime)
                     VALUES ('$user_fullname', '$username', '$email','" . md5($password) . "', '$dateofbirth' , '$gender' , '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Sign Up</h1>
        <input type="text" class="login-input" name="user_fullname" placeholder="Full Name" onkeypress="validateAlphanumeric(event)"  />
        <input type="text" class="login-input" name="username" placeholder="Username" onkeypress="validateAlphanumeric(event)" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" onkeypress="validateEmail(event)">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <label for="birthday">Date of Birthday:</label>
  <input type="date" class="login-input" id="dateofbirth" name="dateofbirth">
  <label for="birthday">Gender:</label>
  <label class="radio-inline">
      <input type="radio" name="optradio" id="male">Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" id="female">Female
    </label>
    
        <br><br><br>
    
        <input type="submit" name="submit" value="Sign Up" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
 <script>
  function validateNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateString(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateAlphanumeric(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z0-9_. ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateEmail(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z0-9@_.]/.test(ch))) {
      evt.preventDefault();
    }
  } 



  
</script>
</body>
</html>