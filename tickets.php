<?php 
 include 'connect.php';
 session_start();
?>

<html style="overflow:auto;">
    <head>
        <title>Tickets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS --> 
    <link rel='stylesheet prefetch' href='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" href="css/menu.css">
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
    <link href="css/bootstrap-sortable.css" rel="stylesheet" type="text/css">

    </head>
    <body style="font-size: 1.2vw ;">
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
                              <h2>Tickets</h2>
                            <?php if ($_SESSION['userRole']=='CLIENT') {echo'<div align="right" style="position:relative;bottom:30px;">
                            <a href="sendticket.php" class="label label-primary" style="width:15%;" >New ticket</a></div>'; }?>
                                 </div>

                          <div class="panel-body">
<?php  $data='<table class=" table sortable" style="font-size: 1.2vw ;"> <thead> <tr>
                                  <th data-defaultsign="_19">Ticket Id </th>
                                  <th data-defaultsign="AZ"> Client Name  </th>
                                  <th data-defaultsign="AZ">Product Name </th>
                                  <th data-defaultsign="AZ">Module Name </th>
                                  <th data-defaultsign="AZ">Ticket Description </th>
                                  <th data-defaultsign="AZ">Ticket Status </th>
                                  <th data-defaultsign="AZ">Assigned To </th>
                                  <th data-defaultsign="month">Opening Date </th>
                                  <th data-defaultsign="month">Closing Date </th>
                                  <th>Attachment </th>
                                  <th>Patch </th>';
                                  if($_SESSION['userRole']!=='CLIENT'){$data.='<th>Edit</th>';}

                                  $data.='<th>View</th></tr> </thead>';

    if($_SESSION['userRole']=='ADMIN'){
    $tickets=AdminTicket($con);
                         if (count($tickets)>0){
                             $number=1;
                             foreach ($tickets as $ticket){
         
        $data.='<tbody><tr>
        <td>'.$ticket['ticketId'].'</td>
        <td value="'.$ticket['ticketuserId'].'">'.$ticket['userName'].'</td>
        <td value="'.$ticket['ticketproductId'].'">'.$ticket['productName'].'</td>
        <td value="'.$ticket['ticketmoduleId'].'">'.$ticket['moduleName'].'</td>
        <td>'.$ticket['ticketDescription'].'</td>';
        if ($ticket['ticketStatus']=='NEW'){$data.='<td><span class="label label-danger">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='PENDING'){$data.='<td><span class="label label-warning">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='CLOSED'){$data.='<td><span class="label label-success">'.$ticket['ticketStatus'].'</span></td>';}

        
        $data.='<td>'.$ticket['ticketassignedTo'].'</td>
        <td>'.$ticket['ticketopeningDate'].'</td>
        <td>'.$ticket['ticketclosingDate'].'</td>
        <td><a href="'.$ticket['ticketAttachment'].'" onclick="return openWindow(this.href)">View the attachment </a></td>
        <td><a href="'.$ticket['ticketPatch'].'" onclick="return openWindow(this.href)">View the patch </a></td>';
            if ($_SESSION['userRole']!=='CLIENT')
        {if( $ticket['ticketStatus']=='CLOSED'){                $data.='<td><a href="" class="label label-primary" >Edit</a></td>';}
                             else {$data.='<td><a href="admineditticket.php?ticketuserId='.$ticket['ticketuserId'].'&ticketId='.$ticket['ticketId'].'&ticketproductId='.$ticket['ticketproductId'].'&ticketmoduleId='.$ticket['ticketmoduleId'].'&ticketDescription='.$ticket['ticketDescription'].'&ticketStatus='.$ticket['ticketStatus'].'&ticketassignedTo='.$ticket['ticketassignedTo'].'&ticketopeningDate='.$ticket['ticketopeningDate'].'&ticketclosingDate='.$ticket['ticketclosingDate'].'&ticketAttachment='.$ticket['ticketAttachment'].'" class="label label-primary" style="">Edit</a></td>';}
        $data.='<td><a href="viewticket.php?userName='.$ticket['userName'].'&ticketId='.$ticket['ticketId'].'&productName='.$ticket['productName'].'&moduleName='.$ticket['moduleName'].'&ticketDescription='.$ticket['ticketDescription'].'&ticketStatus='.$ticket['ticketStatus'].'&ticketassignedTo='.$ticket['ticketassignedTo'].'&ticketopeningDate='.$ticket['ticketopeningDate'].'&ticketclosingDate='.$ticket['ticketclosingDate'].'&&ticketAttachment='.$ticket['ticketAttachment'].'" class="label label-primary" onclick="return openWindow(this.href)">View </a> </td></tr></tbody>';}
                $number++;
               
                
                             }
                         }
                else {$data .= '<tbody><tr><td colspan="6">Records not found!</td></tr></tbody>';}                  
                      $data .= '</table>';
 
    echo $data;}
    else if($_SESSION['userRole']=='DEVELOPER'){
    $tickets=DeveloperTicket($con);
                         if (count($tickets)>0){
                             $number=1;
                             foreach ($tickets as $ticket){
         
        $data.='<tbody><tr>
        <td>'.$ticket['ticketId'].'</td>
        <td value="'.$ticket['ticketuserId'].'">'.$ticket['userName'].'</td>
        <td value="'.$ticket['ticketproductId'].'">'.$ticket['productName'].'</td>
        <td value="'.$ticket['ticketmoduleId'].'">'.$ticket['moduleName'].'</td>
        <td>'.$ticket['ticketDescription'].'</td>';
        if ($ticket['ticketStatus']=='NEW'){$data.='<td><span class="label label-danger">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='PENDING'){$data.='<td><span class="label label-warning">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='CLOSED'){$data.='<td><span class="label label-success">'.$ticket['ticketStatus'].'</span></td>';}

        
        $data.='<td>'.$ticket['ticketassignedTo'].'</td>
        <td>'.$ticket['ticketopeningDate'].'</td>
        <td>'.$ticket['ticketclosingDate'].'</td>
        <td><a href="'.$ticket['ticketAttachment'].'" onclick="return openWindow(this.href)">View the attachment </a></td>
        <td><a href="'.iconv('Cp1256', 'UTF-8',$ticket['ticketPatch']).'"download>View the patch </a></td>';
            if ($_SESSION['userRole']!=='CLIENT')
        {  if( $ticket['ticketStatus']=='CLOSED'){                $data.='<td><a href="" class="label label-primary" >Edit</a></td>';}
                             else {$data.='<td><a href="developereditticket.php?ticketuserId='.$ticket['ticketuserId'].'&ticketId='.$ticket['ticketId'].'&ticketproductId='.$ticket['ticketproductId'].'&ticketmoduleId='.$ticket['ticketmoduleId'].'&ticketDescription='.$ticket['ticketDescription'].'&ticketStatus='.$ticket['ticketStatus'].'&ticketassignedTo='.$ticket['ticketassignedTo'].'&ticketopeningDate='.$ticket['ticketopeningDate'].'&ticketclosingDate='.$ticket['ticketclosingDate'].'&ticketAttachment='.$ticket['ticketAttachment'].'" class="label label-primary" style="">Edit</a></td>';}}
        $data.='<td><a href="viewticket.php?userName='.$ticket['userName'].'&ticketId='.$ticket['ticketId'].'&productName='.$ticket['productName'].'&moduleName='.$ticket['moduleName'].'&ticketDescription='.$ticket['ticketDescription'].'&ticketStatus='.$ticket['ticketStatus'].'&ticketassignedTo='.$ticket['ticketassignedTo'].'&ticketopeningDate='.$ticket['ticketopeningDate'].'&ticketclosingDate='.$ticket['ticketclosingDate'].'&&ticketAttachment='.$ticket['ticketAttachment'].'" class="label label-primary" onclick="return openWindow(this.href)">View </a> </td></tr></tbody>';
                $number++;
               
                
                             }
                         }
                else {$data .= '<tbody><tr><td colspan="6">Records not found!</td></tr></tbody>';}                  
                      $data .= '</table>';
 
    echo $data;}
    
    else if ($_SESSION['userRole']=='CLIENT'){
        
        $tickets=ClientTicket($con);
                         if (count($tickets)>0){
                             $number=1;
                             foreach ($tickets as $ticket){
         
        $data.='<tbody><tr>
        <td>'.$ticket['ticketId'].'</td>
        <td>'.$ticket['userName'].'</td>
        <td>'.$ticket['productName'].'</td>
        <td>'.$ticket['moduleName'].'</td>
        <td>'.$ticket['ticketDescription'].'</td>';
        if ($ticket['ticketStatus']=='NEW'){$data.='<td><span class="label label-danger">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='PENDING'){$data.='<td><span class="label label-warning">'.$ticket['ticketStatus'].'</span></td>';}
        else if ($ticket['ticketStatus']=='CLOSED'){$data.='<td><span class="label label-success">'.$ticket['ticketStatus'].'</span></td>';}

        
        $data.='<td>'.$ticket['ticketassignedTo'].'</td>
        <td>'.$ticket['ticketopeningDate'].'</td>
        <td>'.$ticket['ticketclosingDate'].'</td>
        <td><a href="'.$ticket['ticketAttachment'].'" onclick="return openWindow(this.href)">View the attachment </a></td>
        <td><a href="'.$ticket['ticketPatch'].'" download>View the patch </a></td>
        <td><a href="viewticket.php?userName='.$ticket['userName'].'&ticketId='.$ticket['ticketId'].'&productName='.$ticket['productName'].'&moduleName='.$ticket['moduleName'].'&ticketDescription='.$ticket['ticketDescription'].'&ticketStatus='.$ticket['ticketStatus'].'&ticketassignedTo='.$ticket['ticketassignedTo'].'&ticketopeningDate='.$ticket['ticketopeningDate'].'&ticketclosingDate='.$ticket['ticketclosingDate'].'&&ticketAttachment='.$ticket['ticketAttachment'].'" class="label label-primary" onclick="return openWindow(this.href)">View </a> </td>';
        
        $data.='</tr></tbody>';
                $number++;
               
                             }
                         
                         }
                else {$data .= '<tbody><tr><td colspan="6">Records not found!</td></tr></tbody>';}                  
                      $data .= '</table>';
 
    echo $data;
      
    }


?>
                              
                              
                              
                                                
                         
                              
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
  <script src="scripts/bootstrap-sortable.js"></script>
  <script language="javascript" type="text/javascript">
function openWindow(href) {
  window.open(href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=500,height=370');
  return false;
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src='http://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js'></script>

    <script src="scripts/menu.js"></script>
    
    </body>
</html>