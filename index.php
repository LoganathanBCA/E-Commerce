<?php
session_start();
include "config.php";
if(isset($_SESSION["UID"]))
{
echo "<script>window.open('user_home.php','_self')</script>";
}
if(isset($_SESSION["AID"]))
{
echo "<script>window.open('admin_home.php','_self')</script>";
}

$s="SELECT * FROM banner";
$r=$con->query($s);
$banner=array();
if($r->num_rows>0)
{
	while($ro=$r->fetch_assoc())
	{
		$banner[]=$ro;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	require "head.php";
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
	include "topnav.php";
?>

    <header id="myCarousel" class="carousel slide" style="margin-top:1px;">

        <ol class="carousel-indicators">
		<?php 
			if(count($banner)>0)
			{
				for($i=0;$i<count($banner);$i++)
				{
					if($i==0)
					{
						echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
					}
					else
					{
						echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
					}
				}
			}
		?>
        </ol>
        <div class="carousel-inner">
		
		<?php 
			if(count($banner)>0)
			{
				for($i=0;$i<count($banner);$i++)
				{
					if($i==0)
					{
						?>
							<div class="item active">
							   <div class="fill" style="background-image:url('<?php echo $banner[$i]["BNAME"]; ?>');"></div>
								<div class="carousel-caption">
									<h2><?php echo $banner[$i]["CONTENT"]; ?></h2>
								</div>
							</div>
						<?php
					}
					else
					{
						?>
							<div class="item">
							   <div class="fill" style="background-image:url('<?php echo $banner[$i]["BNAME"]; ?>');"></div>
								<div class="carousel-caption">
									<h2><?php echo $banner[$i]["CONTENT"]; ?></h2>
								</div>
							</div>
						<?php
					}
				}
			}
		?>
           
           
   
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header> 
	



    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Product Review Monitoring  
                </h1>
				
            </div>
            <div class="col-md-12">
			<div class="container">
			
    <div class="row">
	
	 <div class="col-lg-12">
                <h3 class="text-primary">
                    <i class='fa fa-gift'></i> Latest Deals
                </h3>
            </div>
        <?php 
		
$sql="Select offers.PID, products.PNAME,products.TNAME, products.LOC,products.OPRICE, products.NPRICE
From offers Inner Join
products On offers.PID = products.PID where products.SUB_PRO=0

";
  $res=$con->query($sql);
  $offer=array();
  if($res->num_rows>0)
  {
	while($row=$res->fetch_assoc())
	{
		$offer[]=$row;
	}
  }
			for($i=0;$i<count($offer);$i++)
			{
		?>
			<a href='view_product.php?pid=<?php echo $offer[$i]["PID"]; ?>'><div class="col-xs-12 col-sm-6 col-md-3 animated slideInUp">
				<div class="thumbnail shadow-depth-4" >
					<img src="products/<?php echo $offer[$i]["LOC"];?>" class="img-responsive iimg" >
					
					<div class="caption">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4 price">
    							  <div id="ribbon">
										<?php echo "RS.".$offer[$i]["NPRICE"];?>
									</div>
									<div id="ribbon1">
										<?php echo "RS.".$offer[$i]["OPRICE"];?>
									</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<!--<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>-->
								<p style="font-size:12px;font-weight:bold;color:blue;"><?php echo $offer[$i]["TNAME"];?></p>
								<p><?php echo $offer[$i]["PNAME"];?></p>
								
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
        <!-- /.row -->


      

        <hr>
     </div>    
<?php 
	require "footer.php";
?>

   
    <script>
    $('.carousel').carousel({
        interval: 5000 
    })
    </script>

</body>

</html>
