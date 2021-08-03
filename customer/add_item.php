
<html>
<head>
</head>
 <body>       
 

           
           
            <h1 align="center">Add Item</h1>
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Item_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat_title" class="form-control"><!-- form-control Begin -->
                              
                              <option> Select a Category  </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['cat_id'];
                                  $p_cat_title = $row_p_cats['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Item_img1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Item_img2" type="file" class="form-control" >
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Item_img3" type="file" class="form-control form-height-custom" >
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Minimum Bid </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Min_bid" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="Item_keywords" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Description </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="Item_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
                            
            
</body> 
</html>          



<?php
   if(isset($_POST['submit'])){


        $user_session = $_SESSION['user_email'];
        $get_user = "select * from users where user_email='$user_session'";
        $run_user = mysqli_query($con,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_id= $row_user['user_id'];
       $Item_name = $_POST['Item_name'];
       $cat_title = $_POST['cat_title'];
       $Min_bid = $_POST['Min_bid'];
       $Item_keywords = $_POST['Item_keywords'];
       $Item_desc = $_POST['Item_desc'];
      

       $Item_img1 = $_FILES['Item_img1']['name'];
       $Item_img2 = $_FILES['Item_img2']['name'];
       $Item_img3 = $_FILES['Item_img3']['name'];

       $temp_name1 = $_FILES['Item_img1']['tmp_name'];
       $temp_name2 = $_FILES['Item_img2']['tmp_name'];
       $temp_name3 = $_FILES['Item_img3']['tmp_name'];

       move_uploaded_file($temp_name1,"../admin_area/product-images/$Item_img1");
       move_uploaded_file($temp_name2,"../admin_area/product-images/$Item_img2");
       move_uploaded_file($temp_name3,"../admin_area/product-images/$Item_img3");

       $insert_Item ="insert into items(cat_id,user_id,date,Item_name,Item_img1,Item_img2,Item_img3,Min_bid,Item_keywords,Item_desc) values ('$cat_title','$user_id',NOW(),'$Item_name','$Item_img1','$Item_img2','$Item_img3','$Min_bid','$Item_keywords','$Item_desc')";

       $run_Item = mysqli_query($con,$insert_Item);
       $id=mysqli_insert_id($con);
      
       if($run_Item){
        $insert_current="insert into item_current(item_id,current_bid) values ('$id','$Min_bid')";
        $run_current= mysqli_query($con,$insert_current);
          if($run_current){
         echo "<script>alert('Product has been inserted sucessfully')</script>";
         echo "<script>window.open('myaccount.php?view_items','_self')</script>";
        }
       
       }
      
      

      
   }
   






?>
