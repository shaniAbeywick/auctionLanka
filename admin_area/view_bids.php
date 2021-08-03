<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Bids
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Bids
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Product Name: </th>
                                <th> Bidder Email:  </th>
                                <th> Bidding Date : </th>
                                <th> Bidding Amount : </th>
                                <th> Invoice No: </th>
                                 <th> Status: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_bids = "select * from user_bid";
                                
                                $run_bids = mysqli_query($con,$get_bids);
          
                                while($row_bids=mysqli_fetch_array($run_bids)){
                                    $bid_id =$row_bids['user_bid_id'];
                                    $c_id =$row_bids['user_id'];
                                    $item_id =$row_bids['item_id'];
                                    $bid_date =substr($row_bids['bid_date'],0,11);
                                    $bid_value =$row_bids['bid_value'];
                                    $invoice_no =$row_bids['invoice_no'];
                                    $bid_status =$row_bids['bid_status'];
                                    
                                    $get_item= "select * from items where Item_id='$item_id'";
                                    
                                    $run_item= mysqli_query($con,$get_item);

                                    $row_item= mysqli_fetch_array($run_item);
                   
                                    $item_name= $row_item['Item_name'];
                                    
                                    $get_customer = "select * from users where user_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['user_email'];
                                    
                                
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $item_name; ?> </td>
                                <td> <?php echo $customer_email; ?></td>
                                <td> <?php echo $bid_date; ?> </td>
                                <td> <?php echo $bid_value; ?></td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $bid_status; ?> </td>
                                
                               
                                <td> 
                                     
                                     <a href="index.php?delete_bids=<?php echo $bid_id ; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>