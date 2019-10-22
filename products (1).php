<?php 
 include 'connect.php' ;
session_start();
 ?>

<html>
    <head>
        <title>Products</title>
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
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap-sortable.css" rel="stylesheet" type="text/css">
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
           echo '<li class="active"><a href="products.php"><i class="icon_tags_alt"> </i> Products</a></li>' ;}?>
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
        
       
        <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-heading">
                              <h2>Products</h2>
                             <div align="right" style="position:relative;bottom:30px;">
                             <a href="addproduct.php" class="btn btn-primary" >New product</a></div></div>

                          <div class="panel-body">
                              
                              
                              
                              
                                                
                          <?php //$user=new User($userId, $userName, $userFirstname, $userLastname, $userEmail, $userAddress, $userPassword, $userRole);
                          
                          $data='<table class=" table sortable"> <thead> <tr>
                                  <th data-defaultsign="_19">Product id </th>
                                  <th data-defaultsign="_19"> Client id  </th>
                                  <th data-defaultsign="AZ">Product name </th>
                                  <th data-defaultsign="AZ">Product description </th>
                                  <th data-defaultsign="_19">Product version </th>
                                  <th data-defaultsign="AZ">Modules </th>
                                  </tr> </thead>';
                                  if($_SESSION['userRole']=='ADMIN'){
                         $products=  ViewProducts($con);
                      
                         if (count($products)>0){
                             $number=1;
                             $x = "";
                             $modulesbyproduct=array();
                             
              
                             foreach ($products as $product){
                                 
                                 if(!array_key_exists($product['productId'],$modulesbyproduct)){
                                 $modulesbyproduct[$product['productId']]=$product['moduleName'];
                                 }
                                 else{
                                  $modulesbyproduct[$product['productId']]=$modulesbyproduct[$product['productId']].','.$product['moduleName'];   
                             }}
                             
                                $traversedProducts=array();
                                
                              foreach ($products as $product){ 
                                  
                                  if(in_array($product['productId'],$traversedProducts)){
                                      continue;
                                  }
                                  $traversedProducts[$product['productId']]=$product['productId'];
                                  
                   $modules=explode(',',$modulesbyproduct[$product['productId']]);
                   $n=count($modules);
                                 
                              $data .= '<tbody><tr>
                <td rowspan="'.$n.'">' . $product['productId'] . '</td>
                <td rowspan="'.$n.'">' . $product['productclientId'] . '</td>
                <td rowspan="'.$n.'">' . $product['productName'] . '</td>
                <td rowspan="'.$n.'">' . $product['productDescription'] . '</td>
                <td rowspan="'.$n.'">' . $product['productVersion'] . '</td>';
                                 foreach ($modules as $module){
                                     $data.='<td>'.$module.'</td>';
                                 }
                   $data .='</tr></tbody>';                        
                                
 
            
               
                
                             }
                         }
                else {$data .= '<tr><td colspan="6">Records not found!</td></tr>';}                  
                      $data .= '</table>';
 
echo $data;
                                  }
                                  
else if($_SESSION['userRole']=='CLIENT')
    { }
?>
                              
                          </div>
                      </section>
                  </div>
              </div>
          </section>
        </section>
       
    
   <!-- bootstrap -->
  <script src="scripts/bootstrap.min.js"></script> 
  <!-- javascripts -->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/main.js"></script>
  <script src="scripts/bootstrap-sortable.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>

    <script src="scripts/menu.js"></script>
    </body>
</html>