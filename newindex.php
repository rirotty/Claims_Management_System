<!DOCTYPE html>

<?php include"session.php";
?>
<html style="overflow: auto;">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="temp/css/owl.carousel.css" type="text/css">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/bg.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet" />
     <link rel="stylesheet" href="css/an.css">
    </head>
    <body class="bg">
  <header id="header" data-current-skin="blue">
    <ul class="header-inner">
      <li id="menu-trigger" class="a" style="background-color: transparent;border-bottom: none;">
        <div class="line-wrap">
          <div class="line top"></div>
          <div class="line center"></div>
          <div class="line bottom"></div>
        </div>
      </li>
     <li class="logo hidden-xs" style="background-color: transparent;border-bottom: none;">
      
         <h1 align="center" style="color:white; position: absolute;left: 35%;bottom:-70%">Customer support portal</h1>
     
      </li>
    </ul>
  </header>
  <section id="main">
    <aside id="sidebar" class="a">
      <div class="sidebar-inner c-overflow ">
        <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex=0>
          <div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" dir="ltr">
            <div id="profile-menu" class="profile-menu">
              <a href="#" onclick="togglesubmenu();" style="background-color: transparent;">
                <div class="profile-pic">
                    <img src="user.png" alt class="mCS_img_loaded"> 
                    <span style="color:white;position:relative;left:10%;top:30%; "><i class="icon_clock_alt"> </i><?php date_default_timezone_set("Africa/Tunis"); echo date("h:i"); ?></span>
                    <span style="color:white;position:relative;left:15%;top:30%; "><i class="icon_calendar"> </i><?php $t=time();echo(date("d-m-Y",$t));?></span>
                    <br>
                  <small style="color: white;position:relative; left:2%;"><?php  echo $_SESSION['userRole'];?></small>
                  
                </div>
                <div id="profile-info" class="profile-info" style="position:relative;bottom:15%;">
                     <?php  echo 'Welcome'. ' '. $_SESSION['userFirstname'].' '.$_SESSION['userLastname']; ?> 
                  <i class="zmdi zmdi-caret-down"></i>
                </div>
              </a>
            </div>
            <div id="main-menu-user" class="main-menu-user">
              <ul class="main-menu">
                <li><a href="myprofile.php"> <i class="icon_profile"></i> View Profile</a></li>
                <li><a href="logout.php"> <i class=" arrow_right-up"> </i> Logout </a></li>
              </ul>
            </div>
          </div>
          <ul class="main-menu">
            <li class="active">
                      <a class="" href="newindex.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  
                  <?php 
                  if (($_SESSION['userRole']==='ADMIN')||($_SESSION['userRole']==='DEVELOPER')){
                  $menu='<li class="">
                      <a href="viewusers.php" >
                          <i class="icon_contacts_alt"></i>
                          <span>Users</span>
                      </a>
                  
                  </li>';
                  echo$menu;
                  }
                          ?>
                 <li class="">
                      <a class="" href="products.php">
                          <i class="icon_tags_alt"></i>
                          <span>Products</span>
                      </a>
                  </li>
                   <li>
                        <a class="" href="modules.php">
                          <i class="icon_folder-add_alt"></i>
                          <span>Modules</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="tickets.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Tickets</span>
                      </a>
                  </li>                  
                  <li class="">                     
                      <a href="" class="">
                          <i class="icon_piechart"></i>
                          <span>Reports</span>
                      </a>
                                 
                  </li>
          </ul>
        </div>
 
      </div>
    </aside>
   
  </section>

        <section id="main-content">   
           <div> <center><img src="Uniq (2).png" alt="" style="width:50%;"></center>
            <div style="size: landscape; background-color: white;position:absolute;left:0px;top:150%; width: 100%;height:150%"> 
                <div style="border: 3px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7); width: 25%; height: 70%; position:relative;top:7.5%;left:8%; ">
                                        <br><center><span class="icon_like" style="font-size: 32px;"></span></center>
                                        <h3 align="center"> <b> Feature packed</b></h3> 
                                        <p align="center" style="color: black; ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat dui nec orci efficitur sollicitudin. </p>
                </div>
                <div style="border: 3px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7); width: 25%; height: 70%; position:relative;bottom:62%;left:38%; ">
                    <br><center><span class="icon_mobile" style="font-size: 32px;"></span></center>
                                        <h3 align="center"> <b> Mobile ready </b></h3> 
                                        <p align="center" style="color: black; ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat dui nec orci efficitur sollicitudin. </p>
                </div>
                <div style="border: 3px rgba(0,112,255,0.7) solid;border-radius: 12px; background-color: transparent; color:rgba(0,112,255,0.7); width: 25%; height: 70%; position:relative;bottom:132%;left:68%; ">
                    <br><center><span class="icon_group" style="font-size: 32px;"></span></center>
                                        <h3 align="center"> <b> User friendly </b></h3> 
                                        <p align="center" style="color: black; ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat dui nec orci efficitur sollicitudin. </p>
                </div>
            </div>
          
         </section>
   <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script> 
  <!-- javascripts -->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/main.js"></script>
  <script src="scripts/menu.js"></script>
  <script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
  <script src="scripts/an.js"></script>

    </body>
</html>
