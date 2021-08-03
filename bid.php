<?php
 
 $active='Bids';
 include("includes/header.php");
 
 ?>
    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Bids
                   </li>
               </ul><!-- breadcrumb Finish -->
               
    </div><!-- col-md-12 Finish -->
    <div class="col-md-12"><!-- col-md-9 Begin -->
               <div class="box" id="topbid"><!-- box Begin -->
                   <h1 id="topbidTitle" >Bids</h1>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                   </p>
               </div><!-- box Finish -->
    </div>          
    <div id="content" class="container"><!-- container Begin -->
    <div class="row"><!-- row Begin -->
    
        <?php
          getPro();
        
        ?>   
       
    </div><!-- row Finish -->
    
       
</div><!-- container Finish -->
   <?php 
    
    include("includes/footer.php");
    
    ?>
        
       
        <script src="Js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
    </body>
    </html>                  