      


           
           
            <h1 align="center">Fill This for Register as a Seller</h1>
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Your Address</label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_address" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Upload a Certified Document that can verify your Address </label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          <input type="file" class="form-control" name="u_document_1" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Upload a NIC or Passport copy (PDF copy)</label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_document_2" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Bank Name </label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_bank" type="text" class="form-control" >
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Branch </label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_branch" type="text" class="form-control " >
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label">  Bank Account Number </label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_account" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"> Your Contact number </label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="u_contact" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-5 control-label"></label> 
                      
                      <div class="col-md-4"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Register" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
                            
            


<?php
   if(isset($_POST['submit'])){

        $user_session = $_SESSION['user_email'];

        
        
        $get_user = "select * from users where user_email='$user_session'";
    
        $run_user = mysqli_query($con,$get_user);
    
        $row_user = mysqli_fetch_array($run_user);

        $user_id= $row_user['user_id'];

       $u_address = $_POST['u_address'];
       $u_bank = $_POST['u_bank'];
       $u_branch = $_POST['u_branch'];
       $u_account = $_POST['u_account'];
       
       $u_contact = $_POST['u_contact'];
       $u_account =md5($u_account);

       echo"$u_account";
      

       $u_document_1 = $_FILES['u_document_1']['name'];
       $u_document_2 = $_FILES['u_document_2']['name'];
      
       $temp_name1 = $_FILES['u_document_1']['tmp_name'];
       $temp_name2 = $_FILES['u_document_2']['tmp_name'];
       

       move_uploaded_file($temp_name1,"seller/document1/$u_document_1");
       move_uploaded_file($temp_name2,"seller/document2/$u_document_2");
      

       $insert_seller ="insert into seller_register (user_id,date,seller_address,document_1,document_2,bank_name,bank_branch,account_no,contact_no) values ('$user_id',NOW(),'$u_address','$u_document_1','$u_document_2','$u_bank','$u_branch','$u_account','$u_contact')";

       $run_seller = mysqli_query($con,$insert_seller);
       
      
       if($run_seller){
       
          
         echo "<script>alert('You have been registerd as a seller')</script>";
         echo "<script>window.open('myaccount.php','_self')</script>";
      
       
       }
      
      

      
   }
   






?>