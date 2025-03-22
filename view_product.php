<?php 
session_start();
	include "config.php";	
	if(isset($_GET["pid"]))
	{
		$s="SELECT * FROM products WHERE PID=".$_GET["pid"];
		$r=$con->query($s);
		if($r->num_rows>0)
		{
			$rec=$r->fetch_assoc();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	require "head.php";
?>
<link rel="stylesheet" href="css/view_product.css">
</head>
<body>
<?php 
	include "topnav.php";
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Products  Details <small> Delivery You Best Quality</small>
                </h1>
				<div class="card shadow-depth-4">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="products/<?php echo $rec["LOC"];?>" class="pro img-thumbnail"></div>
						</div>
					</div>
					<div class="details col-md-6">
					
						<h3 class="product-title" style="font-size:18px;"><?php echo $rec["PNAME"];?> </h3>
						<div class="rating">
							<div class="stars">
							<?php 
							
								for($i=1;$i<=$rec["STARS"];$i++)
								{
									echo '<span class="fa fa-star checked"></span>';
								}
								$j=5-$rec["STARS"];
								for($i=1;$i<=$j;$i++)
								{
									echo '<span class="fa fa-star"></span>';
								}
								
							?>
							</div>
							<span class="review-no"><?php echo $rec["REVIEW"];?> reviews</span>
						</div>
						<p class="product-description"><?php echo $rec["DES"];?>.</p>
						<h4 class="price">Offer Price: <span class="oldPrice">Rs.<?php echo $rec["OPRICE"];?></span>&nbsp;<span>Rs.<?php echo $rec["NPRICE"];?></span></h4>
						<p class="vote"><?php echo $rec["DES2"];?></p>
						<div class="action">
							<?php echo '<a href="cartAction.php?action=addToCart&id='.$rec["PID"].'" class="add-to-cart btn btn-default" title="'.$rec["PNAME"].'"><i class="fa fa-shopping-cart"></i> Add To Cart</a>';?>
							
						<?php 
							if(isset($_SESSION["UID"]))
							{
								?>
									<button class="like btn btn-default btn-like" data-val="<?php echo $rec["PID"];?>" type="button" title='Add As Favourite'><span class="fa fa-heart"></span></button>
									<p id="fav" style='padding-top:10px;color:greenyellow;'></p>
									<?php
										if(isset($_POST["submit"]))
											{
											$ip=$_POST["ip"];
												
												
												$ssql="select * from rate_review where PID='{$_GET["pid"]}' and UID='{$_SESSION["UID"]}'";
												$res=$con->query($ssql);
												if($res->num_rows>0)
												{
												echo "<div class='alert alert-Danger'>Your Reviews is Already Updated..!</div>";
												}
												else{
												$sql="INSERT INTO rate_review(PID,UID,MSG) VALUES ('{$_GET["pid"]}','{$_SESSION["UID"]}','{$_POST["review"]}')";
												if($con->query($sql))
												{
													echo "<div class='alert alert-success'>Insert Successfully....</div>";
												}
												else
												{
													echo "<div class='alert alert-danger'>Insert Failed....</div>";
													echo $sql;
												}
												}
											}
									
									?>
									<form action="<?php echo $_SERVER["REQUEST_URI"]?>"  method="POST">
							 <div class="form-group">
								 <label class="text-primary"> Review : </label>
								 <textarea type="text" style="resize:none;" name="review"  required   class="form-control" placeholder="Review"></textarea><input type="text" value="<?php echo $_SERVER["SERVER_ADDR"]; ?>" style="color:black;" name="ip">
							 </div>
							
							 <div class="form-group">
								<button type="submit" class="btn btn-success" id="submit" name="submit"> Save Details</button>
							</div>
				</form>	
							<?php 
							}
						?>
							
						</div>
					</div>
		
				</div>
				<div class="row" style="margin-top:10px;">
								<?php 
		
		$sql="SELECT * FROM products Where SUB_PRO = {$_GET["pid"]} ";
  $res=$con->query($sql);
  $subpro=array();
  if($res->num_rows>0)
  {
  ?>

  <?php
	while($row=$res->fetch_assoc())
	{
		$subpro[]=$row;
	}
  }
  
  for($i=0;$i<count($subpro);$i++)
			{
		?>
			<a href='view_product?pid=<?php echo $subpro[$i]["PID"]; ?>'><div class="col-xs-12 col-sm-6 col-md-3 animated slideInUp">
				<div class="thumbnail shadow-depth-4" >
					<img src="products/<?php echo $subpro[$i]["LOC"];?>" class="img-responsive">
					
					<div class="caption">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4 price">
    							  <div id="ribbon">
										<?php echo "RS.".$subpro[$i]["NPRICE"];?>
									</div>
									<div id="ribbon1">
										<?php echo "RS.".$subpro[$i]["OPRICE"];?>
									</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<!--<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>-->
								<p><?php echo $subpro[$i]["PNAME"];?></p>
								<p style="font-size:11px;"><?php echo $subpro[$i]["TNAME"];?></p>
    						</div>
						</div>
					</div>
				</div>
			</div></a>
			
			<?php 
			}
			?>
		
		

			</div>
			</div>
		</div>

            </div>
			

        
			
			
        </div>
        <!-- /.row -->
        <hr>
     </div>    

	 <?php
		require "footer.php";
	 ?>
	<script>
		$(document).ready(function(){
			$(".btn-like").click(function(){
				var pid=$(this).attr("data-val");
				$.post("addfav",{id:pid},function(data){
					$("#fav").html(data);
				});
			});
		});
	</script>
  

</body>

</html>
