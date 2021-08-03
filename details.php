<?php
 
 $active='Home';
 include("includes/header.php");
?>

 <div id="content"><!-- #content Begin -->
 <div class="container-fluid"><!-- container Begin -->
     <div class="col-md-12"><!-- col-md-12 Begin -->
         
         <ul class="breadcrumb"><!-- breadcrumb Begin -->
             <li>
                 <a href="index.php">Home</a>
             </li>
             <li>
                 Details
             </li>
             <li>
             <a href="bid.php?p_cat=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
             </li>
             <li> <?php echo $Item_name; ?> </li>    
         </ul><!-- breadcrumb Finish -->
         
     </div><!-- col-md-12 Finish -->
     
     
     
     <div class="col-md-12"><!-- col-md-12 Begin -->
         <div id="productMain" class="row"><!-- row Begin -->
             <div class="col-sm-4"><!-- col-sm-4 Begin -->
                 <div id="mainImage"><!-- #mainImage Begin -->
                     <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                         <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                             <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                             <li data-target="#myCarousel" data-slide-to="1"></li>
                             <li data-target="#myCarousel" data-slide-to="2"></li>
                         </ol><!-- carousel-indicators Finish -->
                         
                         <div class="carousel-inner">
                             <div class="item active">
                                 <center><img class="img-responsive" src="admin_area/product-images/<?php echo $Item_img1; ?>" alt="Product 3-a"></center>
                             </div>
                             <div class="item">
                                 <center><img class="img-responsive" src="admin_area/product-images/<?php echo $Item_img2; ?>" alt="Product 3-b"></center>
                             </div>
                             <div class="item">
                                 <center><img  class="img-responsive" src="admin_area/product-images/<?php echo $Item_img3; ?>" alt="Product 3-c"></center>
                             </div>
                         </div>
                         
                         <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                             <span class="glyphicon glyphicon-chevron-left"></span>
                             <span class="sr-only">Previous</span>
                         </a><!-- left carousel-control Finish -->
                         
                         <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                             <span class="glyphicon glyphicon-chevron-right"></span>
                             <span class="sr-only">Previous</span>
                         </a><!-- right carousel-control Finish -->
                         
                     </div><!-- carousel slide Finish -->
                 </div><!-- mainImage Finish -->
             </div><!-- col-sm-4 Finish -->
             
             <div class="col-sm-8"><!-- col-sm-8 Begin -->
                <div class="box"><!-- box Begin -->
                     <h1 class="text-center"  style="font-weight:bold"><?php echo $Item_name; ?> </h1>
                     <div class="col-md-6">
                     <h4 class="text" style="color:#3d8c3d ; font-weight:bold">Product Minimum bid </h4>    
                     <p><?php echo $Min_bid .' $'; ?> </p>
                     </div>
                     <div class="col-md-6">
                     <h4 style="color:#3d8c3d ;font-weight:bold">Product Current bid </h4>    
                     <p ><?php echo $current_bid .' $'; ?> </p>
                     </div>
                     <div class="col-md-12">
                     <br>
                     </div>      
                     <p class="text-center buttons"><a class='btn btn-primary' href="bid_product.php?Item_id=<?php echo $Item_id ; ?>">Bid Now </a></p>
                         
                </div><!-- box Finish -->
                 
                <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product-images/<?php echo $Item_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product-images/<?php echo $Item_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product-images/<?php echo $Item_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->
                     
                 </div><!-- row Finish -->
                 
             </div><!-- col-sm-8 Finish -->
             
             
         </div><!-- row Finish -->
         
         <div class="box" id="details" ><!-- box Begin -->
                 
                 <h4 style="font-weight:bold">Product Details</h4>
             
             <p>
                 
             <?php echo $Item_desc; ?>
                 
             </p>
             
                  
                 
             <hr>
             
         </div><!-- box Finish -->
         
         <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                    $get_products = "select * from items order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['Item_id'];
                       
                       $pro_title = $row_products['Item_name'];
                       
                       $pro_img1 = $row_products['Item_img1'];

                       $get_current="select * from item_current where item_id='$pro_id'";

                       $run_current = mysqli_query($con,$get_current);

                       $row_current=mysqli_fetch_array($run_current);

                       $pro_price = $row_current['current_bid'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product same-height'>
                            
                                <a href='details.php?Item_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product-images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3> <a href='details.php?Item_id=$pro_id'> $pro_title </a> </h3>
                                    
                                    <p class='price'> $ $pro_price </p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
         
     </div><!-- col-md-12 Finish -->
     
 </div><!-- container Finish -->
</div><!-- #content Finish -->

    <?php 


    include("includes/footer.php");
    
    ?>
        
       
        <script src="Js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
    </body>
    </html>      