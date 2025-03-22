<?php 
	$quote=array();
	$quote[]="<span class='fa-lg fa fa-recycle'></span> Keep The City Green And Clean";
	$quote[]="<span class='fa-lg fa fa-tint'></span> Dont Waste Food And Water";
	$quote[]="<span class='fa-lg fa fa-globe'></span> Plant Tree And Save Earth";
?>
	 <footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"> Gramy Traders</div>
        <p>CONTACT ADDRESS</p>
 <p><i class="fa fa-map-marker fa-lg"></i> NO.6,7 Devadharshini Complex,Seelanaicken Patty,Salem - 636201</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 9344441950,51,52</p>
        <p><i class="fa fa-send"></i>Office E-mail : gramytraders@gmail.com</p>
        <p><i class="fa fa-envelope"></i>Order E-mail : gramyorders@gmail.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">General Links</h6>
        <ul class="footer-ul">
         <li><a href="carrer"> Career</a></li>
          <li><a href="product"> Product</a></li>
          <li><a href="terms"> Terms & Conditions</a></li>
          <li><a href="payment"> Payment Details</a></li>
          <li><a href="bulkorder"> Bulk Orders</a></li>
          <li><a href="branch"> Our Clients</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">User Review</h6>
        <div class="post">
		<?php 
			$sq="SELECT * FROM review ORDER By RID DESC LIMIT 0,3";
			$re=$db->query($sq);
			if($re->num_rows>0)
			{
				while($ro=$re->fetch_assoc())
				{
					$a=date_parse($ro["LOGS"]);
						$c=date("F")." ".$a["day"].",".$a["year"];	
					echo "<p>{$ro["MES"]}   <span>{$c}</span></p>";
					
					
				}
			}
		 ?>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
			<h6 class="heading7"<?php echo $quote[rand(0,2)]; ?></h6>
			<img src="img/logo.jpg" style='margin-bottom:15px;' class="img-responsive img-thumbnail">
      </div>
    </div>
  </div>
</footer>

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>Copyright &copy; <?php echo date("Y"); ?> Gramy Traders Designed By <a href='http://www.tutorjoes.com'  target='_blank' style='text-decoration:none; color:blue;'>Tutor Joes</a></p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="about">About us</a></li>
        <li><a href="contact">Contact us</a></li>
      </ul>
    </div>
  </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/formValidation.js"></script>


 	<script>
$(".alert").fadeTo(1000, 1000).slideUp(2000, function(){
    $(".alert").fadeOut(3000);
});
	
</script>

