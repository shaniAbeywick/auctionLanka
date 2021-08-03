<?php
 $active='Categories';
 include("includes/header.php");
 
 ?>
    <div id="content">
    <div class="container-fluid">
   
    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Categories
                   </li>
               </ul><!-- breadcrumb Finish -->
               
    </div>
    
               
    
    <div class="col-md-3"><!-- col-md-3 Begin -->
    <?php 
    
    include("includes/sidebar.php");
    
    ?>
    </div><!-- col-md-3 Finish -->
   
    <div class="col-md-9 "><!-- col-md-9 Begin -->
               
               <?php
                if(!isset($_GET['p_cat'])){ 
                echo "
                <div class='box' id='topbid'>
                    <h1 id='topbidTitle'>Categories</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptatibus accusamus eum quaerat, commodi earum molestiae totam nihil doloribus autem ut, itaque corrupti repudiandae libero officiis nemo dicta ipsa distinctio?</p>
                </div>
               " ; 
                }
                ?>
     
    
   
    <div class="row " ><!-- row Begin -->
               <?php
                        if(!isset($_GET['p_cat'])){
                            $per_page=6;
                            if(isset($_GET['page'])){
                                $page =$_GET['page'];
                            }
                            else{
                                 $page=1;
                            } 
                            $start_from =($page-1) * $per_page;
                            $get_products ="select * from items order by 1 DESC LIMIT $start_from,$per_page"; 
                            
                            $run_products = mysqli_query($con,$get_products);
                            while($row_products=mysqli_fetch_array($run_products)){
                                $Item_id = $row_products['Item_id'];
        
                                $Item_name = $row_products['Item_name'];
                                
                                $Min_bid = $row_products['Min_bid'];
                                
                                $Item_img1 = $row_products['Item_img1'];

                                $get_current="select * from item_current where item_id='$Item_id'";

                                $run_current = mysqli_query($con,$get_current);

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
                                        
                                            <a href='details.php?Item_id=$Item_id'> $Item_name </a>
                                        
                                        </h3>
                                    
                                        <p class='price'>

                                            $$pro_price
                                            

                                        </p>

                                        <p class='button'>

                                            <a class='btn btn-default' href='details.php?Item_id=$Item_id'>

                                               Details

                                            </a>

                                            `<a class='btn btn-primary' href='bid_product.php?Item_id=$Item_id'>`

                                                Bid Now

                                            </a>

                                        </p>
                                    
                                    </div>
                                
                                </div>
                            
                            </div>
                                
                                ";
                            }

                             

                     ?>
               
               
        
    
        </div><!-- row Finish -->
        
        <center>
                   <ul class="pagination"><!-- pagination Begin -->
					 <?php
                             
                    $query = "select * from items";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='categories.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='categories.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='categories.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
					    	
							
						}
					 
					 ?> 
                       
                   </ul><!-- pagination Finish -->
                    
        </center>
    


            
        <?php 
                  getpcatpro();

        ?>  

       
     
    </div>
    </div>
    </div>
    <?php 
    
    include("includes/footer.php");
    
    ?>
   
  
    
  <script src="Js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
</body>
</html>                   
               