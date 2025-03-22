<?php 
session_start();
include "config.php";

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

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Products <small>Time To Wake Up</small>
                </h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-bottom:50px;">
			<form method="get" action="view_product" class="form-horizontal">
            <select data-placeholder="Search Your Product" name="pid" class="chosen-select" tabindex="2">
              <option value=""></option>
			<?php 
				 $sq="SELECT TNAME,PNAME,PID FROM products where SUB_PRO=0 ";
				$re=$con->query($sq);
				if($re->num_rows>0)
				{
						while($ro=$re->fetch_assoc())
						{
							echo ' <option value="'.$ro["PID"].'">'.$ro["PNAME"].'<small> ( '.$ro["TNAME"].' )</small></option>';
						}
				}
			?>	
            </select>
			
			
         </form>
			</div>
			<div style="clear:both;"></div>
			
			<!------------------>
			

	
        <?php 
		
$sql="SELECT * FROM products WHERE  SUB_PRO=0";
  $res=$con->query($sql);
  $pro=array();
  if($res->num_rows>0)
  {
	while($row=$res->fetch_assoc())
	{
		$pro[]=$row;
	}
  }

  
  $sql="SELECT * FROM pro_category";
  $res=$con->query($sql);
  $cid=array();
  if($res->num_rows>0)
  {
	while($row=$res->fetch_assoc())
	{
		$cid[]=$row;
	}
  }
  

  for($j=0;$j<count($cid);$j++)
  {
			echo "<h5 class='page-header text-center'>".($j+1).".{$cid[$j]["CNAME"]}</h5>";
  
			for($i=0;$i<count($pro);$i++)
			{
	
				if($pro[$i]["CID"]==$cid[$j]["CID"])
				{
						?>
						<a href='view_product.php?pid=<?php echo $pro[$i]["PID"]; ?>'>
						<div class="col-xs-12 col-sm-6 col-md-3 animated zoomIn">
							<div class="thumbnail shadow-depth-4" >
								<img src="products/<?php echo $pro[$i]["LOC"];?>" class="img-responsive iimg">
								
								<div class="caption">
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4 price">
											  <div id="ribbon">
														<?php echo "RS.".$pro[$i]["NPRICE"];?>
												</div>
												<div id="ribbon1">
													<?php echo "RS.".$pro[$i]["OPRICE"];?>
												</div>
										</div>
										<div class="col-md-8 col-sm-8 col-xs-8">
											<!--<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>-->
											<p style="font-size:12px;font-weight:bold;color:blue;"><?php echo $pro[$i]["TNAME"]; ?></p>
											<p><?php echo $pro[$i]["PNAME"]; ?></p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						</a>
						<?php 
				}
				
			}
			echo "<hr style='clear:both;'>";
  }
			?>

      
        </div>
        <!-- /.row -->


      

       
     </div>    

	 <?php
		require "footer.php";
	 ?>
	 <script src="js/chosen.jquery.min.js"></script>
<script>
      $(function() {
			$("select").chosen({ width: '100%' });
			$('.chosen-select').chosen();
			$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
	  
	  	
    </script>
  

</body>

</html>
