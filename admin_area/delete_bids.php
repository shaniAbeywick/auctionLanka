<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_bids'])){
        
        $delete_id = $_GET['delete_bids'];
        
        $delete_bid = "delete from user_bid where user_bid_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_bid);
        
        if($run_delete){
            
            echo "<script>alert('One of your bid has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
        
    }

?>

<?php } ?>