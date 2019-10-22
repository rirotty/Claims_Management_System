<?php 
      include"connect.php";
     session_start();
?>

<html>
    <head>
        <title>Ticket Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </head>
    <body>


                  
                      <section class="panel">
                          <header class="panel-heading">
                              <h2>Ticket Details </h2>
                          </header>
            <div class="panel-body bio-graph-info">
                                        
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Ticket ID </span> : <?php echo $_GET['ticketId']?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Client </span> : <?php echo $_GET['userName']?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Product </span> : <?php echo $_GET['productName']?></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span>Module</span> : <?php echo $_GET['moduleName']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Description</span>: <?php echo $_GET['ticketDescription']?></p>
                                              </div>
                                   
                                              <div class="bio-row">
                                                  <p><span>Status </span> : <?php if ($_GET['ticketStatus']=='NEW'){echo '<span class="label label-danger">'.$_GET['ticketStatus'].'</span>';}
                                                  elseif ($_GET['ticketStatus']=='PENDING'){echo '<span class="label label-warning">'.$_GET['ticketStatus'].'</span>';}
                                                  elseif ($_GET['ticketStatus']=='CLOSED'){echo '<span class="label label-success">'.$_GET['ticketStatus'].'</span>';}

                                                  ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Assigned to</span> : <?php echo $_GET['ticketassignedTo']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Opening Date </span> : <?php echo $_GET['ticketopeningDate']?></p>
                                              <br>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Closing Date </span> : <?php echo $_GET['ticketclosingDate']?></p>
                                              <br>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Attachment </span> : <?php echo '  '; echo ' <a href="'.$_GET['ticketAttachment'].'" onclick="return openWindow(this.href)">View </a> ';?></p>
                                              <br>
                                              </div>
                                              
                                              
                                              
                                          </div>      
            
            
            </div>
     </section>
     
           

            
   <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script> 
  <!-- javascripts -->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/main.js"></script>
    
    </body>
</html>
