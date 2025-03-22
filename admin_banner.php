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
  <style>


#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
margin-top:30px;
margin-bottom:20px;
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #fff;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
   -webkit-animation-duration: 0.4s;
    animation-name: zoom;
    animation-duration: 0.4s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
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
				   <h2 class="page-header text-info"> Add Banner Image</h2>	
			</div>
	  
			<div class="col-md-3">
				<?php
					include "admin_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
					
				
					<?php

					
if(isset($_POST["submit"])) 
{

	$target_dir = "img/";
	$target_file = $target_dir .time(). basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
	else 
	{
        $uploadOk = 0;
    }


	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2000000) 
	{
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	}
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			 $sql="insert into banner (BNAME,CONTENT) values ('{$target_file}','{$_POST["btxt"]}');";
			$con->query($sql);
			echo "Banner Image uploaded.";
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}

}

?>
					

		<form  action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
									<label class="text-primary">Banner Text </label>
									<input type="text"   name="btxt" class='form-control' id="txt" placeholder="Enter Banner Text"/>
								</div>
								<div class="form-group">
									<label class="text-primary">Select Your File </label>
									<input  type="file"  name="fileToUpload" class='form-control' id="fileToUpload" />
								</div>
								<div class="form-group">
									<button type="submit" id="submit-btn" name="submit" class='btn btn-success'><i class="fa fa-upload"></i> Upload</button>
								</div>
							
						</form>
					
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary">
						  <div class="panel-heading"><b>Important Note:</b></div>
						  <div class="panel-body">
							<ol>
								<li>Please Upload Image File Only</li>
								<li>File Size Must Be Less Than 2 MB</li>
								<li>File Dimension 1900*1080 </li>
							</ol>
						  </div>
						</div>
					</div>
				</div>
			</div>			
			<div class="col-md-9">	
				<h4 class="text-primary">Banner Details</h4>
				<div id="out"></div>
				 <table class="table table-hover table-bordered table-striped">
                                   <thead>
                                       <tr class="text-primary">
                                           <th>S.no</th>
                                           <th>Banner Text</th>
                                           <th>Image</th>
                                           <th>Delete</th>

                                       </tr>
                                   </thead>
                                   <tbody>
								   <?php 
										$sql= "select * from banner";
										$res=$con->query($sql);
										if($res->num_rows>0)
										{
											$i=0;
											while($row=$res->fetch_assoc())
											{
												$i++;
												echo'
													<tr>
													   <td>'.$i.'</td>
													   <td>'.$row["CONTENT"].'</td>
													   <td><img src="'.$row["BNAME"].'" class="img-thumbnail imgs" height"100px" width="100px" ></td>
													   <td><a  href="#" dataId="'.$row['BID'].'" class="delData"><i class="fa fa-trash text-danger"></i></a></td>
													</tr>
												';
											}
										}
								   
								   ?>
                                      
                                      
                                   </tbody>
                               </table>		
			</div>
       </div>                           
</div>
     <div id="myModal" class="modal">
		  <span class="close">&times;</span>
			<img class="modal-content" id="img01">
		  <div id="caption"></div>
	</div>
<hr>
<?php require "footer.php"; ?>
   <script>
	$(document).ready(function(){
		$("img").click(function(){
			var a=$(this).attr("src");
			$("#img01").attr("src",a);
			$("#myModal").show();
		});

		$(".close").click(function(){
			$("#myModal").hide();
		});
		//----banner
		$(".delData").click(function(e){
		e.preventDefault();
		var did=$(this).attr("dataId");
		var row=$(this);
		$.ajax({
			type:'POST',
			url:'admin_banner_del',
			data:{id:did},
			beforeSend:function(){
				$("#out").html("Deleting..");
			},
			success:function(data){
				$("#out").html("<div class='alert alert-success' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+data+"</div>");
				row.closest("tr").hide();
			}
		});
	});
		
	});
</script>
</body>

</html>
