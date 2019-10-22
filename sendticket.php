<?php 
 include 'connect.php';
 session_start();
?>

<html>
    <head>
        <title>Send ticket</title>
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
    <body style="margin-bottom: 0px;">
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
            <li class="active"><a href="tickets.php"><i class="icon_document_alt"> </i> tickets</a></li>
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
       
        <section id="main-content" style="">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-heading">
                              <h2>Send ticket </h2>
                          </div>
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                                              <label for="userId" class="col-sm-3 control-label">User id : <span class="required" style="color:red;">*</span></label>
                                          <div class="col-sm-9"> 
                                              <input type="text" id="userId" class="form-control" name="ticketuserId" value="<?php echo $_SESSION['userId']?>" required="required" readonly=""/>
                                          </div>
                                          </div>
                                 
                                  <?php 
                                  $client=$_SESSION['userId'];
                                  $products=  ViewClientProducts($con,$client);
                                  $n=count($products);
                                  $data='<div class="form-group">
                                              <label for="productId" class="col-sm-3 control-label">Product : <span class="required" style="color:red;">*</span></label>
                                          <div class="col-sm-9">
                                              <select id="productId" name="ticketproductId" class="form-control" required="required"> <option>Select</option>';
                                  if ($n>0){
                                  
                                  foreach($products as $product)
                                          
                                  {$data .= '<option value="'.$product['productId'].'">'.$product['productName'].'</option>';}
                                  $n++;}
                                  else{$data .='<option>Product not found </option>';}
                                  
                                  $data .='</select></div></div>';
                            echo $data;
                                  
                                  ?>
                                  
                                  <div class="form-group">
                                  <label for="moduleId" class="col-sm-3 control-label">Module : <span class="required" style="color:red;">*</span></label>
                                  <div class="col-sm-9"><select id="moduleId" name="ticketmoduleId" class="form-control" required="required" ><option>Select</option>
                                           
                                              </select>
                                          </div></div>
                                   <div class="form-group">
                                  <label for="ticketDescription" class="col-sm-3 control-label">Ticket description : <span class="required" style="color:red;">*</span></label>
                                          <div class="col-sm-9">
                                              <textarea id="ticketDescription" class="form-control" name="ticketDescription"  required="required" > </textarea>
                                          </div>
                                   </div>
                                  
                                  
                                  <div class="form-group">
                                                      <label for="file" class="col-sm-3 control-label">File input</label>
                                                       <div class="col-sm-9">
                                                           <input type="file" id="file" name="file" multiple="multiple">
                                                      <p class="help-block">You can add log files or screenshots</p>
                                                  </div>
                                  </div>
            
                                          <center><input type="submit" class="btn btn-primary" style="width:10%;" name="sendticket" value="Send"/></center>
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
  <script type="text/javascript">
    $.getScript('http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.min.js',function(){
           
  /* dropdown and filter select */
  var select = $('#select3').select3();
  
}); //script         
      
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
<script src="scripts/menu.js"></script>

    </body>

</html>