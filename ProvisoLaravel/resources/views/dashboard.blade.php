<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:gold"> 
            <div class="container">
                <a href="dashboard.php" class="navbar-brand">Home</a>
                <div class="collaspe navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="AddForm.php" class="nav-link">Add Taken Classes</a>
                        </li>
                    </ul>
                </div>
            </div>
</nav>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['ID']; ?>!</p>
        <h2>You are now on the user dashboard page.</h2>   
    </div>
    <div class="form">
        <p><a href="logout.php">Logout</a></p>
    </div>
    
    
</body>
</html>