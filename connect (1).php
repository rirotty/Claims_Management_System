<?php
include 'User.php';
include 'Connection.php';
include'Product.php';
include'Ticket.php';
include 'Module.php';
 header('Content-Type: text/html;charset=UTF-8');

$con = new Connection(); 
//for users

if(isset($_POST['editprofile'])){

if(!empty($_FILES['picture']['tmp_name'])){
        
    $folder = 'profilepictures/'; 
    $file = basename( $_FILES['picture']['name']); 
    $full_path = $folder.$file;
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $full_path)) { 
        echo "successful upload, we have a file!";
        print_r($_FILES);
        }} 
        else{$full_path='profilepictures/user.png';}
    
    $user = new user($_POST['userId'],$_POST['userName'],$_POST['userFirstname'],$_POST['userLastname'],$_POST['userEmail'],$_POST['userAddress'],'',$_POST['userRole'],$full_path)  ; 
    
    editprofile($user,$con) ; 
}

if(isset($_POST['login'])){
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];
    login($userName,$userPassword,$con) ;            
}
if(isset($_POST['adduser'])) {
    $user = new user(0,$_POST['userName'],$_POST['userFirstname'],$_POST['userLastname'],$_POST['userEmail'],$_POST['userAddress'],$_POST['userPassword'],$_POST['userRole'],0)  ; 
addUser($user,$con);
}

if(isset($_POST['edituser'])){
   
    $user= new user($_POST['userId'],$_POST['userName'],$_POST['userFirstname'],$_POST['userLastname'],$_POST['userEmail'],$_POST['userAddress'],$_POST['userPassword'],$_POST['userRole'],$_POST['userPicture']) ;
 EditUser($user,$con)   ;
}

//for modules

if (isset($_POST['addmodule']))
{
$module = new module(0, $_POST['moduleName']);
addModule($module, $con);
}
 //for products 
if(isset($_POST['addproduct'])) {
    $product = new product(0,$_POST['productName'],$_POST['productDescription'],$_POST['productVersion'], $_POST['productclientId'])  ; 
addProduct($product,$con);
}
//for tickets
if (isset($_POST['sendticket'])){
if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
    $folder = "ticketattachments/"; 
    $file = basename( $_FILES['file']['name']); 
    $full_path = $folder.$file;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $full_path)) { 
        echo "succesful upload, we have a file!";
 }} 
$ticket=new Ticket(0, $_POST['ticketuserId'], $_POST['ticketproductId'], $_POST['ticketmoduleId'], $_POST['ticketDescription'], date('Y-m-d H:i:s'), 0, 'NEW', '0', $full_path, 0);
sendTicket($ticket,$con);

}

if (isset($_POST['editticket'])){
    if($_POST['ticketStatus']=='CLOSED'){
        $date=date('Y-m-d H:i:s');
        $patch=$_POST['ticketPatch'];
    }
    else{$date='';
        $patch='0';}

        $ticket=new Ticket($_POST['ticketId'], $_POST['ticketuserId'], $_POST['ticketproductId'], $_POST['ticketmoduleId'], $_POST['ticketDescription'], $_POST['ticketopeningDate'],$date,$_POST['ticketStatus'],(int)($_POST['ticketassignedTo']), $_POST['ticketAttachment'], $patch);
EditTicket($ticket,$con);
    }
    
    if (isset($_POST['closeticket'])){
        if(!empty($_FILES['file']['tmp_name'])){
        
    $folder = "patches/"; 
   
    $file  = rawurlencode($_FILES["file"]["name"]);

    $full_path = $folder.$file;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $full_path)) { 
        echo "succesful upload, we have a file!";
        print_r($_FILES);
        echo $file;
        }}
 else {$full_path=$_POST['ticketPatch'];}
    
$ticket=new Ticket($_POST['ticketId'], $_POST['ticketuserId'], $_POST['ticketproductId'], $_POST['ticketmoduleId'], $_POST['ticketDescription'], $_POST['ticketopeningDate'],date('Y-m-d H:i:s'),$_POST['ticketStatus'],(int)($_POST['ticketassignedTo']), $_POST['ticketAttachment'],$full_path);
CloseTicket($ticket,$con) ;  
    }




function login($userName,$userPassword ,Connection $con)
{
session_start();
    if(empty($userName)|| empty($userPassword)){
        header('Location:loginform.php?con=notset');
    }
    else{
    $req=$con->getPdo()->prepare("select * from users where userName=:userName and userPassword=:userPassword");
    $req->bindParam(':userName', $userName);
    $req->bindParam(':userPassword', $userPassword);
    $req->execute(); 
    $check = $req->rowCount(); 
    if($check== 1)
    {$check=$req->fetch();
     $_SESSION['userName'] = $check['userName'];
     $_SESSION['userId'] = $check['userId'];
     $_SESSION['userPassword'] = $check['userPassword']; 
     $_SESSION['userRole'] = $check['userRole'];
     $_SESSION['userEmail'] = $check['userEmail'];
     $_SESSION['userAddress'] = $check['userAddress']; 
     $_SESSION['userFirstname'] = $check['userFirstname'];
     $_SESSION['userLastname'] = $check['userLastname'];
     $_SESSION['userPicture'] = $check['userPicture'];
     header('location:index.php');
    }
    else{
        header('Location:loginform.php?cnx=notset');

        }
    }
} 


    

    function editprofile(User $user,  Connection $con){
        session_start();
            $stmt=$con->getPdo()->prepare("UPDATE users SET userFirstname = :userFirstname, 
                userLastname = :userLastname, userEmail = :userEmail, userAddress = :userAddress,
                userPassword = :userPassword, userPicture = :userPicture
                WHERE userName = :userName");                                  
            $stmt->bindParam(':userFirstname',$user->getUserFirstname() , PDO::PARAM_STR);       
            $stmt->bindParam(':userLastname', $user->getUserLastname(), PDO::PARAM_STR);    
            $stmt->bindParam(':userEmail', $user->getUserEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':userAddress', $user->getUserAddress(), PDO::PARAM_STR);
            $stmt->bindParam(':userPassword', $user->getUserPassword(), PDO::PARAM_STR);
            $stmt->bindParam(':userPicture', $user->getUserPicture(), PDO::PARAM_STR);
            $stmt->bindParam(':userName', $user->getUserName(), PDO::PARAM_STR);   
            $stmt->execute();
            $_SESSION['userEmail'] = $user->getUserEmail();
            $_SESSION['userAddress'] = $user->getUserAddress(); 
            $_SESSION['userFirstname'] = $user->getUserFirstname();
            $_SESSION['userLastname'] = $user->getUserLastname();
            $_SESSION['userPassword']=$user->getUserPassword();
            $_SESSION['userPicture']=$user->getUserPicture();
            header("Location: myprofile.php"); 
}
function addUser(User $user, Connection $con)
{
            $sql = ("INSERT INTO users (userName,userPassword,userFirstname,userLastname,UserRole,userEmail,UserAddress) values(?, ?, ?, ? , ? , ? , ? )");
            $req=$con->getPdo()->prepare($sql);
            $req->execute(array($user->getUserName(),$user->getUserPassword(),$user->getUserFirstname(), $user->getUserLastname(), $user->getUserRole() , $user->getUserEmail(), $user->getUserAddress()));
        
            header("Location:viewusers.php");
}


  //available username  
if ((isset($_POST['userName']))  && (!empty($_POST['userName'])))
{
    $sql="SELECT * FROM users WHERE userName='".$_POST['userName']."'";
    $result=$con->getPdo()->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    if($row>0){
        echo '<span class="text-danger"><i class="icon_close"></i>Username not available</span>';
    }
    else {
        echo '<span class="text-success"><i class="icon_check"></i>Username available</span>';
    }
    
}

//view usertable


function ViewUsers(Connection $con)
    {
        $query = $con->getPdo()->prepare("SELECT * FROM users");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
        
    }
// edit user profile    
    function EditUser(User $user, Connection $con){
        
    session_start();
        $stmt=$con->getPdo()->prepare("UPDATE users SET userFirstname = :userFirstname, 
                userLastname = :userLastname,userEmail = :userEmail,  
                userAddress = :userAddress
                WHERE userId = :userId");
        $stmt->bindParam(':userFirstname',$user->getUserFirstname() , PDO::PARAM_STR);       
            $stmt->bindParam(':userLastname', $user->getUserLastname(), PDO::PARAM_STR);    
            $stmt->bindParam(':userEmail', $user->getUserEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':userAddress', $user->getUserAddress(), PDO::PARAM_STR);
            $stmt->bindParam(':userId',$user->getUserId(), PDO::PARAM_STR);   
               
            
            $stmt->execute();
             if ($user->getUserName()==$_SESSION['userName']){
            $_SESSION['userEmail'] = $user->getUserEmail();
            $_SESSION['userAddress'] = $user->getUserAddress(); 
            $_SESSION['userFirstname'] = $user->getUserFirstname();
            $_SESSION['userLastname'] = $user->getUserLastname();
            $_SESSION['userPicture']=$user->getUserPicture();
            header("location:viewusers.php");
         
                }
        
    }
//add new module    

function addModule(Module $module, Connection $con){
  $sql = ("INSERT INTO modules (moduleName) VALUES(?)");
            $req=$con->getPdo()->prepare($sql);
            $req->execute(array($module->getModuleName())); 
            header("location:modules.php");
    
}
    
//view module table
function ViewModules(Connection $con)
    {
        $query = $con->getPdo()->prepare("SELECT * FROM modules");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
        
    }
    //add new product
    function addproduct(Product $product, Connection $con){
      $sql = ("INSERT INTO products (productName,productDescription,productVersion,productclientId) values(?,?,?,?)");  
       $req=$con->getPdo()->prepare($sql);
       $req->execute(array($product->getProductName(),$product->getProductDescription(),$product->getProductVersion(),$product->getProductclientId())); 
        
$productId=$con->getPdo()->lastInsertId();
$productIdint=(int) $productId;
 foreach (($_POST['modules']) as $module) 
 {
     $moduleIdint=(int) $module;
     $rq = "INSERT INTO product_module (productId, moduleId) VALUES ('$productIdint','$moduleIdint')"; 
       $rep=$con->getPdo()->prepare($rq);
       $rep->execute(array());  

 
 }
 
 header("Location:products.php");
    }
    
//view product table    
 function ViewProducts (Connection $con)
 {
     
 $query = $con->getPdo()->prepare("SELECT DISTINCT * FROM (products JOIN product_module ON products.productId=product_module.productId JOIN modules ON product_module.moduleId=modules.moduleId) ORDER BY products.productId");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
       
}
 
//client list
/*if (isset($_POST['query'])){
    $output='';
    $query="SELECT * FROM users WHERE (userRole='CLIENT') and (userName LIKE'%".$_POST['query']."' OR userFirstname LIKE'%".$_POST['query']."' OR userLastname LIKE'%".$_POST['query']."') ";

    $result=$con->getPdo()->prepare($query);
    $result->execute();
    $output='<ul class="list-unstyled">';
    if(($result->rowCount())>0){
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            $output .='<li>'.$row["userFirstname"].' '.$row['userLastname'].' </li>';
        }
        
    }
    else {
        $output .='<li>Client not found </li>';
    }

    $output.='</ul>';
    echo $output;
    } */

function ViewClients(Connection $con){
$query = $con->getPdo()->prepare("SElECT * FROM users WHERE userRole='CLIENT'");
$query->execute();
        $res = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
        }
        return $res;
    
}
function ViewClientProducts(Connection $con,$client){
    
    {
    $client=$_SESSION['userId'];
     
 $query = $con->getPdo()->prepare('SELECT * FROM products WHERE productclientId='.(int)($client).' ');
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    return $data;}
       
}

if(isset($_GET["productId"]) && !empty($_GET["productId"])){
    $productId=(int)$_GET['productId'];

    $query = $con->getPdo()->prepare('SELECT * FROM ((products JOIN product_module ON products.productId=product_module.productId JOIN modules ON product_module.moduleId=modules.moduleId)) WHERE product_module.productId= '.$productId.'');
    
    $query->execute();
    $rowCount =count($query);
    
    if($rowCount > 0){
        echo '<option value="">Select</option>';
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
            echo '<option value="'.$row['moduleId'].'">'.$row['moduleName'].'</option>';
        }
    }else{
        echo '<option value="">Module not available</option>';
     }
    
}
//send a ticket
function sendTicket(Ticket $ticket,  Connection $con) {
    

$sql = "INSERT INTO tickets (ticketId, ticketuserId, ticketproductId, ticketmoduleId, ticketDescription, ticketopeningDate, ticketclosingDate, ticketStatus, ticketassignedTo, ticketAttachment,ticketPatch) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
 
$req=$con->getPdo()->prepare($sql);
$req->execute(array($ticket->getTicketId(),$ticket->getTicketuserId(),$ticket->getTicketproductId(),$ticket->getTicketmoduleId(),$ticket->getTicketDescription(),$ticket->getTicketopeningDate(),$ticket->getTicketclosingDate(),$ticket->getTicketStatus(),$ticket->getTicketassignedTo(),$ticket->getTicketAttachment(),$ticket->getTicketPatch()));
echo "<script>alert('Successfully Sent!!!'); window.location='tickets.php'</script>";

}
//show all tickets to admin
function AdminTicket(Connection $con){
   $query = $con->getPdo()->prepare('SELECT * FROM (tickets JOIN products ON ( tickets.ticketuserId=products.productclientId AND tickets.ticketproductId=products.productId) JOIN modules ON tickets.ticketmoduleId=modules.moduleId JOIN users ON tickets.ticketuserId=users.userId)');
   $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    
    
    
    
}
//select a client tickets
function ClientTicket(Connection $con){
   
    
       $query = $con->getPdo()->prepare('SELECT * FROM (tickets JOIN products ON ( tickets.ticketuserId=products.productclientId AND tickets.ticketproductId=products.productId) JOIN modules ON tickets.ticketmoduleId=modules.moduleId JOIN users ON tickets.ticketuserId=users.userId)WHERE tickets.ticketuserId='.$_SESSION['userId'].'');
       $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    
}
//select all tickets assigned to a developer
function DeveloperTicket(Connection $con){
   
    
       $query = $con->getPdo()->prepare('SELECT * FROM (tickets JOIN products ON ( tickets.ticketuserId=products.productclientId AND tickets.ticketproductId=products.productId) JOIN modules ON tickets.ticketmoduleId=modules.moduleId JOIN users ON tickets.ticketuserId=users.userId)WHERE tickets.ticketassignedTo='.$_SESSION['userId'].'');
       $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    
}
//view developers
function ViewDevelopers(Connection $con){
$query = $con->getPdo()->prepare("SElECT * FROM users WHERE userRole='DEVELOPER'");
$query->execute();
        $res = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
        }
        return $res;
    
}
//admin edits ticket
function EditTicket(Ticket $ticket, Connection $con){
        $stmt=$con->getPdo()->prepare("UPDATE tickets SET ticketId = :ticketId , 
                ticketuserId = :ticketuserId ,ticketproductId = :ticketproductId ,  
                ticketmoduleId = :ticketmoduleId ,ticketStatus = :ticketStatus ,
                ticketDescription = :ticketDescription ,ticketopeningDate = :ticketopeningDate ,
                ticketclosingDate = :ticketclosingDate ,ticketAttachment = :ticketAttachment ,
                ticketPatch = :ticketPatch , ticketassignedTo = :ticketassignedTo WHERE ticketId = :ticketId");
        $stmt->bindParam(':ticketId',$ticket->getTicketId() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketuserId',$ticket->getTicketuserId() , PDO::PARAM_STR);       
        $stmt->bindParam(':ticketproductId',$ticket->getTicketproductId() , PDO::PARAM_STR);      
        $stmt->bindParam(':ticketmoduleId',$ticket->getTicketmoduleId() , PDO::PARAM_STR);    
        $stmt->bindParam(':ticketStatus',$ticket->getTicketStatus() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketDescription',$ticket->getTicketDescription() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketopeningDate',$ticket->getTicketopeningDate() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketclosingDate',$ticket->getTicketclosingDate() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketAttachment',$ticket->getTicketAttachment() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketPatch',$ticket->getTicketPatch() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketassignedTo',$ticket->getTicketassignedTo() , PDO::PARAM_STR);
        $stmt->execute();
            header("location:tickets.php");
         
                }
// developer closes ticket
function CloseTicket(Ticket $ticket, Connection $con){
        $stmt=$con->getPdo()->prepare("UPDATE tickets SET ticketId = :ticketId , 
                ticketuserId = :ticketuserId ,ticketproductId = :ticketproductId ,  
                ticketmoduleId = :ticketmoduleId ,ticketStatus = :ticketStatus ,
                ticketDescription = :ticketDescription ,ticketopeningDate = :ticketopeningDate ,
                ticketclosingDate = :ticketclosingDate ,ticketAttachment = :ticketAttachment ,
                ticketPatch = :ticketPatch , ticketassignedTo = :ticketassignedTo WHERE ticketId = :ticketId");
        $stmt->bindParam(':ticketId',$ticket->getTicketId() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketuserId',$ticket->getTicketuserId() , PDO::PARAM_STR);       
        $stmt->bindParam(':ticketproductId',$ticket->getTicketproductId() , PDO::PARAM_STR);      
        $stmt->bindParam(':ticketmoduleId',$ticket->getTicketmoduleId() , PDO::PARAM_STR);    
        $stmt->bindParam(':ticketStatus',$ticket->getTicketStatus() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketDescription',$ticket->getTicketDescription() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketopeningDate',$ticket->getTicketopeningDate() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketclosingDate',$ticket->getTicketclosingDate() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketAttachment',$ticket->getTicketAttachment() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketPatch',$ticket->getTicketPatch() , PDO::PARAM_STR);
        $stmt->bindParam(':ticketassignedTo',$ticket->getTicketassignedTo() , PDO::PARAM_STR);
        $stmt->execute();
            header("location:tickets.php");
         
                } 
                
                

//functions for the reports

function CountTime(Connection $con){
 $stmt=$con->getPdo()->prepare("SELECT * FROM tickets WHERE ticketStatus='CLOSED'");
 $stmt->execute();
 $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
        }
        return $res;
         
}
          
          function ticketPayable($con)
          {$a=$con->getPdo()->prepare("SELECT * FROM tickets JOIN modules ON tickets.ticketmoduleId=modules.moduleId WHERE moduleName='Payables'");
          $a->execute();
          $res = array();
          while ($row = $a->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
          }
          return $res;
          }
          
          function ticketTreasury(Connection $con)
          {$b=$con->getPdo()->prepare("SELECT * FROM tickets JOIN modules ON tickets.ticketmoduleId=modules.moduleId WHERE moduleName='Treasury'");
          $b->execute();
          $res = array();
          while ($row = $b->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
          }
          return $res;
          }
          
          function ticketReceavables(Connection $con)
          {$c=$con->getPdo()->prepare("SELECT * FROM tickets JOIN modules ON tickets.ticketmoduleId=modules.moduleId WHERE moduleName='Receavables'");
          $c->execute();
          $res = array();
          while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
          }
          return $res;
          }
          
          function ticketTotal(Connection $con)
          {$d=$con->getPdo()->prepare("SELECT * FROM tickets");
          $d->execute();
          $res = array();
          while ($row = $d->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
        }
          
        return $res;
          }
          
          function ticketNew(Connection $con){
          $query=$con->getPdo()->prepare("SELECT * FROM tickets WHERE ticketStatus='NEW'");
          $query->execute();
          $res = array();
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
              
          }
          return $res;
          }
          
          
          function ticketPending(Connection $con){
          $query=$con->getPdo()->prepare("SELECT * FROM tickets WHERE ticketStatus='PENDING'");
          $query->execute();
          $res = array();
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
              
          }
          return $res;
          }
          
          function ticketClosed(Connection $con){
          $query=$con->getPdo()->prepare("SELECT * FROM tickets WHERE ticketStatus='CLOSED'");
          $query->execute();
          $res = array();
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $row;
              
          }
          return $res;
          }
          
          
          
          
          
          
          
          
                
        
    