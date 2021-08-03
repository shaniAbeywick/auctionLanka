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
    
    if(isset($_GET['add_item'])) {
        if(isset($_GET['add_user'])){
             
        $ip_add = getRealIpUser(); 
        
        $Item_id = $_GET['add_item'];
        $user_id = $_GET['add_user'];
        
        
        $bid_value = $_POST['bid_value'];

        $invoice_no = " ";

        $status = "pending";

        
        
        
        
        $check_product = "select * from user_bid where user_id='$user_id' AND item_id='$Item_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('You have already bid on this item!')</script>";
            echo "<script>window.open('customer/myaccount.php?mybids','_self')</script>";
            
        }else{
            
            $query = "insert into user_bid (item_id,user_id,ip_add,bid_date,bid_value,invoice_no,bid_status) values ('$Item_id','$user_id','$ip_add',NOW(),'$bid_value','$invoice_no','$status')";
            
            $run_query = mysqli_query($db,$query);
            $update_bid = "update item_current set current_bid ='$bid_value' where item_id=$Item_id";
            $run_bid = mysqli_query($db,$update_bid);
                if($run_bid){
                    echo "<script>alert('Your bid has been placed.')</script>";
                    echo "<script>window.open('customer/myaccount.php?mybids','_self')</script>";
                   }
                }  
            
            
            
        

        }
    }

        
}
    


/// finish add_cart functions ///

/// finish getRealIpUser functions ///




function getPro(){
    global $db;
     
    $get_products = "select * from items order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db, $get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $Item_id = $row_products['Item_id'];
        
        $Item_name = $row_products['Item_name'];
        
        $Min_bid = $row_products['Min_bid'];
        
        $Item_img1 = $row_products['Item_img1'];

        $get_current="select * from item_current where item_id='$Item_id'";

        $run_current = mysqli_query($db,$get_current);

        $row_current=mysqli_fetch_array($run_current);

        $pro_price = $row_current['current_bid'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?Item_id=$Item_id'>
                
                    <img class='img-responsive' src='admin_area/product-images/$Item_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?Item_id=$Item_id'>

                            $Item_name

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?Item_id=$Item_id'>

                            Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?Item_id=$Item_id'>

                             Bid Now

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }

}

function getPcat(){

    global $db;
    
    $get_p_cats = "select * from categories";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $cat_id = $row_p_cats['cat_id'];
        
        $cat_title = $row_p_cats['cat_title'];
        
        echo "
        
            <li >
            
                <a href='categories.php?p_cat=$cat_id'>$cat_title </a>
            
            </li>
        
        ";
        
    }
}

function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['p_cat'])){
        
        $cat_id = $_GET['p_cat'];
        
        $get_p_cat ="select * from categories where cat_id='$cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $cat_title = $row_p_cat['cat_title'];
        
        $cat_desc = $row_p_cat['cat_desc'];
        
        $get_products ="select * from items where cat_id='$cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box' id='topbid'>
                
                    <h1 id='topbidTitle'> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box' id='topbid'>
                
                    <h1 id='topbidTitle'> $cat_title </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            $Item_id = $row_products['Item_id'];
        
            $Item_name = $row_products['Item_name'];
            
            $Min_bid = $row_products['Min_bid'];
            
            $Item_img1 = $row_products['Item_img1'];

            $get_current="select * from item_current where item_id='$Item_id'";

            $run_current = mysqli_query($db,$get_current);

            $row_current=mysqli_fetch_array($run_current);

            $pro_price = $row_current['current_bid'];
            
            
            echo "
            
            <div class='col-md-4 col-sm-6  center-responsive' >
        
            <div class='product'>
            
                <a href='details.php?Item_id=$Item_id'>
                
                    <img class='img-responsive' src='admin_area/product-images/$Item_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?Item_id=$Item_id'>

                          $Item_name

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $$pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?Item_id=$Item_id'>

                            Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?Item_id=$Item_id'>

                             Bid Now

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
            
            ";
            
        }
        
    }
    
}

?>