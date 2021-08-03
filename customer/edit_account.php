<?php 

$user_session = $_SESSION['user_email'];
        
$get_user = "select * from users where user_email='$user_session'";
             
$run_user = mysqli_query($con,$get_user);
             
$row_user = mysqli_fetch_array($run_user);

$user_id= $row_user['user_id'];

$c_fname = $row_user['user_fname'];

$c_lname = $row_user['user_lname'];

$c_email = $row_user['user_email'];

$c_confirm_email = $row_user['user_C_email'];

$c_image = $row_user['user_image'];

$c_country = $row_user['user_country'];

$sel_seller = "select * from seller_register where user_id='$user_id'";

$run_seller = mysqli_query($con,$sel_seller);
             
$row_seller = mysqli_fetch_array($run_seller);

$u_address  = $row_seller['seller_address'] ;

$u_document_1  = $row_seller['document_1'] ;

$u_document_2  = $row_seller['document_2'] ;

$u_bank  = $row_seller['bank_name'] ;

$u_branch  = $row_seller['bank_branch'] ;

$u_account  = $row_seller['account_no'] ;

$u_contact  = $row_seller['contact_no'] ;

    
$check_seller= mysqli_num_rows($run_seller);

if($check_seller>0){


?>


<h1 align="center">Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" class="form-control" name ="c_fname" value="<?php echo $c_fname; ?>" required>
    </div>
    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" class="form-control"  name ="c_lname" value="<?php echo $c_lname; ?>" required>
    </div>
    <div class="form-group">
        <label for="">Email Address</label>
        <input type="text" class="form-control"  name ="c_email" value="<?php echo $c_email; ?>" required>
    </div>
    <div class="form-group"><!-- form-group Begin -->
                               
        <label>Confirm Email Address</label>
                               
        <input type="text" class="form-control" name="c_confirm_email"  value="<?php echo $c_confirm_email; ?>" required>
                               
    </div><!-- form-group Finish -->
    
    <div class="form-group">
        <label for="">Profile Picture</label>
        <input type="file" class="form-control form-height-custom"  name ="c_image" >
        <img src="user_img/<?php echo $c_image; ?>" alt="customer Image" class="img-responsive">

    </div>
    <div class="form-group"><!-- form-group Begin -->
                               
                              
        <label >Country</label>
        <select name="c_country"  class="selectpicker countrypicker form-control">
        
        </select>
                               
    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Your Address</label> 
                      
        <input name="u_address" type="text" class="form-control" value="<?php echo $u_address; ?>"required>
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Upload a Certified Document that can verify your Address </label> 
                      
        <input type="file" class="form-control" name="u_document_1" >
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Upload a NIC or Passport copy (PDF copy)</label> 
                      
        <input name="u_document_2" type="file" class="form-control" >
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Bank Name </label> 
                      
        <input name="u_bank" type="text" class="form-control" value="<?php echo $u_bank; ?>" >
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Branch </label> 
                      
        <input name="u_branch" type="text" class="form-control" value="<?php echo $u_branch; ?>">
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label >  Bank Account Number </label> 
                      
        <input name="u_account" type="text" class="form-control"   required>
                          
    </div><!-- form-group Finish -->
                   
    <div class="form-group"><!-- form-group Begin -->
                       
        <label > Your Contact number </label> 
                      
        <input name="u_contact" type="text" class="form-control" value="<?php echo $u_contact; ?>" required>
                          
    </div><!-- form-group Finish -->
    <div class="text-center"><!-- text-center Begin -->
                               
        <button  name="update" class="btn btn-primary">
        
        <i class="fa fa-user-md"></i> Update 
        
        </button>
        
    </div><!-- text-center Finish -->
    
</form>

<?php } 

else{
?>

<h1 align="center">Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" class="form-control" name ="c_fname" value="<?php echo $c_fname; ?>" required>
    </div>
    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" class="form-control"  name ="c_lname" value="<?php echo $c_lname; ?>" required>
    </div>
    <div class="form-group">
        <label for="">Email Address</label>
        <input type="text" class="form-control"  name ="c_email" value="<?php echo $c_email; ?>" required>
    </div>
    <div class="form-group"><!-- form-group Begin -->
                               
        <label>Confirm Email Address</label>
                               
        <input type="text" class="form-control" name="c_confirm_email"  value="<?php echo $c_confirm_email; ?>" required>
                               
    </div><!-- form-group Finish -->
    
    <div class="form-group">
        <label for="">Profile Picture</label>
        <input type="file" class="form-control form-height-custom"  name ="c_image" required>
        <img src="user_img/<?php echo $c_image; ?>" alt="customer Image" class="img-responsive">

    </div>
    <div class="form-group"><!-- form-group Begin -->
                               
                              
        <label >Country</label>
        <select name="c_country"  class="selectpicker countrypicker form-control">
        
        </select>
                               
    </div><!-- form-group Finish -->

<?php 
}
?>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $user_id ;
    
    $c_fname = $_POST['c_fname'];

    $c_lname = $_POST['c_lname'];
    
    $c_email = $_POST['c_email'];
    
    $c_confirm_email = $_POST['c_confirm_email'];
    
    $c_country = $_POST['c_country'];

    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    
    move_uploaded_file ($c_image_tmp,"user_img/$c_image");
    
    $update_user = "update users set user_fname='$c_fname',user_lname='$c_lname',user_email='$c_email',user_C_email='$c_confirm_email',user_image='$c_image',user_country='$c_country' where user_id='$update_id' ";
    
    $run_user = mysqli_query($con,$update_user);
    
    if($run_user){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>