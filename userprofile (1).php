<?php 
      include"connect.php";
     session_start();
?>

<html>
    <head>
        <title>User profile</title>
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
                              <h2>User profile </h2>
                          </header>
            <div class="panel-body bio-graph-info">
                                        
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>User Id </span>: <?php echo $_GET['userId']?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>User username </span>: <?php echo $_GET['userName']?></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span>User role</span>:<?php echo $_GET['userRole']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>User first name</span>:<?php echo $_GET['userFirstname']?></p>
                                              </div>
                                   
                                              <div class="bio-row">
                                                  <p><span>User last name </span>: <?php echo $_GET['userLastname']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>User e-mail </span>: <?php echo $_GET['userEmail']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>User address </span>:<?php echo $_GET['userAddress']?></p>
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
