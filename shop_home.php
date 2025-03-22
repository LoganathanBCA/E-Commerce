<?php 
session_start();
	if(!isset($_SESSION["SKID"]))
	{
		echo "<script>window.open('index','_self')</script>";
	}
include("config.php");


function countRecord($sql,$con)
{
 
	 $res=$con->query($sql);
	 if($res->num_rows>0)
	 {
		 $row=$res->fetch_assoc();
		 return($row["counts"]);
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
        <div class="row" >
		<div class="col-md-12">
			   <h2 class="page-header"> Dashboard <small>  Control Panel</small></h2>
		</div>
		<div class="col-md-3">
			<?php
				include "shop_sidenav.php";
			?>
		</div>
		<div class="col-md-9">
                  	 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="shop_change">
                                <div class="circle-tile-heading brick">
                                    <i class="fa fa-cogs fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content brick">
                                <div class="circle-tile-description text-faded">
                                    Settings
                                </div>
                                <div class="circle-tile-number text-faded">
                                   <p style="font-size:15px;">Change Password</p>
                                </div>
                                <a href="shop_change" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="shop_compl_order">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Completed Orders
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo countRecord("Select count(orders.id) as counts From orders Where orders.status = 1",$con);	?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="shop_compl_order" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="shop_pending_order">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-archive fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Pending Order
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo countRecord("Select count(orders.id) as counts From orders Where orders.status <> 1",$con);	?>
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="shop_pending_order" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="shop_view_feedback">
                                <div class="circle-tile-heading purple">
                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                    Feedback
                                </div>
                                <div class="circle-tile-number text-faded">
									<?php echo countRecord("SELECT count(*) as counts FROM contact",$con);	?>
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="shop_view_feedback" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
				
            </div>
            </div>
</div>
<hr>
<?php require "footer.php"; ?>
</body>
</html>