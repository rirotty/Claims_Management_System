<?php 
 include 'connect.php';
 session_start();
?>

<html>
    <head>
        <title>Edit profile</title>
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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    </head>
    <body style="overflow: auto;">
            <!--header start-->
        <header id="header" data-current-skin="white" >
    <ul class="header-inner">
        <li id="menu-trigger" class="a" ><a href="">
        <div class="line-wrap" style="position:relative;top:25%;">
          <div class="line top"></div>
          <div class="line center"></div>
          <div class="line bottom"></div>
        </div>
            </a>
        </li>
      <li><img src="horlogo.png" alt="" height="60" style="position:relative;bottom:10%;"></li>
      <li class="logo hidden-xs" >
          <div style="position:relative;left:25%;"><a href="index.php">Customer Support Portal</a></div>
      </li></ul>
  </header>
    <aside id="sidebar" class="a">
      <div class="sidebar-inner c-overflow ">
        <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex=0>
          <div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" dir="ltr">
            <div id="profile-menu" class="profile-menu">
              <a href="#" onclick="togglesubmenu();">
                <div class="profile-pic">
                  <img src="<?php echo $_SESSION['userPicture']; ?>" alt class="mCS_img_loaded">
               </div> <div style="position: relative;left: 30%; bottom:40%;color:white;">
                        <span><i class="icon_clock_alt">  </i><?php date_default_timezone_set("Africa/Tunis"); echo date("h:i"); ?></span><br>
                        <span><i class="icon_calendar">  </i><?php $t=time();echo(date("d-m-Y",$t));?></span><br>
                        <span><i class="icon_pin_alt">  </i>Location</span></div>
                  <p style="position:relative;bottom:50%;left:8%;color:white;"><?php  echo $_SESSION['userRole']; ?></p>
                <div id="profile-info" class="profile-info" style="position:relative;bottom:60%;">
                  <?php echo 'Welcome '.$_SESSION['userName'].'!'; ?>
                   
                               
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
          <ul class="main-menu">
            <li class="active"><a href="index.php"><i class="icon_house_alt"> </i> Home</a></li>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo'<li class=""><a href="viewusers.php"><i class="icon_contacts_alt"> </i> Users</a></li>';} ?>
            <?php if (($_SESSION['userRole']=='ADMIN')||($_SESSION['userRole']=='CLIENT')){
           echo '<li class=""><a href="products.php"><i class="icon_tags_alt"> </i> Products</a></li>' ;}?>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo ' <li class=""><a href="modules.php"><i class="icon_folder-add_alt"> </i> Modules</a></li>'; } ?>
            <li class=""><a href="tickets.php"><i class="icon_document_alt"> </i> tickets</a></li>
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
       
            <section id="main-content" >
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-heading">
                              <h2>Edit profile</h2>
                          </div>
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" enctype="multipart/form-data">
                                          
                                          <div class="form-group">
                                          <label class="col-sm-3 control-label">ID:</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="userId" value="<?php echo $_SESSION['userId'] ;?>" readonly />
                                          </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="userName" class="col-sm-3 control-label">Username :</label>
                                          <div class="col-sm-9">
                                              <input type="text" id="userName" class="form-control" name="userName" value="<?php echo $_SESSION['userName'] ;?>" readonly />
                                   
                                          </div>
                                          </div>
                                  
                                          <div class="form-group">
                                          <label for="password" class="col-sm-3 control-label">Password : <span class="required" style="color:red;">*</span></label>
                                          <div class="col-sm-9">
                                              <input type="password" id="password" class="form-control" name="userPassword" value="<?php echo $_SESSION['userPassword'] ;?>" required="required"/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="confirmPassword" class="col-sm-3 control-label">Confirm Password : <span class="required" style="color:red;">*</span></label>
                                          <div class="col-sm-9">
                                              <input   onChange="checkPassword()" id="confirmPassword" type="password" class="form-control required" name="confirmPassword" value="<?php echo $_SESSION['userPassword'] ;?>" required="required"/>
                                              <div id="divcheckPassword"></div>
                                          </div>
                                          </div>
                                  
                                          <div class="form-group">
                                          <label for="userRole" class="col-sm-3 control-label">Role : </label>
                                          <div class="col-sm-9">
                                              <input type="text" id="userRole" class="form-control m-bot15" name="userRole" value="<?php echo $_SESSION['userRole'] ;?>" readonly/>
                                                 
                                                                                   </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="userFirstname" class="col-sm-3 control-label">First name :</label>
                                          <div class="col-sm-9">
                                          <input id="userFirstname" type="text" class="form-control" name="userFirstname" value="<?php echo $_SESSION['userFirstname'] ;?>"/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label  for="userLastname" class="col-sm-3 control-label">Last name :</label>
                                          <div class="col-sm-9">
                                          <input id="userLastname" type="text" class="form-control" name="userLastname" value="<?php echo $_SESSION['userLastname'] ;?>"/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="userEmail" class="col-sm-3 control-label">E-mail :</label>
                                          <div class="col-sm-9">
                                          <input id="userEmail" type="text" class="form-control" name="userEmail" value="<?php echo $_SESSION['userEmail'] ;?>"/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="userAddress" class="col-sm-3 control-label" >Address :</label>
                                          <div class="col-sm-9">
                                          <input  id="userAddress" type="text" class="form-control" name="userAddress" value="<?php echo $_SESSION['userAddress'] ;?>"/>
                                          </div>
                                          </div>
                                         <div class="form-group">
                                          <label for="picture" class="col-sm-3 control-label" >Change picture :</label>
                                          <div class="col-sm-9">
                                          <input  id="picture" type="file" class="form-control" name="picture" />
                                          </div>
                                          </div>
                                          <br> 
                                  
                                  <br>



                                          <center><input type="submit" class="btn btn-primary" style="width:10%;" name="editprofile" value="Save"/></center>
                              </form>
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