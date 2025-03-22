<?php
include"config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require "head.php";
?>

</head>
<body>
<?php 
	include "topnav.php";
?>

 

<div class="container">
<div class="row">

      <div class="col-md-12">   <h1 class='page-header'>Contact Us</h1></div>
      <div class="col-md-2"> </div>
      <div class="col-md-8">
     
        <p class="lead">Have a question or want further information?</p>
        
        <p>Fill in the short form and we will get back to you as soon as possible.</p> <br> 
         
        <!-- BEGIN DOWNLOAD PANEL -->
        <div class="panel panel-default well shadow-depth-4">
          <div class="panel-body">
		  <?php
				if(isset($_POST["submit"]))
						{
								$sql="INSERT INTO contact(FNAME,LNAME,MAIL,PHONE,MES,LOGS) 
								VALUES('{$_POST["fname"]}','{$_POST["lname"]}','{$_POST["mail"]}','{$_POST["phone"]}','{$_POST["mes"]}',NOW())";
								if($con->query($sql))
								{
									echo"<div class='alert alert-success'>Message Send Successfully...</div>";
								}
								else
								{
									echo"<div class='alert alert-danger'>Message Not Send..Try Again..!</div>";
								}
						
						}
					
		  
		  ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-horizontal">
              <div class="form-group">               
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                            </div>
                    <input type="text" class="form-control txtOnly"   placeholder="Enter first name" name="fname">
                        </div>
                   </div>                
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                            </div>
                    <input type="text" class="form-control txtOnly"  placeholder="Enter last name" name="lname"></div>
                        </div>
                        </div>

              <div class="form-group">               
                          <div class="col-sm-6">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input type="email" class="form-control" id="mail" placeholder="Enter email" name="mail">
                        </div>
                  </div>                
              
              
                <div class="col-sm-6">
                  <div class="input-group">
                              <div class="input-group-addon">
                      <i class="fa fa-phone"></i>                      
                    </div>
                    <input type="text" class="form-control num" id="phone" maxlength="10" placeholder="Phone" name="phone">
                  </div>                                    
                </div>
                      </div>
                
                      <div class="form-group">
                        <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-comment fa-2"></i>                
                    </div>                  
                    <textarea class="form-control" name="mes" id="mes" rows="5" style="width:99.9%" placeholder="Enter your message here"></textarea>
                  </div>                                    
                </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-12">
                  <button id="contacts-submit" type="submit" name="submit" class="btn btn-success">Send Message</button>
                        </div>
                      </div>
            <input type="hidden" value=""></form>
          </div><!-- end panel-body -->
        </div><!-- end panel -->
        <!-- END DOWNLOAD PANEL -->
      </div><!-- end col-md-8 -->
      <div class="col-md-2"> </div>
        </div>
</div>
		
		
		
        <hr>
    

	 <?php
		require "footer.php";
	 ?>

  

</body>

</html>
