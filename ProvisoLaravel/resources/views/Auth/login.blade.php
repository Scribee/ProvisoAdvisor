<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
/*
    //require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['ID'])) {
        $id = stripslashes($_REQUEST['ID']);    // removes backslashes
        $id = mysqli_real_escape_string($con, $id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `students` WHERE ID='$id'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['ID'] = $id;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
 * 
 */
?>
    <form class="form" action="{{ route('login.post') }}" method="POST" name="login">
        @csrf
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input form-control" name="email" placeholder="Email" id="email" required/>
        <input type="password" class="login-input form-control" name="password" placeholder="Password" id="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
   </form>
   
   @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif
  <p class="link"><a href="{{ route('register') }}">New Registration</a></p>
<?php
    //}
?>
</body>
</html>
