<center><!--  center Begin  -->
    
    <h1> My Bids </h1>
    <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_bid = "select * from user_bid where ip_add='$ip_add'";
                       
                       $run_bid = mysqli_query($con,$select_bid);
                       
                       $count = mysqli_num_rows($run_bid);
                       
                       ?>
    
    <p class="lead"> Your Bids on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON :  </th>
                <th> Item Name  </th>
                <th> Bidding Date </th>
                <th> Bidding Amount  </th>
                <th> Invoice No </th>
                <th> Status </th>
                
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
        <?php 
             $user_session = $_SESSION['user_email'];
        
             $get_user = "select * from users where user_email='$user_session'";
             
             $run_user = mysqli_query($con,$get_user);
             
             $row_user = mysqli_fetch_array($run_user);

             $user_id= $row_user['user_id'];

             $get_bids ="select * from user_bid  where user_id='$user_id'";

             $run_bids =mysqli_query($con,$get_bids);
             $i=0;

             while($row_bids = mysqli_fetch_array($run_bids)){
                 $bid_id =$row_bids['user_bid_id'];
                 $item_id =$row_bids['item_id'];
                 $bid_date =substr($row_bids['bid_date'],0,11);
                 $bid_value =$row_bids['bid_value'];
                 $invoice_no =$row_bids['invoice_no'];
                 $bid_status =$row_bids['bid_status'];
                 
                 $get_item= "select * from items where Item_id='$item_id'";

                 $run_item= mysqli_query($con,$get_item);

                 $row_item= mysqli_fetch_array($run_item);

                 $item_name= $row_item['Item_name'];

                 $i++;



             ?>

            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                
                <td> <?php echo $item_name; ?>  </td>
                <td>  <?php echo $bid_date; ?></td>
                <td> <?php echo $bid_value.'$'; ?></td>
                <td> <?php echo $invoice_no; ?></td>
                <td> <?php echo $bid_status; ?></td>
                
                
               <!-- <td>
                    
                    <a href="confirm.php" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
                    
                </td> -->
                
            </tr><!--  tr Finish  -->
            
            <?php  } ?>
                                    
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->