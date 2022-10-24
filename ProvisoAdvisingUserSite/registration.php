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
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['ID'])) {
        // removes backslashes
        $ID = stripslashes($_REQUEST['ID']);
        //escapes special characters in a string
        $ID = mysqli_real_escape_string($con, $ID);
        $password = stripslashes($_REQUEST['Password']);
        $password = mysqli_real_escape_string($con, $password);
        $first = stripslashes($_REQUEST['First']);
        //escapes special characters in a string
        $first = mysqli_real_escape_string($con, $first);
        $last = stripslashes($_REQUEST['Last']);
        //escapes special characters in a string
        $last = mysqli_real_escape_string($con, $last);
        $major = stripslashes($_REQUEST['Major']);
        $major = mysqli_real_escape_string($con, $major);
        $year = stripslashes($_REQUEST['Year']);
        $year = mysqli_real_escape_string($con, $year);
        
        $query    = "INSERT into `students` (`ID`, Password, `First`, Last , Major, Year) 
                     VALUES ('$ID', '" . md5($password) . "', '$first', '$last', '$major', '$year')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Back to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="ID" placeholder="ID" required />
        <input type="password" class="login-input" name="Password" placeholder="Password">
        <input type="text" class="login-input" name="First" placeholder="First" required />
        <input type="text" class="login-input" name="Last" placeholder="Last" required />
        <input type="text" class="login-input" name="Major" placeholder="Major">
        <input type="text" class="login-input" name="Year" placeholder="Year">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
