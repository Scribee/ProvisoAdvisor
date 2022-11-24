<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Classes You Have Taken</title>
    <link rel="stylesheet" href="style.css"/>
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
<?php
    //require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['ID'])) {
        // removes backslashes
        
        $id = stripslashes($_REQUEST['ID']);
        $id = mysqli_real_escape_string($con, $id);
        $class = stripslashes($_REQUEST['Class']);
        $class = str_replace(' ', '', $class);
        $class = mysqli_real_escape_string($con, $class);
        $year = stripslashes($_REQUEST['Year']);
        $year = mysqli_real_escape_string($con, $year);
       
        $query    = "INSERT into `taken` (`ID`, `Class`, `Year`) 
                     VALUES ('$id', '$class', '$year')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You have added class sucessfully.</h3><br/>
                  <p class='link'>Click <a href='AddForm.php'>here </a>to see add another class you've taken. </p>
                  <p class='link'>Click <a href='dashboard.php'>here</a> to see the dashboard. </p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click <a href='AddForm.php'>here</a> to add user again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Add Class</h1>
        <input type="text" class="login-input" name="ID" placeholder="StudentID" required />
        <input type="text" class="login-input" name="Class" placeholder="Class: ex.CS383" required />
        <input type="text" class="login-input" name="Year" placeholder="Year: ex.Input '1' for (freshman year)" required />
        <input type="submit" name="submit" value="Add" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
