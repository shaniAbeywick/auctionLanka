<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_sellers'])){
        
        $delete_id = $_GET['delete_sellers'];
        
        $delete_s = "delete from seller_register where user_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_s);
        
        if($run_delete){
           
         
                echo "<script>alert('customer's seller account have been Deleted')</script>";
            
                echo "<script>window.open('index.php?view_customers','_self')</script>";


            }
            
            
            
        }
        
    }

?>

<?php } ?>