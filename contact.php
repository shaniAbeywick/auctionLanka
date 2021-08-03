<?php
 
 $active='Contact Us';
 include("includes/header.php");
 
 ?>
    <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                      Contact Us
                   </li>
               </ul><!-- breadcrumb Finish -->
               
    </div><!-- col-md-12 Finish -->
    <div id="content" class="container">
    
    <div class="col-md-12"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Feel free to Contact Us</h2>
                           
                           <p class="text-muted"><!-- text-muted Begin -->
                               
                               If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                               
                           </p><!-- text-muted Finish -->
                           
                       </center><!-- center Finish -->
                       
                       <form action="contact.php" method="post" id="myform"> <!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Name</label>
                               
                               <input type="text" id="name" class="form-control" name="name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Email</label>
                               
                               <input type="text" id="email" class="form-control" name="email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Subject</label>
                               
                               <input type="text" id="subject" class="form-control" name="subject" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Message</label>
                               
                               <textarea name="message" class="form-control"></textarea>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button onclick="sendEmail()" type="submit" name="submit" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Send Message
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           $headers  = 'From:'.$sender_email . "\r\n" .
                           'MIME-Version: 1.0' . "\r\n" .
                            'Content-type: text/html; charset=utf-8';
                           
                           $receiver_email = "shaniabeywickrama294@gmail.com";
                           
                           mail($receiver_email,$sender_subject,$sender_message,$headers);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. ASAP we will reply your message";
                           
                           $from = "shaniabeywickrama294@gmail.com";

                           $headers  = 'From:'.$from . "\r\n" .
                           'MIME-Version: 1.0' . "\r\n" .
                           'Content-type: text/html; charset=utf-8';
                           
                           mail($email,$subject,$msg,$headers);
                           
                           echo "<h2 align='center'> Your message has sent sucessfully </h2>";
                           
                       }
                       
                       ?>
                       
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-12 Finish -->
        </div>  
    <?php 
    
    include("includes/footer.php");
    
    ?>
        
       
        <script src="Js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/e9fa5853c0.js" crossorigin="anonymous"></script>
        
    </body>
    </html>  
    
    
                           