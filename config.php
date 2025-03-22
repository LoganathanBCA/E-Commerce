 <?php
$con=new mysqli("localhost","root","","ecommerce");
if(!$con)
	{
		echo "Database Not Connected";
	}
mysqli_set_charset($con, 'utf8');
?>