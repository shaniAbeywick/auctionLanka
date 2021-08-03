<?php 


session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<?php 

if(isset($_GET['Item_id'])){
    
    $Item_id = $_GET['Item_id'];
    
    $get_product = "select * from items  where Item_id='$Item_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $cat_id = $row_product['cat_id'];
    
    $Item_name = $row_product['Item_name'];
    
    $Min_bid = $row_product['Min_bid'];
    
    $Item_desc = $row_product['Item_desc'];
    
    $Item_img1 = $row_product['Item_img1'];
    
    $Item_img2 = $row_product['Item_img2'];
    
    $Item_img3 = $row_product['Item_img3'];
    
    $get_p_cat = "select * from categories where cat_id='$cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $cat_title = $row_p_cat['cat_title'];

    $get_current_bid = "select * from item_current where Item_id='$Item_id'";
 
    $run_current_bid = mysqli_query($con,$get_current_bid);

    $row_current_bid = mysqli_fetch_array($run_current_bid);

    $current_bid =$row_current_bid['current_bid'];

    
}

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
 