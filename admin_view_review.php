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
				   <h2 class="page-header text-info">  User Reviews </h2>	
			</div>
			<div class="col-md-3">
				<?php
					include "admin_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
				<div id='output'></div>
				<?php						
						$sql="Select user_reg.UNAME, review.MES,review.RID, review.LOGS
From review Inner Join
  user_reg On review.UID = user_reg.UID order by review.UID desc";

$result=$con->query($sql);
					
$result=$con->query($sql);
//Total Number of Rows
$total_rows=$result->num_rows;


//Total Rows Per Page
$page_rows=50;

//Last Page Number
$last=ceil($total_rows/$page_rows);
if($last<1)
{
	$last=1;
}

//Default Page Number
$pagenum=1;

//Getting Page number 
if(isset($_GET['pn']))
{
	$pagenum=preg_replace('#[^0-9]#','',$_GET['pn']);
}


if($pagenum<1){
	$pagenum=1;
}
elseif($pagenum>$last)
{
	$pagenum=$last;
}


//Limit Values
$limit='LIMIT '.($pagenum-1)*$page_rows.','.$page_rows;

$sql="Select user_reg.UNAME, review.MES,review.RID, review.LOGS
From review Inner Join
  user_reg On review.UID = user_reg.UID order by review.UID desc $limit";
					$result=$con->query($sql);

$text1="Total $total_rows Reviews";
$text2="$pagenum Page of $last";

//Pagination Controls
$pagination='<ul class="pagination">';

if($last!=1)
 {
		 if($pagenum>1)
		 {
			 $previous=$pagenum-1;
			 $pagination.=' <li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a></li>';
			 for($i=$pagenum-4;$i<$pagenum;$i++)
			 {
				 if($i>0)
				 {
					 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li>';
				 }
			 }
		 }
	 

	 $pagination.='<li class="active" 	><a href="#"  >'.$pagenum.'</a></li> ';
	 
	 for($i=$pagenum+1;$i<=$last;$i++)
	 {
		 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> </li>';
		 if($i>=$pagenum+4)
		 {
			 break;
		 }
	 }
	 
	 if($pagenum!=$last)
	 {
		 $next=$pagenum+1;
		 $pagination.='<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a></li></ul>';
	 }
	else
	{
		 $pagination.='</ul>';
	}
 }
$list='';
 $result=$con->query($sql);
						if($result->num_rows>0)
						{
								$list.= "<table class='table table-hover table-bordered table-striped'>";
									$list.= '
					<thead class="text-primary">
									 <tr>
                                          <th>S.no</th>
                                           <th>User Name</th>
                                           <th>Review</th>
                                           <th>Date</th>
                                           <th>Delete</th>
                                       </tr>
					</thead>';
										$p=isset($_GET["pn"])?$_GET["pn"]:1;
										$i=($p*$page_rows)-$page_rows;
										while($row=$result->fetch_assoc())
										{
											$i++;
											$list.="<tr>";
											$list.= "<td>$i</td>";
											$list.= '<td>'.$row["UNAME"].'</td>';
											$list.= '<td>'.$row["MES"].'</td>';
											$list.= '<td>'.$row["LOGS"].'</td>';
											$list .= '<td><a href="#" class="btn btn-danger btn-xs delpro" data-id="'.$row['RID'].'">
            <i class="fa fa-trash"></i> Delete
          </a></td>';

											$list.="</tr>";
										}
								$list.= "</table>";
						}
						else
						{
								$list.= "<div class='alert alert-danger'>No Reviews are Found</div>";
						}


				
				echo $list; 
				
				echo $pagination; ?>	

<h4 align="right" class='text-primary'><?php echo $text1; ?></h4>
<p align="right"><?php echo $text2; ?></p>				
				
	
			</div>
       </div>                           
</div>
<hr>
<?php require "footer.php"; ?>
<script>
$(document).ready(function(){
    $(".delpro").click(function(e){
        e.preventDefault();
        var did = $(this).data("id");  // Use data-id instead of attr("del")
        var row = $(this).closest("tr");

        if (confirm("Are you sure you want to delete this review?")) {
            $.ajax({
                type: 'POST',
                url: 'admin_del_review.php',  // Ensure correct file extension
                data: { id: did },
                beforeSend: function(){
                    $("#output").html("Deleting...");
                },
                success: function(data){
                    $("#output").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + data + "</div>");
                    row.fadeOut(500, function(){ $(this).remove(); });  // Smooth fade-out effect
                },
                error: function(xhr, status, error){
                    $("#output").html("<div class='alert alert-danger'>Error: " + error + "</div>");
                }
            });
        }
    });
});

</script>





</body>

</html>
