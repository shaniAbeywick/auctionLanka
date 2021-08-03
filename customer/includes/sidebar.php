<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->
    <?php 
        
        $user_session = $_SESSION['user_email'];
        
        $get_user = "select * from users where user_email='$user_session'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $user_image = $row_user['user_image'];
        
        $user_fname = $row_user['user_fname'];

        $user_lname = $row_user['user_lname'];
        
        if(!isset($_SESSION['user_email'])){
            
        }else{
            
            echo "
            
                <center>
                
                    <img src='user_img/$user_image' class='img-responsive' >
                
                </center>
                
                <br/>
                
                <h3 class='panel-title' align='center'>
                
                    Name: $user_fname  $user_lname
                
                </h3>
            
            ";
            
        }
        
        ?>
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            <li class="<?php if(isset($_GET['mybids'])){ echo "active"; } ?>">
                
                <a href="myaccount.php?mybids">
                    
                     My Bids
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['seller_register'])){ echo "active"; } ?>">
                
                <a href="myaccount.php?seller_register">
                    
                    Register as a Seller
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="myaccount.php?edit_account">
                    
                    Edit Account
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="myaccount.php?change_pass">
                    
                     Change Password
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="myaccount.php?delete_account">
                    
                    Delete Account
                    
                </a>
                
            </li>
         <?php

         $user_session = $_SESSION['user_email'];
        
         $get_user = "select * from users where user_email='$user_session'";
         
         $run_user = mysqli_query($con,$get_user);
         
         $row_user = mysqli_fetch_array($run_user);

         $user_id = $row_user['user_id'];

         $sel_seller = "select * from seller_register where user_id='$user_id'";
    
         $run_seller = mysqli_query($con,$sel_seller);
    
         $check_seller= mysqli_num_rows($run_seller);

         if($check_seller>0){


         ?>
            
            
            <li class='<?php if(isset($_GET['add_item'])){ echo 'active'; } ?>'>

              <a href='myaccount.php?add_item'>

                Add Item
                
              </a>
            
            </li> 
            <li class='<?php if(isset($_GET['view_items'])){ echo 'active'; } ?>'>

              <a href='myaccount.php?view_items'>

               View Items
                
              </a>
            
            </li> 

           

            
           <?php } ?>
            
            <li>
                
                <a href="logout.php">
                    
                    Log Out
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->
