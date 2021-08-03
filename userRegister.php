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
    
    <div class="col-md-12"><!-- col-md-12 Begin -->

    <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Register</h2>
                       </center><!-- center Finish -->
                       
                       <form action="userRegister.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>First Name</label>
                               
                               <input type="text" class="form-control" name="c_fname" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Last Name</label>
                               
                               <input type="text" class="form-control" name="c_lname" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Email Address</label>
                               
                               <input type="text" class="form-control" name="c_email" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Confirm Email Address</label>
                               
                               <input type="text" class="form-control" name="c_confirm_email" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Profile Picture</label>
                               
                               <input type="file" class="form-control" name="c_image" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Password</label>
                               
                               <input type="password" class="form-control" name="c_password" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Confirm Password</label>
                               
                               <input type="password" class="form-control" name="c_confirm_password" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->
                               
                              
                              <label >Country</label>
                              <select name="c_country" class="selectpicker countrypicker form-control"></select>
                               
                           </div><!-- form-group Finish -->
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Register
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->

    </div>
               
               
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
    <?php

    if(isset($_POST['register'])){
    
        $c_fname = $_POST['c_fname'];
        
        $c_lname = $_POST['c_lname'];
        
        $c_email = $_POST['c_email'];
        
        $c_confirm_email = $_POST['c_confirm_email'];

        $c_image = $_FILES['c_image']['name'];
        
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        
        
        $c_password = $_POST['c_password'];
        
        $c_confirm_password = $_POST['c_confirm_password'];
       
        
        $c_country = $_POST['c_country'];
        
       
        
        $c_ip = getRealIpUser();
        
        move_uploaded_file($c_image_tmp,"customer/user_img/$c_image");
        
        $insert_customer = "insert into users(user_fname,user_lname,user_email,user_C_email,user_image,user_pass,user_C_pass,user_country,user_ip) values ('$c_fname','$c_lname','$c_email','$c_confirm_email','$c_image','$c_password','$c_confirm_password','$c_country','$c_ip')";
        
        $run_customer = mysqli_query($con,$insert_customer);
        $sel_bid = "select * from user_bid where ip_add='$c_ip'";
    
         $run_bid = mysqli_query($con,$sel_bid);
    
         $check_bid = mysqli_num_rows($run_bid);
         if($check_bid>0){
            $_SESSION['user_email']=$c_email;
            echo "<script>alert('You have been Registered successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
           }
        else{
            $_SESSION['user_email']=$c_email;
            echo "<script>alert('You have been Registered successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }   
      
        
         
        
    }
    

    ?>