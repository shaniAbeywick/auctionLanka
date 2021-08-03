
    <div id="footer"><!-- #footer Begin -->
        <div class="container "><!-- container Begin -->
            <div class="row"><!-- row Begin -->
                <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                   
                   <h5 class="topic">Pages</h5>
                    
                    <ul><!-- ul Begin -->
                        <li><a href="index.php">Home</a></li>
                        
                        <li><a href="shop.php">How to sell?</a></li>
                        <li><a href="shop.php">How to Bid?</a></li>
                        <li><a href="checkout.php">Terms & Conditions</a></li>
                        
                        <li><a href="checkout.php">Privacy & Policy </a></li>
                    </ul><!-- ul Finish -->
                    
                    <hr>
                    
                    <h5 class="topic">User Section</h5>
                    
                    <ul><!-- ul Begin -->
                           <?php 
                           
                           if(!isset($_SESSION['user_email'])){
                               
                               echo"<a href='checkout.php'>Login</a>";
                               
                           }else{
                               
                              echo"<a href='customer/myaccount.php?mybids'>My Account</a>"; 
                               
                           }
                           
                           ?>
                        <li><a href="userRegister.php">Register</a></li>
                    </ul><!-- ul Finish -->
                    
                    <hr class="hidden-md hidden-lg hidden-sm">
                    
                </div><!-- col-sm-6 col-md-3 Finish -->
                
                <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                    
                    <h5 class="topic">Main Categories of Art</h5>
                    
                    <ul><!-- ul Begin -->
                    <?php 
                    
                    $get_p_cats = "select * from categories";
                
                    $run_p_cats = mysqli_query($con,$get_p_cats);
                
                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                        
                        $cat_id = $row_p_cats['cat_id'];
                        
                        $cat_title = $row_p_cats['cat_title'];
                        
                        echo "
                        
                            <li>
                            
                                <a href='../categories.php?p_cat=$cat_id'>
                                
                                    $cat_title
                                
                                </a>
                            
                            </li>
                        
                        ";
                        
                    }
                
                ?>
                    </ul><!-- ul Finish -->
                    
                    <hr class="hidden-md hidden-lg">
                    
                </div><!-- col-sm-6 col-md-3 Finish -->
                
                <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                    
                    <h5 class="topic">Find Us</h5>
                    
                    <p id="address"><!-- p Start -->
                        
                    <strong>auctionLanka</strong>
                        <br/>Capricon Solutions(private)Limited
                        <br/>addyouremail@freepik.com
                        <br/>+94 773 294 463
                        <br/>+94 773 294 463
                        <br/><strong>Auction Lanka</strong>
                        
                    </p><!-- p Finish -->
                    
                    <a href="contact.php">Check Our Contact Page</a>
                    
                    <hr class="hidden-md hidden-lg">
                    
                </div><!-- col-sm-6 col-md-3 Finish -->
                
                <div class="col-sm-6 col-md-3">
                    
                    <h5 class="topic">Get The News</h5>
                    
                    <p class="text-muted">
                        Dont miss our latest update products.
                    </p>
                    
                    <form action="" method="post"><!-- form begin -->
                        <div class="input-group"><!-- input-group begin -->
                            
                            <input type="text" class="form-control" name="email">
                            
                            <span class="input-group-btn"><!-- input-group-btn begin -->
                                
                                <input type="submit" value="subscribe" class="btn btn-default">
                                
                            </span><!-- input-group-btn Finish -->
                            
                        </div><!-- input-group Finish -->
                    </form><!-- form Finish -->
                    
                    <hr>
                    
                    <h5 class="topic">Keep In Touch</h5>
                    
                    <p class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-envelope"></a>
                    </p>
                    
                </div>
            </div><!-- row Finish -->
        </div><!-- container Finish -->
    </div><!-- #footer Finish -->
 
    
    <div id="copyright"><!-- #copyright Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-6"><!-- col-md-6 Begin -->
                
                <p class="pull-left">&copy; 2020 auctionLanka All Rights Reserve</p>
                
            </div><!-- col-md-6 Finish -->
            <div class="col-md-6"><!-- col-md-6 Begin -->
                
                <p class="pull-right">Theme by: <a href="#">Mr.Amith</a></p>
                
            </div><!-- col-md-6 Finish -->
        </div><!-- container Finish -->
    </div><!-- #copyright Finish -->
</div>


