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

        <title>Profile</title>
    </head>
    <body style='background-color: grey'>
        <div>
            <button style='width:50px; height:50px'><a href= "{{route('dashboard')}}" ><img src="images/back.png" alt="#"/></a></button>
        </div>
    <center>   
        <div class="login">
            <div class="login_container">
                <div class="row">
                    <div class='col-lg-3'>
                    </div>
                    <div class="col-lg-6" style="background: whitesmoke; padding: 30px 30px 15px 30px">
                        <h3>Profile</h3>
                        <p style="text-align: left; border: solid black .5px; padding: 5px"> ID: {{Auth::guard('user')->user()->id}}</p>
                        <p style="text-align: left; border: solid black .5px; padding: 5px"> Name: {{Auth::guard('user')->user()->name}}</p>
                        <p style="text-align: left; border: solid black .5px; padding: 5px"> Email: {{Auth::guard('user')->user()->email}}</p>
                        <p style="text-align: left; border: solid black .5px; padding: 5px"> Major: {{$info->get('Major')}} </p>
                        <p style="text-align: left; border: solid black .5px; padding: 5px"> Year: {{$info}}</p>
                    </div>
                    <div class='col-lg-3'>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
