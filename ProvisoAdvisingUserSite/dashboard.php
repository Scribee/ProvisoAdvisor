<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['ID']; ?>!</p>
        <p>You are now on the user dashboard page.</p>
        
    </div>
    
 
    
    <div class="form">
        <p><a href="AddForm.php">Submit the Classes you have Taken!</a></p>
    </div>
    <div class="form">
        <p><a href="logout.php">Logout</a></p>
    </div>
    
    
</body>
</html>