<h1 align="center">Change Password</h1>
<form action="" method="post" >
    <div class="form-group">
        <label for="">Old Password</label>
        <input type="text" class="form-control" name ="old_pass" required>
    </div>
    <div class="form-group">
        <label for="">New Password</label>
        <input type="text" class="form-control"  name ="new_pass" required>
    </div>
    <div class="form-group">
        <label for="">Confirm new Password</label>
        <input type="text" class="form-control"  name ="new_pass_again" required>
    </div>
    
    <div class="text-center"><!-- text-center Begin -->
                               
        <button  type="submit" name="submit" class="btn btn-primary">
        
        <i class="fa fa-user-md"></i> Update 
        
        </button>
        
    </div><!-- text-center Finish -->

</form>

<?php 

if(isset($_POST['submit'])){
    
    $user_session = $_SESSION['user_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from users where user_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update users set user_pass='$c_new_pass',user_C_pass='$c_new_pass_again' where user_email='$user_session'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('myaccount.php?mybids','_self')</script>";
        
    }
    
}

?>
