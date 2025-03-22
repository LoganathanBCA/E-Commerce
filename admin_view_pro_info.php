<?php 
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('alogin','_self')</script>";
	}
include("config.php");


if(isset($_POST["submit"]))
{
	 $sql="UPDATE products SET PNAME='{$_POST["pname"]}',CID='{$_POST["cate"]}',
	OPRICE='{$_POST["oprice"]}',NPRICE='{$_POST["nprice"]}',DES='{$_POST["des"]}',STARS='{$_POST["star"]}',DES2='{$_POST["des2"]}',REVIEW='{$_POST["review"]}' WHERE PID='{$_POST["pid"]}'";
	$con->query($sql);

}


if(isset($_GET['id']))
		{
			$sql="Select products.PNAME,products.TNAME,products.SUB_PRO,products.PID,products.OPRICE, products.STARS, products.NPRICE,
  products.REVIEW, products.DES, products.DES2, pro_category.CNAME,pro_category.CID,products.LOC
From products Inner Join
  pro_category On pro_category.CID = products.CID WHERE products.PID='{$_GET['id']}'";
			$res=$con->query($sql);
			$re=$res->fetch_assoc();
		}
		function getproductNAme($con,$id)
		{
			$name="";
			$sql="SELECT PNAME FROM products WHERE PID=".$id;
				$re=$con->query($sql);
				if($re->num_rows>0)
				{
					$name=$re->fetch_assoc();
					return $name["PNAME"];
				}
				else
				{
					return "Select";
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
<style>
	#preview{
		margin-top:30px;
		margin-bottom:30px;
		height:200px;
		width:250px;
	}
</style>
</head>
<body>
<?php 
	include "topnav.php";
?>
<div class="container" style="margin-top:30px">                                    
        <div class="row">
			<div class="col-md-12">	
				   <h2 class="page-header text-primary"> Update Products
						<a href="admin_view_product.php" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
				   </h2>	
			</div>
			
			<div class="col-md-6">
				<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="POST">
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Product Name : </label>
								 <input type="text"  name="pname" value="<?php echo $re["PNAME"];?>"  required  class="form-control" placeholder="Product Name">
							 </div>
							  <!--<div class="form-group col-md-6">
								 <label class="text-primary"> Tamil Name : </label>
								 <input type="text"  name="tname" value="<?php echo $re["TNAME"];?>"  required  class="form-control" placeholder="Product Name">
							 </div>
							  <div class="form-group col-md-6">
								 <label class="text-primary"> Sub Product For : </label>
									<select class="form-control" name="subpro" required>
									<option value="<?php if($re["SUB_PRO"]!="0"){echo $re["SUB_PRO"];}else{echo "0";}?>"><?php echo getproductNAme($con,$re["SUB_PRO"]);?></option>
									<option value='0'>None</option>
									<?php 
										$sql="SELECT PID,PNAME FROM products";
										$res=$con->query($sql);
											if($res->num_rows>0)
												{
													while($row=$res->fetch_assoc())
													{
														if($re["PID"]!=$row["PID"])
														echo "<option value='{$row["PID"]}'>{$row["PNAME"]}</option>";
													}
												}
									?>
									</select>
							 </div>-->
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Category : </label>
									<select class="form-control" name="cate">
									<option value="<?php echo $re["CID"];?>"><?php echo $re["CNAME"];?></option>
									<?php 
										$sql="SELECT * FROM pro_category";
										$res=$con->query($sql);
											if($res->num_rows>0)
												{
													while($row=$res->fetch_assoc())
													{
														if($re["CID"]!=$row["CID"])
														echo "<option value='{$row["CID"]}'>{$row["CNAME"]}</option>";
													}
												}
									?>
									</select>
							 </div>
							 
							  <div class="form-group col-md-6">
								 <label class="text-primary"> Old Price : </label>
								 <input type="text"  name="oprice" value="<?php echo $re["OPRICE"];?>"  required  class="form-control" placeholder="Old Price">
							 </div>
							  <div class="form-group col-md-6">
								 <label class="text-primary"> New Price : </label>
								 <input type="text"  name="nprice"  required value="<?php echo $re["NPRICE"];?>" class="form-control" placeholder="New Price">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Stars : </label>
								 <input type="text"  name="star"  required value="<?php echo $re["STARS"];?>"  class="form-control" placeholder="Stars">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Reviews : </label>
								 <input type="text"  name="review"  required value="<?php echo $re["REVIEW"];?>"  class="form-control" placeholder="Reviews">
							 </div>
							 <div class="form-group col-md-6">
								 <label class="text-primary"> Description - 1 : </label>
								 <textarea type="text"  name="des" style="resize:none;" rows="5" required  class="form-control" placeholder="Description Should be Here"><?php echo $re["DES"];?></textarea>
							 </div>
							<div class="form-group col-md-6">
								 <label class="text-primary"> Description - 2 : </label>
								 <textarea type="text"  name="des2" style="resize:none;" rows="5"  required  class="form-control" placeholder="Description Should be Here"><?php echo $re["DES2"];?></textarea>
							 </div>
							 <input type="hidden" name="pid" value="<?php echo $re["PID"];?>">
							 <div class="form-group col-md-6">
								<button type="submit" class="btn btn-success" id="submit"  name="submit"> Update Product</button>
							</div>
				</form>

			</div>
			<div class='col-md-6'>
				<div id='preview' class="img-thumbnail shadow2">
					<img src='products/<?php echo $re["LOC"]; ?>' height='100%' width='100%' >
				</div>
				<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
						<div class="form-group">
								<input type="hidden" name="apid" value="<?php echo $re["PID"];?>">
								<label class="text-primary">Upload image (700*350)</label>
								<input type="file"  name="photoimg" id="photoimg" />
						</div>
					
				</form>
				
				<button class="btn btn-success btn-lg" id="addopro" add="<?php echo $re["PID"];?>"><i class="fa fa-gift"></i> Add To Offer Product</button>
				<p id="output"></p>
			</div>
       </div>                           
</div>

<?php require "footer.php"; ?>
<script>
$(document).ready(function(){
$("#addopro").click(function(e){
		e.preventDefault();
		var did=$(this).attr("add");
		
		$.ajax({
			type:'POST',
			url:'admin_add_opro',
			data:{id:did},
			beforeSend:function(){
				$("#output").html("Add Offers..");
			},
			success:function(data){
				$("#output").html("<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+data+"</div>");
			}
		});
	});
});
</script>
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
