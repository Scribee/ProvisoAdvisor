<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Classes You Have Taken</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['ID'])) {
        // removes backslashes
        
        $first = stripslashes($_REQUEST['First']);
        //escapes special characters in a string
        $first = mysqli_real_escape_string($con, $first);
        $last = stripslashes($_REQUEST['Last']);
        //escapes special characters in a string
        $last = mysqli_real_escape_string($con, $last);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (`First Name`, `Last Name`, Email, Username, Password) 
                     VALUES ('$first', '$last', '$email', '$username', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You have added user sucessfully.</h3><br/>
                  <p class='link'>Click here to see user <a href='dashboard.php'>dashboard</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='AddForm.php'>add user</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first" placeholder="First Name" required />
        <input type="text" class="login-input" name="last" placeholder="Last Name" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
