<?php
 
 $active='Home';
 include("includes/header.php");
 
 ?>
    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Register
                   </li>
               </ul><!-- breadcrumb Finish -->
               
    </div><!-- col-md-12 Finish -->
    <div id="content" class="container">
    
        <div class="col-md-12">  <!-- col-md-12 Begin -->
  
           
           <?php 
           
           if(!isset($_SESSION['user_email'])){
               
               include("customer/user_login.php");
               
           }else{
               
            echo "<script>window.open('customer/myaccount.php','_self')</script>";
               
           }
           
           ?>
           
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
    