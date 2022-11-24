<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    /*
    //require('db.php');
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
                  <p class='link'>Back to <a href='{{route('login')}}'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='{{route('register')}}'>register</a> again.</p>
                  </div>";
        }
    } else {
    */
?>
    <form class="form" action="{{route('register.post')}}" method="POST">
        @csrf
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input form-control" name="ID" placeholder="ID" required autofocus />
        @if ($errors->has('ID'))
            <span class="text-danger">{{ $errors->first('ID') }}</span>
        @endif
        <input type="text" class="login-input form-control" name="email" placeholder="Email" required autofocus>
        @if ($errors->has('Password'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <input type="password" class="login-input form-control" name="Password" placeholder="Password" required autofocus>
        @if ($errors->has('Password'))
            <span class="text-danger">{{ $errors->first('Password') }}</span>
        @endif
        <input type="text" class="login-input form-control" name="First" placeholder="First" required autofocus />
        @if ($errors->has('First'))
            <span class="text-danger">{{ $errors->first('First') }}</span>
        @endif
        <input type="text" class="login-input form-control" name="Last" placeholder="Last" required autofocus />
        @if ($errors->has('Last'))
            <span class="text-danger">{{ $errors->first('Last') }}</span>
        @endif
        <input type="text" class="login-input form-control" name="Major" placeholder="Major"required autofocus>
        @if ($errors->has('Major'))
            <span class="text-danger">{{ $errors->first('Major') }}</span>
        @endif
        <input type="text" class="login-input form-control" name="Year" placeholder="Year" required autofocus>
        @if ($errors->has('Year'))
            <span class="text-danger">{{ $errors->first('Year') }}</span>
        @endif
        <input type="submit" name="submit" value="Register" class="login-button">
        
    </form>
    <p class="link"><a href="{{route('login')}}">Click to Login</a></p>
<?php
    //}
?>
</body>
</html>
