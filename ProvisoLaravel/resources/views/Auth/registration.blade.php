<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--> 

    <title>Registration</title>
    
</head>
<body style='background-color: grey'>
<div>
    <button style='width:50px; height:50px'><a href = "{{route('home')}}" ><img src="images/back.png" alt="#"/></a></button>
</div>
<center>   
 <div class="login">
            <div class="login_container">
               <div class="row">
                    <div>
                     <h3>Registration</h3>
                     <form class="login_form" align='center' action="{{route('register.post')}}" method='POST'>
                         @csrf
                        
        <input type="text" class="login-input form-control enter" name="ID" placeholder="ID" required autofocus />
        @if ($errors->has('ID'))
            <span class="text-danger">{{ $errors->first('ID') }}</span>
        @endif
        <input type="text" class="login-input form-control enter" name="email" placeholder="Email" required autofocus>
        @if ($errors->has('Password'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <input type="password" class="login-input form-control enter" name="Password" placeholder="Password" required autofocus>
        @if ($errors->has('Password'))
            <span class="text-danger">{{ $errors->first('Password') }}</span>
        @endif
        <input type="text" class="login-input form-control enter" name="First" placeholder="First" required autofocus />
        @if ($errors->has('First'))
            <span class="text-danger">{{ $errors->first('First') }}</span>
        @endif
        <input type="text" class="login-input form-control enter" name="Last" placeholder="Last" required autofocus />
        @if ($errors->has('Last'))
            <span class="text-danger">{{ $errors->first('Last') }}</span>
        @endif
        <input type="text" class="login-input form-control enter" name="Major" placeholder="Major"required autofocus>
        @if ($errors->has('Major'))
            <span class="text-danger">{{ $errors->first('Major') }}</span>
        @endif
        <input type="text" class="login-input form-control enter" name="Year" placeholder="Year" required autofocus>
        @if ($errors->has('Year'))
            <span class="text-danger">{{ $errors->first('Year') }}</span>
        @endif
                        <button class="sub_btn">Register</button>
                     </form>
                  </div>
                   
               </div>
            </div>
     <br>
            <p>Already have an account? <a href="{{ route('login') }}">Login here!</a></p>
           
    </div>
</center>
    <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
</body>
    
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
     * 
     */
?>
     

</html>
