<?php 

session_start();

if(!isset($_SESSION['user_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap-select-country.min.css">
    <link rel="stylesheet" href="style/bootstrap-select.min.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="Js/jquery.js"></script>
    <script src="Js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>

    
    <title>Welcome to auctionLanka</title>
</head>
<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['user_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['user_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
               
            </div><!-- col-md-6 offer Finish -->
            <div class="col-md-6"><!-- col-md-6 Begin -->
                <ul class="menu">
                   <li><a href="../userRegister.php">Register</a></li>
                   <li><a href="myaccount.php">My Account</a></li>
                   <li>
                   <a href="../checkout.php">
                           
                           <?php 
                           
                           if(!isset($_SESSION['user_email'])){
                       
                                echo "<a href='../checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?>
                           
                       </a>
                   </li>
                </ul>
            </div>
            
        </div>
    </div><!--top finish-->
    <div  id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="img/Logo-auction.png" alt="Logo" class="hidden-xs">
                    <img src="img/Logo-mobile.png" alt="Logo" class="visible-xs">
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Seach</span>
                    <i class="fa fa-search"></i>
                </button>
            </div><!--navbar header-->
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li class="active"  >
                            <a href="../index.php">Home</a>
                            
                        </li>
                        <li  >
                            <a href="../topBid.php">TopBids</a>
                            
                        </li>
                        <li  >
                            <a href="../categories.php">Categories</a>
                            
                        </li>
                        <li >
                            <a href="../bid.php">Bids</a>
                            
                        </li>
                        <li >
                            <a href="../about.php">About Us</a>
                            
                        </li>
                        <li >
                            <a href="../contact.php">Contact Us</a>
                            
                        </li>
                        
                    </ul>
                </div> <!--padding nav-->
               <div class="navbar-collapse collapse right">
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i>
                   </button>
               </div>
               <div class="collapse clearfix" id="search">
                   <form action="results.php" method="get" class="navbar-form">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           <span class="input-group-btn">
                            <button  type="submit" name="search" value="Search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                                </button>
                           </span>
                           
                       </div>
                   </form>
               </div>
            </div>
        </div>
    </div> <!--navbar-default finish-->

    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      My Account
                   </li>
               </ul><!-- breadcrumb Finish -->
               
    </div><!-- col-md-12 Finish -->
    <div class="col-md-3" >
    <?php 
      include("includes/sidebar.php");
    ?> 
    </div> 
    <div id="content" class="container-fluid">  
    <div class="col-md-9"><!-- col-md-12 Begin -->
            
               <div class="box"><!-- box Begin -->
                   
                   <?php
                   
                   if (isset($_GET['mybids'])){
                       include("mybids.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['seller_register'])){

                    $user_session = $_SESSION['user_email'];
        
                    $get_user = "select * from users where user_email='$user_session'";
         
                    $run_user = mysqli_query($con,$get_user);
         
                    $row_user = mysqli_fetch_array($run_user);

                    $user_id = $row_user['user_id'];

                    $sel_seller = "select * from seller_register where user_id='$user_id'";
    
                    $run_seller = mysqli_query($con,$sel_seller);
               
                    $check_seller= mysqli_num_rows($run_seller);
           
                    if($check_seller>0){
                        echo "<script>alert('You already have been registerd as a seller')</script>";
                        echo "<script>window.open('myaccount.php','_self')</script>";
                       
                   }else{
                    include("seller_register.php");
                   }
                   }   
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['sipping_info'])){
                       include("sipping_info.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
                   ?>
                   <?php 
                   
                   if (isset($_GET['add_item'])){
                       include("add_item.php");
                   }
                   
                   ?>
                   <?php 
                   
                   if (isset($_GET['view_items'])){
                       include("view_items.php");
                   }
                   
                   ?>
                   
                
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-12 Finish -->
     </div>
    <?php 
    
    include("includes/footer.php");
    
    ?>
    
        <script src="Js/bootstrap.min.js"></script>
        <script src="Js/bootstrap-select-country.min.js"></script>
        <script src="Js/bootstrap-select.min.js"></script> 
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
    </body>
    </html>                   
<?php } ?>                 