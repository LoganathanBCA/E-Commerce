<?php 
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('alogin.php','_self')</script>";
	}
include("config.php");

?>


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
        <div class="row">
			<div class="col-md-12">	
				   <h2 class="page-header text-info">Search User Details</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "admin_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
				<div class="form-group"> 
					<input type="text" class="form-control input-lg" id="txtSearch" placeholder="Search Text Here">
				</div>
				<div id="output">	
					
				</div>	
	
			</div>
       </div>                          
</div>
<hr>
<?php require "footer.php"; ?>
<script>
$(document).ready(function(){

let debounce;
$("#txtSearch").keyup(function(){
    clearTimeout(debounce);
    debounce = setTimeout(function() {
        var q = $("#txtSearch").val();
        if (q.trim() === '') {
            $("#output").html('');
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'admin_search.php',
            data: { txt: q },
            success: function(data) {
                $("#output").html(data);
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    }, 300);
});

});
</script>
</body>
</html>
