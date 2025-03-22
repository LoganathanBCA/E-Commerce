<?php 
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('alogin','_self')</script>";
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
			   <h2 class="page-header"> Dashboard <small> Admin Control Panel</small></h2>
		</div>
		<div class="col-md-3">
			<?php
				include "admin_sidnav.php";
			?>
		</div>
		<div class="col-md-9">
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_view_user.php">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Users
                                </div>
                                <div class="circle-tile-number text-faded">
                                   <?php echo countRecord("select count(*) as counts from user_reg",$con);	?>
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="admin_view_user.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_latest_offers.php">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Latest Offers
                                </div>
                                <div class="circle-tile-number text-faded">
								<?php echo countRecord("select count(*) as counts from offers",$con);	?>
                                </div>
                                <a href="admin_latest_offers.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_add_category.php">
                                <div class="circle-tile-heading apple">
                                    <i class="fa fa-keyboard-o fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content apple">
                                <div class="circle-tile-description text-faded">
                                    Category
                                </div>
                                <div class="circle-tile-number text-faded">
									<?php echo countRecord("select count(*) as counts from pro_category",$con);	?>
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="admin_add_category.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_add_product.php">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-tasks fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Products
                                </div>
                                <div class="circle-tile-number text-faded">
									<?php echo countRecord("select count(*) as counts from products",$con);	?>			 
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="admin_add_product.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="#">
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
                                <a href="admin_compl_order.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="#">
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
                                <a href="admin_pending_order.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_view_feedback.php">
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
                                <a href="admin_view_feedback.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
				 <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="admin_change.php">
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
                                <a href="admin_change.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
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