<center><!--  center Begin  -->
    
    <h1> My Items </h1>
    
    
    <p class="lead"> Your Items on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                                <th> Item ID: </th>
                                <th> Item Name: </th>
                                <th> Item Image: </th>
                                <th> Item Starting Bid Price: </th>
                                <th> Number of Bids:  </th>
                                <th> Item Keywords: </th>
                                <th> Item Date: </th>
                                <th> Item Delete: </th>
                                <th> Item Edit: </th>
                
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
        <?php 
          
          $i=0;
          $user_session = $_SESSION['user_email'];
          $get_user = "select * from users where user_email='$user_session'";
          $run_user = mysqli_query($con,$get_user);
          $row_user = mysqli_fetch_array($run_user);
          $user_id= $row_user['user_id'];
      
          $get_pro = "select * from items where user_id='$user_id'";
          
          $run_pro = mysqli_query($con,$get_pro);

          while($row_pro=mysqli_fetch_array($run_pro)){
              
              $pro_id = $row_pro['Item_id'];
              
              $pro_title = $row_pro['Item_name'];
              
              $pro_img1 = $row_pro['Item_img1'];
              
              $pro_price = $row_pro['Min_bid'];
              
              $pro_keywords = $row_pro['Item_keywords'];
              
              $pro_date = $row_pro['date'];
              
              $i++;
      
      ?>
      
      <tr><!-- tr begin -->
          <td> <?php echo $i; ?> </td>
          <td> <?php echo $pro_title; ?> </td>
          <td> <img src="../admin_area/product-images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
          <td> $ <?php echo $pro_price; ?> </td>
          <td> <?php 
              
                  $get_bid = "select * from user_bid where item_id='$pro_id'";
              
                  $run_bid = mysqli_query($con,$get_bid);
              
                  $count = mysqli_num_rows($run_bid);
              
                  echo $count;
              
               ?> 
          </td>
          <td> <?php echo $pro_keywords; ?> </td>
          <td> <?php echo $pro_date ?> </td>
          <td> 
               
                 <a href="delete_item.php?Item_id=<?php echo $pro_id; ?>" target="_blank"  class="fa fa-trash-o">
               
                 Delete
              
                 </a> 
               
          </td>
          <td> 
               
               <a href="edit_item.php?Item_id=<?php echo $pro_id; ?>" target="_blank"  class="fa fa-pencil">
               
                  Edit
              
               </a> 
              
          </td>
      </tr><!-- tr finish -->
      
      <?php } ?>
                 



            
                                    
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->
