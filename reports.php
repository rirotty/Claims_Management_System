<!DOCTYPE html>

<?php session_start();
include("connect.php")
?>
<html style="overflow: auto;">
    <head>
  

        <title>Reports</title>
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
    
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="charts/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="animated-bar-chart/css/style.css">
      <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
            <!--header start-->
        <header id="header" data-current-skin="white" >
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
            <li class=""><a href="index.php"><i class="icon_house_alt"> </i> Home</a></li>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo'<li class=""><a href="viewusers.php"><i class="icon_contacts_alt"> </i> Users</a></li>';} ?>
            <?php if (($_SESSION['userRole']=='ADMIN')||($_SESSION['userRole']=='CLIENT')){
           echo '<li class=""><a href="products.php"><i class="icon_tags_alt"> </i> Products</a></li>' ;}?>
            <?php if ($_SESSION['userRole']=='ADMIN'){
            echo ' <li class=""><a href="modules.php"><i class="icon_folder-add_alt"> </i> Modules</a></li>'; } ?>
            <li class=""><a href="tickets.php"><i class="icon_document_alt"> </i> tickets</a></li>
            <li class="active"><a href="reports.php"><i class="icon_piechart"> </i> Reports</a></li>

                       
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
            
         <section id="main-content" style="position:relative;bottom:100%;">
          <section class="wrapper">            
              <!--overview start-->
              
                 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-heading">
                              <h2> Modules </h2>
                          
                         </div>
                          <div class="panel-body">
                         
                              
                        <div class="responsiveChart" align="center">
    
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h2 align=""> Ticket Status </h2> <br> <br> <br> <br><br> <br>
    
     
          <?php
          
          $new= ticketNew($con);
                         $newt=count($new);
                         
                         $pending= ticketPending($con);
                         $pendingt=count($pending);
                         $closed= ticketClosed($con);
                         $closedt=count($closed);
          
          ?>
        
        <div class="pieID pie"></div>
        <div class="pieafter">
          
        </div>
        <ul class="chartM pieID legend">
         
          <li class="hides">
            <em>New</em>
            <span><?php echo $newt ; ?></span>
          </li>
          <li>
            <em>Pending</em>
            <span><?php echo $pendingt ; ?></span>
          </li>
          <li>
            <em>Closed</em>
            <span><?php echo $closedt ; ?></span>
          </li>
        </ul>
        <br>
        <br>
        <br>
      
   
</div>      
                            <div class="responsiveChart" align="center">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                    <h2 align="">Average time for closing tickets </h2> <br> <br> 
                                <?php 
                                  
                       $ticketsd=CountTime($con);
                             $res=0;     
                       $n=count($ticketsd);
                       
                                  foreach ($ticketsd as $ticketd)
                                  {$res+= (strtotime($ticketd['ticketclosingDate']) - strtotime($ticketd['ticketopeningDate']));  }
                                    $average = $res / count( $n );
                                    $days    = floor( $average / 86400 );
                                   $hours   = floor( ( $average % 86400 ) / 3600 );
                                   $minutes = floor( ( $average % 3600 ) / 60 );
                                   $seconds = $average % 60;?>
                                    <h3 style="color: #0055b3;">
                                   <?php echo $days . ' day' . ( $days > 0 ? 's' : '' ) . ', ';
                                   echo $hours . ' hour' . ( $hours > 0 ? 's' : '' ) . ', ';
                                   echo $minutes . ' minute' . ( $minutes > 0 ? 's' : '' ) . ', ';
                                   echo $seconds . ' second' . ( $seconds > 0 ? 's' : '' );?> 
                                    </h3>
                                </div>
                                <br> <br></div>
                        
                  <div class="responsiveChart" align="center">
             <?php $ticket=  ticketTotal($con);
                         $tickets=count($ticket);
                         
                   $payable= ticketPayable($con);
                                $payables=count($payable);
                         
                   $receavable= ticketReceavables($con);
                                   $receavables=count($receavable);
                   $treasury= ticketTreasury($con);
                                   $treasuryy=count($treasury);               
                         
                                   ?>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                    <h2 align="left">Percentage of tickets per module </h2> <br> <br>
                            <div id="chart">
  <ul id="numbers">
    <li><span>100%</span></li>
    <li><span>90%</span></li>
    <li><span>80%</span></li>
    <li><span>70%</span></li>
    <li><span>60%</span></li>
    <li><span>50%</span></li>
    <li><span>40%</span></li>
    <li><span>30%</span></li>
    <li><span>20%</span></li>
    <li><span>10%</span></li>
    <li><span>0%</span></li>
  </ul>
  
  <ul id="bars">
    <li><div data-percentage="<?php echo ($payables*100)/$tickets;  ?>" class="bar"></div><span>Payable</span></li>
    <li><div data-percentage="<?php echo ($treasuryy*100)/$tickets;  ?>" class="bar"></div><span>Treasury</span></li>
    <li><div data-percentage="<?php echo ($receavables*100)/$tickets;  ?>" class="bar"></div><span>Recevables</span></li>
  
  </ul>
</div> 
                            <br>
                            <br>
                        
                        </div>
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
<script language="javascript" type="text/javascript">
function openWindow(href) {
  window.open(href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=500,height=370');
  return false;
}
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script src="charts/js/index.js"></script>
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="animated-bar-chart/js/index.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
<script src="scripts/menu.js"></script>
    </body>
</html>
