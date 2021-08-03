<?php
 
 $active='Home';
 include("includes/header.php");

 ?>
 <?php 
    
    $session_email = $_SESSION['user_email'];
    
    $select_customer = "select * from users where user_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $user_id = $row_customer['user_id'];
    
    ?>
  
    
    
    <div id="content"><!-- #content Begin -->
    <div class="container-fluid"><!-- container Begin -->
    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Bid
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
                     <h1 class="text-center" style="font-weight:bold"> <?php echo $Item_name; ?> </h1>
                     <hr> </hr>
                     <div class="col-md-3">
                     <h4  style="color:#3d8c3d ; font-weight:bold" >Product Minimum bid  : </h4> 
                     </div> 
                     <div class="col-md-3">  
                     <h4 class=" text-left" > <?php echo $Min_bid .' $'; ?> </h4>
                     </div>
                     <div class="col-md-3">
                     <h4 style="color:#3d8c3d ;font-weight:bold">Product Current bid : </h4>  
                     </div> 
                     <div class="col-md-3"> 
                     <h4 class=" text-left" ><?php echo $current_bid .' $'; ?> </h4>
                     </div>
                     <hr> </hr>
                     <?php add_bid(); ?>
                     <form action="bid_product.php?add_item=<?php echo $Item_id ;?> & add_user=<?php echo $user_id ; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-4 control-label "><h3 style="color:red ; font-weight:bold " >Enter Your bid :</h3></label>
                                   <div class="col-md-5"><!-- col-md-7 Begin -->
                                   <h3 >  <input name="bid_value" type="text" class="form-control" required> </h3>
                                   
                                    </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->     
                          
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label"></label> 
                                   <div class="col-md-2 "><!-- col-md-7 Begin -->
                                   <p class="text-center buttons"><button class="btn btn-primary "> Place Your Bid</button></p>
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->     
                     </form><!-- form-horizontal Finish --> 
                </div><!-- box Finish -->
             </div><!-- col-sm-8 Finish -->
         </div><!-- row Finish -->
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

<?php

  
     
?>    