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
<style>

.panel-heading{
background:#bce300 !important;
}
.panel,.panel-heading{
border-color:#bce300 !important;
}

</style>
</head>
<body>
<?php 
	include "topnav.php";
?>
<div class="container" style="margin-top:30px">                 
        <div class="row" >
			<div class="col-md-12">
				   <h2 class="page-header text-primary"> Bulk Order <small> Welcome To Food World</small></h2>	
			</div>
			<div class="col-md-3">
				<?php
					include "user_sidnav.php";
				?>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<form  method="post" enctype="multipart/form-data" id="MyUploadForm">
								<div class="form-group">
									<label class="text-primary">Select Your File </label>
									<input name="FileInput" class='form-control' id="FileInput" type="file" />
								</div>
								<div class="form-group">
									<button type="submit" id="submit-btn" class='btn btn-success'><i class="fa fa-upload"></i> Upload</button>
								</div>
							
						</form>
						<div id="output"></div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary">
						  <div class="panel-heading"><b>Important Note:</b></div>
						  <div class="panel-body">
							<ol>
								<li>Please <a href='list.docx' target='_blank'>Download</a> This Document</li>
								<li>Fill All Your Requirements</li>
								<li>Upload By This side</li>
								<li>We Will contact You</li>
							</ol>
						  </div>
						</div>
					</div>
				</div>
			</div>
       </div>                         
</div>
<hr>
<?php require "footer.php"; ?>
<script>
$(document).ready(function() {

var files;
// Add events
$('input[type=file]').on('change', prepareUpload);
// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
}

$('form').on('submit', uploadFiles);

// Catch the form submit and upload the files
function uploadFiles(event)
{
  event.stopPropagation(); // Stop stuff happening
    event.preventDefault(); // Totally stop stuff happening

    // START A LOADING SPINNER HERE

    // Create a formdata object and add the files
    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });

    $.ajax({
        url: 'submit.php?files',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		beforeSend:function()
		{
	
		  $("#output").html("<img src='img/ajax-loader.gif	'>");
		},
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                submitForm(event, data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}


function submitForm(event, data)
{
  // Create a jQuery object from the form
    $form = $(event.target);

    // Serialize the form data
    var formData = $form.serialize();

    // You should sterilise the file names
    $.each(data.files, function(key, value)
    {
        formData = formData + '&filenames[]=' + value;
    });

    $.ajax({
        url: 'submit.php',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                console.log('SUCCESS: ' + data.success);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
        },
        complete: function()
        {
           $("#output").html("File Uploaded");
        }
    });
}


});

</script>
</body>

</html>
