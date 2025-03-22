<?php 
session_start();
	if(!isset($_SESSION["SKID"]))
	{
		echo "<script>window.open('index','_self')</script>";
	}
include("config.php");



	$sql="SELECT * FROM contact order by MID desc";
	$res=$con->query($sql);
	$m=0;
	$mes=array();
	if($res->num_rows>0)
		{
				$m=$res->num_rows;
				while($row=$res->fetch_assoc())
				{
					$mes[]=$row;
				}
		}
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
				   <h2 class="page-header text-info"> View Feedback</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "shop_sidenav.php";
				?>
			</div>
			<div class="col-md-offset-1 col-md-8">
			<div id='output'></div>
				<?php
					if(count($mes)>0)
						{
							for($i=0;$i<count($mes);$i++)
							{
							?>
						<div class="mes">
							<h4><i class="fa fa-user"></i> <?php echo $mes[$i]["FNAME"];?>  <?php echo $mes[$i]["LNAME"];?> 
								<p class="pull-right"><i class="fa fa-clock-o"> <?php echo $mes[$i]["LOGS"];?></i></p>
							
							</h4><hr>
							<p><i class="fa fa-comment"></i> : <?php echo $mes[$i]["MES"];?></p>
							<p><i class="fa fa-envelope"></i> : <?php echo $mes[$i]["MAIL"];?> 
							<i class="fa fa-phone"></i> : <?php echo $mes[$i]["PHONE"];?>
						<a href="#" dele=<?php echo $mes[$i]["MID"];?> class="pull-right delmes"><i class="fa fa-trash text-danger"></i></a>
	
							</p><hr>
					</div>
						<?php
							}
						}
					else
						{
							echo "No messages...";
						}
				?>
			</div>
       </div>

                               
</div>

<?php require "footer.php"; ?>


<script>
$(document).ready(function(){

	$(".delmes").click(function(e){
		e.preventDefault();

		var did=$(this).attr("dele");
		var row=$(this);
		$.ajax({
			type:'POST',
			url:'admin_mes_delete',
			data:{id:did},
			beforeSend:function(){
				$("#output").html("Deleting..");
			},
			success:function(data){
				$("#output").html("<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+data+"</div>");
				row.closest(".mes").hide();
			}
		});
	});
});
</script>


</body>

</html>
