<?php
$db = mysqli_connect("localhost","root" , "","auctionlanka_store");
/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// begin add_bid functions ///

function add_bid(){
    
    global $db;
    
    if(isset($_GET['add_bid'])){
        
        $ip_add = getRealIpUser();
        
        $Item_id = $_GET['add_bid'];
        
        $amount = $_POST['amount'];
        
        $current = $_POST['current'];
        
        $check_product = "select * from bid where ip_add='$ip_add' AND Item_id='$Item_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('You have already bid on this item!')</script>";
            echo "<script>window.open('bid_product.php?Item_id=$Item_id','_self')</script>";
            
        }else{
            
            $query = "insert into bid (Item_id,ip_add,bid_date,amount,current) values ('$Item_id','$ip_add',NOW(),' $amount','$current')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('bid_product.php?Item_id=$Item_id','_self')</script>";
            
        }
        
    }
    
}

/// finish add_cart functions ///

/// finish getRealIpUser functions ///
