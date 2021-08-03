<?php 

session_start();

if(!isset($_SESSION['user_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['Item_id'])){

    
    $item_id = $_GET['Item_id'];
    $get_p = "select * from items where Item_id='$item_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['Item_id'];
        
        $p_title = $row_edit['Item_name'];
        
        $cat = $row_edit['cat_id'];
        
        $p_image1 = $row_edit['Item_img1'];
        
        $p_image2 = $row_edit['Item_img2'];
        
        $p_image3 = $row_edit['Item_img3'];
        
        $p_price = $row_edit['Min_bid'];
        
        $p_keywords = $row_edit['Item_keywords'];
        
        $p_desc = $row_edit['Item_desc'];

        
        
    
        
    }
        
        $get_p_cat = "select * from categories where cat_id='$cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['cat_title'];

        $user_session = $_SESSION['user_email'];
        
        $get_user = "select * from users where user_email='$user_session'";
             
        $run_user = mysqli_query($con,$get_user);
             
        $row_user = mysqli_fetch_array($run_user);

        $user_id= $row_user['user_id'];
    
    


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
    <div id="content"><!-- #content Begin -->
    <div class="container-fluid"><!-- container Begin -->

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
    <div class="col-md-9"><!-- col-md-9 Begin -->
               
    <div class="box"><!-- box Begin -->
      <h1 align="center"> Edit your Item</h1>
      <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item name</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['cat_id'];
                                  $p_cat_title = $row_p_cats['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="../admin_area/product-images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="../admin_area/product-images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="../admin_area/product-images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Minimum Bid </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Item Description </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->

            </div><!-- box Finish -->
               
        </div><!-- col-md-9 Finish -->
               
    </div><!-- container Finish -->
</div><!-- #content Finish --> 
<?php 
    
    include("includes/footer.php");
    
    ?>
    
        <script src="Js/bootstrap.min.js"></script>
        <script src="Js/bootstrap-select-country.min.js"></script>
        <script src="Js/bootstrap-select.min.js"></script> 
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
    </body>
    </html> 
    
    <?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $Min_bid = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"../admin_area/product-images/$product_img1");
    move_uploaded_file($temp_name2,"../admin_area/product-images/$product_img2");
    move_uploaded_file($temp_name3,"../admin_area/product-images/$product_img3");
    
    $update_product = "update items set cat_id='$cat',user_id='$user_id',date=NOW(),Item_name='$product_title',Item_img1='$product_img1',Item_img2='$product_img2',Item_img3='$product_img3',Min_bid='$Min_bid',
    Item_keywords='$product_keywords',Item_desc='$product_desc' where Item_id='$item_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your product has been updated Successfully')</script>"; 
        
       echo "<script>window.open('myaccount.php?view_items','_self')</script>"; 
        
    }
    
}

?>    
<?php } ?>         