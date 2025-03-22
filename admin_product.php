<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	require "head.php";
?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<?php 
	include "topnav.php";
?>
<div class="container" style="margin-top:30px">
                                           
        <div class="row" >
		
		<div class="col-md-12">
			
			   <h2 class="page-header"> Product <small> Add Product Details</small></h2>
			
		</div>
	  
		<div class="col-md-3">
			<?php
				include "admin_sidnav.php";
			?>
		</div>
		<div class="col-md-9">
				<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
						Upload image <input type="file" name="photoimg" id="photoimg" />
				</form>
				<div id='preview'>
				
				</div>
								
		</div>
     </div>
                               
</div>
<hr>
<?php require "footer.php"; ?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	$('#photoimg').live('change', function(){ 
		$("#preview").html('');
		$("#preview").html('<img src="loading.gif" alt="Uploading...."/>');
		$("#imageform").ajaxForm(
		{
			target: '#preview'
		}).submit();
	});
}); 
</script>
</body>
</html>