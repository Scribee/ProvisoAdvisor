<?php
//require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!DOCTYPE html>
<html lang="en">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Proviso Advising</title>
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

</head>
<body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="header_top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                     </div>
                     <div class="col-md-6">
                        <ul class="social_icon_top text_align_center  ">
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                     <div class="col-md-3">
                        <ul class = "">
                            <li style='display:inline; padding:15px'><a href='{{route('login')}}'>Sign in</a></li>
                            <li style='display:inline; padding:15px'><a href='{{route('register')}}'>Register</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="header_bottom">
                        <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                              <div class="full">
                                 <div class="center-desk">
                                    <div class="logo">
                                       <a href="#">Proviso</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                              <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                       <li class="nav-item">
                                          <a class="nav-link" href="#top">Home</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#how-to">How To</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#about">About</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#examples">Examples</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#contact">Contact</a>
                                     
                                       </li>
                                    </ul>
                                 </div>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         <section class="banner_main">
            <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="carousel-caption  banner_po">
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="build_box">
                                    <h1>Welcome to Proviso Advising!</h1>
                                    <p>Self-Advising made easy!</p>
                                    <a class="read_more signIn_btn" href="{{route('login')}}" role="button">Sign In</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="carousel-caption banner_po">
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="build_box">
                                    <h1>Welcome to Proviso Advising!</h1>
                                    <p>Sign in or register as a new user to get started!</p>
                                    <a class="read_more signIn_btn" href="{{route('register')}}" role="button">Register</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
               <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
               <i class="fa fa-angle-left" aria-hidden="true"></i>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
               <i class="fa fa-angle-right" aria-hidden="true"></i>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </section>
      </header>
      <!-- end banner -->
       <!-- three_box -->
      <div class="three_box" id="how-to">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/signIn.png" alt="#"/></i>
                     <span>Sign Up or Sign In</span>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/add.png" alt="#"/></i>
                     <span>Add your classes</span>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/select.png" alt="#"/></i>
                     <span>Select a company or position</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end three_box -->
      <!-- about -->
      <div class="about" id="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>About Our Website</h2>
                     <span>Proviso Advising is a dedicated self-advising site that eliminates the need to schedule an appointment with a professional. 
                     Here at Proviso you can generate your schedule in just a few easy steps. 
                     First register or sign in as a user. Then add the classes that you've already taken. Lastly, select a company or position you'd like to explore.
                     Proviso will then generate a chart of classes that we recommend to set you up for those career goals!</span>
                     <span> If you cannot find a company or position you are looking for, research the skills it would require and add your own custom
                         skills to create the schedule for you.
                     </span>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img src="images/aboutPage.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
     
      <!-- projects -->
      <div class="projects" id='examples'>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Tutorial</h2>
                     <span>This is what the dashboard page will look like when you register with our services!</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="proj" class="carousel slide projects_ban" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#proj" data-slide-to="0" class="active"></li>
                        <li data-target="#proj" data-slide-to="1"></li>
                        <li data-target="#proj" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container-fluid">
                              <div class="carousel-caption relative3">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/Login.png" alt="#"/></figure>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/register.png" alt="#"/></figure>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/addClass.png" alt="#"/></figure>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative3">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/addComp.png" alt="#"/></figure>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/Skills.png" alt="#"/></figure>
                                          </div>
                                         
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/Schedule.png" alt="#"/></figure>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <a class="carousel-control-prev" href="#proj" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#proj" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end projects -->
      
      <!--  contact -->
      <div class="contact" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 padding_right0">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone" type="type" name="Phone">                          
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 padding_left0">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d32312.52530804035!2d-117.03772982874584!3d46.72617841937173!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8f65411bd98fcd6c!2sUniversity%20of%20Idaho!5e0!3m2!1sen!2sus!4v1669971676925!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
     
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
</body>

</html>