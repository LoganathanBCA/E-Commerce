<?php 
session_start();
	if(!isset($_SESSION["UID"]))
	{
		echo "<script>window.open('login.php','_self')</script>";
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
        <div class="row" >
			<div class="col-md-12">
				   <h2 class="page-header text-primary"> Dashboard <small> Thank you for Using..!</small></h2>	
			</div>
			<div class="col-md-3">
				<?php
					include "user_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
			 <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="user_address.php">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-edit fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Deliver Address
                                </div>
                                <div class="circle-tile-number text-faded">
                                   
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="user_address.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
				<!--	 <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="bulk_order">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-cloud-upload fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Bulk Orders
                                </div>
                                <div class="circle-tile-number text-faded">
                                  
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="bulk_order" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="user_change.php">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-cogs fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Change Password
                                </div>
                                <div class="circle-tile-number text-faded">
								
                                </div>
                                <a href="user_change.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="add_review.php">
                                <div class="circle-tile-heading apple">
                                    <i class="fa fa-plus-circle fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content apple">
                                <div class="circle-tile-description text-faded">
                                    Add Review
                                </div>
                                <div class="circle-tile-number text-faded">
								
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="add_review.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
					  <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="view_fav.php">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-heart fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Favourites
                                </div>
                                <div class="circle-tile-number text-faded">
									
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="view_fav.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                   
					 <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile shadow2">
                            <a href="stude_prev_order.php">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-archive fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Previous Order
                                </div>
                                <div class="circle-tile-number text-faded">
                                   
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="stude_prev_order.php" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
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
