<?php

session_start();
include("includes/db.php");

if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('login.php','_self')</script>";
    
}else{

        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];

        $get_items = "select * from items";
        
        $run_items = mysqli_query($con,$get_items);
        
        $count_items = mysqli_num_rows($run_items);
        
        $get_customers = "select * from users";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);

        $get_sellers = "select * from seller_register";

        $run_sellers = mysqli_query($con,$get_sellers);

        $count_sellers = mysqli_num_rows($run_sellers);
        
        $get_p_categories = "select * from categories";
 
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_bids = "select * from user_bid";
        
        $run_bids = mysqli_query($con, $get_bids);
        
        $count_bids = mysqli_num_rows($run_bids);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="Js/jquery.js"></script>
    <script src="Js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
    <title>auctionLanka Admin Area</title>
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
        <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                <?php
                
                    if(isset($_GET['dashboard'])){
                    
                     include("dashboard.php");
                    
                    }
                    if(isset($_GET['view_products'])){
                        
                        include("view_products.php");

                    }    
                        
                   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");

                   }    
                        
                   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        
                   }
                   if(isset($_GET['insert_p_cat'])){
                        
                    include("insert_p_cat.php");
                    
                   }if(isset($_GET['view_p_cats'])){
                    
                    include("view_p_cats.php");
                    
                   }if(isset($_GET['delete_p_cat'])){
                    
                    include("delete_p_cat.php");
                    
                   }if(isset($_GET['edit_p_cat'])){
                    
                    include("edit_p_cat.php");
                    
                   }
                   if(isset($_GET['insert_slide'])){
                        
                    include("insert_slide.php");
                    
                   }if(isset($_GET['view_slides'])){
                    
                    include("view_slides.php");
                    
                   }if(isset($_GET['delete_slide'])){
                    
                    include("delete_slide.php");
                    
                   }if(isset($_GET['edit_slide'])){
                    
                    include("edit_slide.php");
                    
                   }
                   if(isset($_GET['view_bidders'])){
                        
                    include("view_bidders.php");
                    
                   }if(isset($_GET['delete_bidders'])){
                    
                    include("delete_bidders.php");
                    
                   }
                   if(isset($_GET['view_sellers'])){
                        
                    include("view_sellers.php");
                    
                   }if(isset($_GET['delete_sellers'])){
                    
                    include("delete_sellers.php");
                    
                   }    
                   if(isset($_GET['view_bids'])){
                    
                    include("view_bids.php");
                    
                   }   if(isset($_GET['delete_bids'])){
                    
                    include("delete_bids.php");
                    
                   }
                   if(isset($_GET['view_users'])){
                        
                    include("view_users.php");
                    
                   }if(isset($_GET['delete_user'])){
                    
                    include("delete_user.php");
                    
                   }if(isset($_GET['insert_user'])){
                    
                    include("insert_user.php");
                    
                   }if(isset($_GET['user_profile'])){
                    
                    include("user_profile.php");
                    
                   }
                   if(isset($_GET['reports'])){
                    
                    include("reports.php");
                    
                   }
            
                ?>
                
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->


    <script src="Js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
    
</body>
</html>

<?php
}
?>