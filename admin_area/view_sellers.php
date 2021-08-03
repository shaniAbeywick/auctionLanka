<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Sellers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Sellers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> First Name: </th>
                                <th> Last Name: </th>
                                <th> Image: </th>
                                <th> E-Mail: </th>
                                <th> Country: </th>
                                <th> Registered Date as a Seller: </th>
                                <th> Address: </th>
                                
                                <th> Bank Name: </th>
                                <th> Bank Branch: </th>
                                <th> Bank Account Number: </th>
                                <th> Contact number: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                
                               
                                $get_s = "select * from seller_register";
                                $run_s = mysqli_query($con,$get_s);
                               
          
                                while($row_s=mysqli_fetch_array($run_s)){
                                    
                                    $c_id = $row_s['user_id'];
                                    $c_date = $row_s['date'];

                                    $c_address = $row_s['seller_address'];
                                    
                                    
                                    
                                    $c_document1 = $row_s['document_1'];

                                    $c_document2 = $row_s['document_2'];
                                    
                                    
                                    
                                    $c_bank = $row_s['bank_name'];

                                    $c_branch = $row_s['bank_branch'];

                                    $c_account = $row_s['account_no'];

                                    $c_contact = $row_s['contact_no'];
                                    
                                    $get_c = "select * from users where user_id='$c_id'";
                                    
                                    $run_c = mysqli_query($con,$get_c);

                                    $row_c=mysqli_fetch_array($run_c);

                                    $c_fname = $row_c['user_fname'];
                                    
                                    $c_lname = $row_c['user_lname'];

                                    $c_img = $row_c['user_image'];
                                    
                                    $c_email = $row_c['user_email'];
                                    
                                    $c_country = $row_c['user_country'];
                                    

                                    
                                    
                                    
                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_fname; ?> </td>
                                <td> <?php echo $c_lname; ?> </td>
                                <td> <img src="../customer/user_img/<?php echo $c_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_country; ?></td>
                                <td> <?php echo $c_date; ?></td>
                                <td> <?php echo $c_address; ?></td>
                                
                                <td> <?php echo $c_bank; ?></td>
                                <td> <?php echo $c_branch; ?></td>
                                <td> <?php echo $c_account; ?></td>
                                <td> <?php echo $c_contact; ?></td>
                                <td> 
                                     
                                     <a href="index.php?delete_sellers=<?php echo $c_id; ?>">
                                     
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