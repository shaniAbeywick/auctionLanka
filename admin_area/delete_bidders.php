<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_customer'])){
        
        $delete_id = $_GET['delete_customer'];
        
        $delete_c = "delete from users where user_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_c);
        
        if($run_delete){
            $delete_fully = "delete from seller_register where user_id='$delete_id'";
            $run_f_delete = mysqli_query($con,$delete_fully);

            if($run_f_delete){
                echo "<script>alert('One of your customer's bidder and seller, both accounts have been Deleted')</script>";
            
                echo "<script>window.open('index.php?view_customers','_self')</script>";


            }
            
            
            
        }
        
    }

?>

<?php } ?>