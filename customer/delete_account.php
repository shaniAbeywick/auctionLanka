<center>
    <h1>Do you Realy Want To Delete Your Account ?</h1>
    <form action="" method="post">
        <input type="submit" name="Yes" value="Yes,I want To Delete"class="btn btn-danger">
        <input type="submit" name="No" value="No ,I Dont want To Delete"class="btn btn-primary">
    </form>
</center>

<?php 

$user_session = $_SESSION['user_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from users where user_email='$user_session'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('myaccount.php?mybids','_self')</script>";
    
}

?>