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
                   Bulk Order <small> Delivery You Best Quality</small>
                </h1>

			</div>
			<div class="col-md-6">
				<img src='img/b1.jpg' class="img-thumbnail img-responsive">
			</div>
			<div class="col-md-6">
			<h3 class="blukTitle">Quality</h3>
			<p class="blukPara">One view of quality is that it is defined entirely by the customer or end user, and is based upon that person's evaluation of his or her entire customer experience[citation needed]. The customer experience is defined as the aggregate of all the interactions that customers have with the company's products and services.</p></div>
			<p class="clearfix"></p> 
		
			<div class="col-md-6">
			<h3 class="blukTitle">Delivery</h3>
			<p class="blukPara">Door-to-door delivery solution offered by Safexpress. This service is customized for SMEs and individuals having smaller loads to be shipped anywhere in the country. These could be small business shipments, samples, promotional items. The service is ideal for movement of products not having industrial packing. </p></div>
			
				<div class="col-md-6">
						<img src='img/b2.jpg' class="img-thumbnail img-responsive">
					</div>
			<p class="clearfix"></p>
			<div class="col-md-6">
						<img src='img/b3.jpg' class="img-thumbnail img-responsive">
					</div>
			<div class="col-md-6">
			<h3 class="blukTitle">Payment Terms</h3>
			<p class="blukPara">We Provide Cash on delivery options.Cash on delivery (COD) is a type of transaction in which the recipient makes payment for a good at the time of delivery. If the purchaser does not make payment when the good is delivered, then the good is returned to the seller. The recipient can make payment by cash, certified check or money order, depending on what is the shipping contract stipulates.</p></div>
			<p class="clearfix"></p>
			
			<div class="col-md-6">
			<h3 class="blukTitle">Bulk Order Offers</h3>
			<p class="blukPara">Wholesale is selling goods in tremendous quantities at a low unit price to retail merchants. The wholesaler will accept a slightly lower sales price for each unit, if the retailer will agree to purchase a much greater quantity of units, so the wholesaler can maximize his profit. A wholesaler usually represents a factory where goods are produced. The factory owners can use economy of scale to increase profit as quantities sold soars.</p></div>
			<div class="col-md-6">
				<img src='img/b4.jpg' class="thumbnail img-responsive">
			</div>
		</div>
        <!-- /.row -->
        <h3 class="text-primary page-header"> For Bulk Orders Please Download , Fill This form and send to us. <a href='list.docx' class='btn btn-link ' target='_blank'><i class='fa fa-download'></i> Download Word Document</a></h3>
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
