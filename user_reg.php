<?php
	include "config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require "head.php";
?>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php 
	include "topnav.php";
?>

 

<div class="container " style="margin-top:30px">

<div class="row">

<div class="col-md-offset-3 col-md-6 ">


       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading text-primary">New User Sign Up</h2><hr />
        
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        
       	<div style="margin-bottom: 12px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
        </div>
         <div style="margin-bottom: 12px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
           <div style="margin-bottom: 12px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
        
         <div style="margin-bottom: 12px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
        </div>
		
		 	<div style="margin-bottom: 12px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
			<input type="text" class="form-control" placeholder="Contact No" name="user_cont" id="user_cont" />
        </div>
			<div style="margin-bottom: 12px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
			<input type="text" class="form-control" placeholder="City" name="user_place" id="user_place" />
        </div>
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="btn-save" id="btn-submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
        </div>  
      
	  
		
      </form>
</div>
</div>
</div>
		
        <hr>
    

	 <?php
		require "footer.php";
	 ?>
	 <script src="js/validation.min.js"></script>
	 <script src="script.js"></script>

  

</body>

</html>
