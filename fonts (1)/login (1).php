<?php
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

      <div class="container">
         
      
 <br>
          <br>
          <br>
          <form class="login-form" action="connect.php" method="post">        
              <div class="logo"><center><img alt="" src="css/Uniq.png" width="150"></center></div>
              <br>
              <div class="login-form-heading">
      <h3 align="center" style="color:#1D3557;font-size: 25px;"><b> Customer Support Portal </b> </h3> </div>
                
                <div class="login-wrap">
           
            
            <p class="login-img"><i class="icon_lock_alt" style="color:#fff;"></i></p>
            <center> <h2 style="color:#1D3557;"><b>LOGIN</b></h2></center>
            <br>
            <div>
               <?php  if(isset($_GET['cnx'])){
                        echo " <p align='right' style='color:red;'>Unknown Account</p>" ; 
                }  ?> 
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="userName" placeholder="Username" autofocus >
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="userPassword" placeholder="Password">
            </div>
            
            <center><button class="btn btn-primary btn-lg btn-block" name="login" type="submit" value="Next">Next</button></center>
        </div>
      </form>

    </div>


  </body>
</html>
