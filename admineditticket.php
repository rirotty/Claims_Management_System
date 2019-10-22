<?php 
 include 'connect.php';
 session_start();
?>

<html>
    <head>
        <title>Edit Ticket</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body style="overflow: auto;">
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
              <a href="logout.php" onclick="togglesubmenu();">
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
                <li><a href="#"><i class="arrow_right-up">  </i>Logout</a></li>
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
            <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-heading">
                              <h2>Edit Ticket</h2>
                          </div>
                          <div class="panel-body">
                              
                              
                              <form class="form-horizontal " method="POST">
                                          
                                          <div class="form-group">
                                          <label class="col-sm-3 control-label" for="ticketId">Ticket ID:</label>
                                          <div class="col-sm-9">
                                              <input type="text" id="ticketId" class="form-control" name="ticketId" value="<?php echo $_GET['ticketId'] ;?>" readonly />
                                          </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="ticketuserId" class="col-sm-3 control-label">Client Id :</label>
                                          <div class="col-sm-9">
                                              <input type="text" id="ticketuserId" class="form-control" name="ticketuserId" value="<?php echo $_GET['ticketuserId'] ;?>" readonly />
                                   
                                          </div>
                                          </div>
                                  
                                          <div class="form-group">
                                          <label for="ticketproductId" class="col-sm-3 control-label">ProductId :</label>
                                          <div class="col-sm-9">
                                              <input type="text" id="ticketproductId" class="form-control" name="ticketproductId" value="<?php echo $_GET['ticketproductId'] ;?>" readonly/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="ticketmoduleId" class="col-sm-3 control-label">Module :</label>
                                          <div class="col-sm-9">
                                              <input id="ticketmoduleId" type="text" class="form-control" name="ticketmoduleId" value="<?php echo $_GET['ticketmoduleId'] ;?>" readonly/>
                                              
                                          </div>
                                          </div>
                                  
                                          <div class="form-group">
                                          <label for="ticketDescription" class="col-sm-3 control-label">Description : </label>
                                          <div class="col-sm-9">
                                              <textarea id="ticketDescription" class="form-control m-bot15" name="ticketDescription" readonly><?php echo $_GET['ticketDescription']?></textarea>

                                                 
                                                                                   </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="ticketStatus" class="col-sm-3 control-label">Status :</label>
                                          <div class="col-sm-9">
                                          <select id="ticketStatus" class="form-control" name="ticketStatus" >
                                              <option value="NEW">NEW</option>
                                              <option value="PENDING">PENDING</option>
                                              <option value="CLOSED">CLOSED</option>
                                          </select>
                                          </div>
                                          </div>
                                  <div class="form-group" id="message">
                                          <label for="ticketPatch" class="col-sm-3 control-label">Message :</label>
                                          <div class="col-sm-9">
                                          <input id="ticketPatch" type="text" class="form-control" name="ticketPatch"/>

                                          </div>
                                          </div>
                                          
                                          <?php
                                   $developers=ViewDevelopers($con);
                                  $n=count($developers);   
                               $res= '<div class="form-group">
                                  <label for="select3" class="col-sm-3 control-label">Assigned to : </label>
                                          <div class="col-sm-9">
                                             
                                              <select name="ticketassignedTo" class="form-control" id="select3"><option value="">Search agents</option>';
                                       if ($n>0){
                                       $num=1;       
                              foreach ($developers as $developer) 
                            {$res .='<option value="'.$developer['userId'].'">'.$developer['userName'].'</option>';
                                       $num++;}}
                                       else {$res .='<option value="Please add developers first">Please add agents first</option>';}
                                              $res .='</select></div></div><br>';
                                          
                              echo $res;
                                              ?>
                                          
                                          <div class="form-group">
                                          <label for="ticketopeningDate" class="col-sm-3 control-label">Opening Date :</label>
                                          <div class="col-sm-9">
                                          <input id="ticketopeningDate" type="text" class="form-control" name="ticketopeningDate" value="<?php echo $_GET['ticketopeningDate'] ;?>"/>
                                          </div>
                                          </div>
                                          
                                          <div class="form-group">
                                          <label  class="col-sm-3 control-label">Attachment :</label>
                                          <div class="col-sm-9">
                                          <?php echo'<a href="'.$_GET['ticketAttachment'].'" onclick="return openWindow(this.href)"> <input name="ticketAttachment" type=text value="'.$_GET['ticketAttachment'].'" placeholder="Attachment" readonly> </a>' ?>
                                          </div>
                                          </div>
                                          <br>



                                          <center><input type="submit" class="btn btn-primary"  name="editticket" value="Save"/></center>
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
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

  <script type="text/javascript">
  $('select').select2();
</script> 
<script language="javascript" type="text/javascript">
function openWindow(href) {
  window.open(href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=500,height=370');
  return false;
}
</script>
<script type="text/javascript">
$(document).ready(function () {
    toggleFields();
    $("#ticketStatus").change(function () {
        toggleFields();
    });

});

function toggleFields() {
    if ($("#ticketStatus").val() === "CLOSED")
        $("#message").show();
    else
 $("#message").hide();
}
    </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
<script src="scripts/menu.js"></script>    
    </body>
</html>