<!DOCTYPE html>

<?php include"session.php";
include"connect.php"
?>
<html style="overflow: auto;">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->  
    <link rel='stylesheet prefetch' href='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" href="css/menu.css">    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="temp/css/owl.carousel.css" type="text/css">

    <!-- Custom styles -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    </head>
    <body >
            <!--header start-->
       <header id="header" data-current-skin="white"  >
    <ul class="header-inner">
      <li id="menu-trigger" class="a">
        <div class="line-wrap" style="position:relative;top:25%;">
          <div class="line top"></div>
          <div class="line center"></div>
          <div class="line bottom"></div>
        </div>
      </li>
      <li><img src="horlogo.png" alt="" height="50"></li>
      <li class="logo hidden-xs" >
          <div style="position:relative;left:25%;"><a href="index.php" >Customer Support Portal</a></div>
      </li></ul>
  </header>
    <aside id="sidebar" class="a">
      <div class="sidebar-inner c-overflow ">
        <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex=0>
          <div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" dir="ltr">
            <div id="profile-menu" class="profile-menu">
              <a href="#" onclick="togglesubmenu();">
                <div class="profile-pic">
                 <?php echo' <img src="'.$_SESSION['userPicture'].'" alt="" class="mCS_img_loaded"/>'?>
               </div> <div style="position: relative;left: 30%; bottom:40%;color:white;">
                        <span><i class="icon_clock_alt">  </i><?php date_default_timezone_set("Africa/Tunis"); echo date("h:i"); ?></span><br>
                        <span><i class="icon_calendar">  </i><?php $t=time();echo(date("d-m-Y",$t));?></span><br>
                        <span><i class="icon_pin_alt">  </i>Location</span></div>
                  <p style="position:relative;bottom:50%;left:2%;color:white;"><?php  echo $_SESSION['userRole']; ?></p>
                <div id="profile-info" class="profile-info" style="position:relative;bottom:60%;">
                  <?php echo 'Welcome '.$_SESSION['userName'].'!';
                        ?>
                   
                               
                  <i class="zmdi zmdi-caret-down"></i>
                </div>
              </a>
            </div>
            <div id="main-menu-user" class="main-menu-user">
              <ul class="main-menu">
                  <li><a href="myprofile.php"><i class="zmdi zmdi-account">  </i> View Profile</a></li>
                  <li><a href="logout.php"><i class="arrow_right-up">  </i>Logout</a></li>
              </ul>
            </div>
          </div>
            <ul class="main-menu" style="">
            <li class="active"><a href="index.php"><i class="icon_house_alt"> </i> Home</a></li>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo'<li class=""><a href="viewusers.php"><i class="icon_contacts_alt"> </i> Users</a></li>';} ?>
            <?php if (($_SESSION['userRole']=='ADMIN')||($_SESSION['userRole']=='CLIENT')){
           echo '<li class=""><a href="products.php"><i class="icon_tags_alt"> </i> Products</a></li>' ;}?>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo ' <li class=""><a href="modules.php"><i class="icon_folder-add_alt"> </i> Modules</a></li>'; } ?>
            <li class=""><a href="tickets.php"><i class="icon_document_alt"> </i>tickets  <?php  echo' ';
                if($_SESSION['userRole']=='ADMIN'){
                    $newadt= ticketNew($con);
                    $newad=count($newadt);
                    if($newad>0){echo '  '.'<span class="badge bg-important">'.$newad.' </span>'.' ';}
                 
                 $pendingadt=  ticketPending($con);
                 $pendingad=count($pendingadt);
                 if($pendingad>0){echo '<span class="badge bg-warning">'.$pendingad.' </span>'.' ';}
                 $closedadt= ticketClosed($con);
                 $closedad=count($closedadt);
                 if($closedad>0){echo '<span class="badge bg-success">'.$closedad.' </span>'.' ';}

                }?></a> 
               
            </li>
            <li class=""><a href="reports.php"><i class="icon_piechart"> </i> Reports</a></li>

                       
          </ul>
        </div>
        <div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
          <div class="mCSB_draggerContainer">
            <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; height: 743px; top: 0px; display: block; max-height: 814px;" oncontextmenu="return false;">
              <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
            </div>
            <div class="mCSB_draggerRail"></div>
          </div>
        </div>
      </div>
    </aside>
         
                  
                
         <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              
                 <div class="row">
                  <div class="col-md-12">
                      <section class="panel" style="background-color:  white;">
                          <div class="panel-body">
                            <div class="container">
  <h2></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 90%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
          <img src="images/banner2.jpg" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h1>Customer support portal that makes customers happy.</h1>
         
        </div>
      </div>

      <div class="item">
          <img src="images/GlobalBusiness_BannerImage.jpg" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h1>UniQ Soft Technology</h1>
          <h4>Offers fast, helpful customer service.</h4>
        </div>
      </div>
    
      <div class="item">
          <img src="images/01.jpg" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h2>Our customer support portal</h2>
          <h4>Is the most efficient way to help our customers.</h4>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="right:2%;">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
                          

                          </div>
                          
                      </section>
                      
                      <section class="panel" style="">
                          <div class="panel-body">
                              <div class="col-md-12" style="align-items:center;alignment-adjust: middle; align-self: auto;">
                              <div class="col-md-3 col-sm-12 col-xs-12" style="border: 2px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7);margin:3%; ">
                                        <br><center><span class="icon_like" style="font-size:4vh;"></span></center>
                                        <h3 align="center"> <b>Efficient</b></h3> 
                                        <p align="center" style="color: black; ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat dui nec orci efficitur sollicitudin. </p>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12" style="border: 2px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7);margin:3%; ">
                    <br><center><span class="icon_mobile" style="font-size:4vh;"></span></center>
                                        <h3 align="center"> <b> Mobile ready </b></h3> 
                                        <p align="center" style="color: black; ">The application can be accessed from any digital device. </p>
                </div>
                <div  class="col-md-3 col-sm-12 col-xs-12 " style="border: 2px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7);margin:3%; ">
                    <br><center><span class="icon_group" style="font-size:4vh;"></span></center>
                                        <h3 align="center"> <b> User friendly </b></h3> 
                                        <p align="center" style="color: black;  ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat dui nec orci efficitur sollicitudin.
                                        </p>
                </div>
                          </div>
                          </div>
                      </section>
                  </div>
                  
                 </div>
          </section>
         </section>
   <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script> 
  <!-- javascripts -->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/main.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
  <script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
  <script src="scripts/menu.js"></script>

      
    </body>
</html>
