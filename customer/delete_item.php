<?php 

session_start();

if(!isset($_SESSION['user_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");

?>
<?php

if(isset($_GET['Item_id'])){

    
    $delete_id = $_GET['Item_id'];
  
    $delete_pro = "delete from items where Item_id='$delete_id'";
    
    $run_delete = mysqli_query($con,$delete_pro);
    
    if($run_delete){
        
        echo "<script>alert('One of your product has been Deleted')</script>";
        
        echo "<script>window.open('myaccount.php?view_items','_self')</script>";
        
    }
    
}



?>
  
<?php } ?>  