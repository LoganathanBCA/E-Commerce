<?php 
	$quote=array();
	$quote[]="<span class='fa-lg fa fa-recycle'></span> Keep The City Green And Clean";
	$quote[]="<span class='fa-lg fa fa-tint'></span> Dont Waste Food And Water";
	$quote[]="<span class='fa-lg fa fa-globe'></span> Plant Tree And Save Earth";
?>	

	<footer>
  <div class="container-fluid">
    <div class="row">

     
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">User Review</h6>
        <div class="post">
        <?php 
require_once 'php-sentiment-analyzer-master/src/Analyzer.php'; // Update path as needed
use Sentiment\Analyzer;

$analyzer = new Analyzer();

$sq = "SELECT * FROM review ORDER BY RID DESC LIMIT 0,3";
$re = $con->query($sq);

// Initialize counters
$positive_count = 0;
$negative_count = 0;
$neutral_count = 0;

$reviews = [];

if ($re->num_rows > 0) {
    while ($ro = $re->fetch_assoc()) {
        $a = date_parse($ro["LOGS"]);
        $c = date("F") . " " . $a["day"] . ", " . $a["year"];    

        // Perform sentiment analysis
        $sentiment = $analyzer->getSentiment($ro["MES"]);

        // Determine sentiment category and count
        $sentiment_label = "Neutral";
        if ($sentiment['compound'] >= 0.05) {
            $sentiment_label = "Positive 😊";
            $positive_count++;
        } elseif ($sentiment['compound'] <= -0.05) {
            $sentiment_label = "Negative 😞";
            $negative_count++;
        } else {
            $neutral_count++;
        }

        $reviews[] = [
            "message" => $ro["MES"],
            "date" => $c,
            "sentiment" => $sentiment_label
        ];
    }
}

// Convert data to JSON for JavaScript
$chart_data = json_encode([
    "positive" => $positive_count,
    "negative" => $negative_count,
    "neutral" => $neutral_count
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentiment Analysis Chart</title>
    <script src="chart.umd.js"></script> <!-- Chart.js Library -->
</head>
<body>

    <!-- <h3>User Reviews</h3> -->
    <?php foreach ($reviews as $review) : ?>
        <p><?php echo $review["message"]; ?> <span><?php echo $review["date"]; ?></span> <strong>(<?php echo $review["sentiment"]; ?>)</strong></p>
    <?php endforeach; ?>

    <!-- <h3>Sentiment Analysis Chart</h3> -->
    <canvas id="sentimentChart"></canvas> <!-- Chart Canvas -->

    <script>
        // Parse JSON data from PHP
        var chartData = <?php echo $chart_data; ?>;

        var ctx = document.getElementById('sentimentChart').getContext('2d');
        var sentimentChart = new Chart(ctx, {
            type: 'bar', // Chart type
            data: {
                labels: ['Positive', 'Negative', 'Neutral'],
                datasets: [{
                    label: 'Number of Reviews',
                    data: [chartData.positive, chartData.negative, chartData.neutral], // Data from PHP
                    backgroundColor: ['green', 'red', 'gray']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>


        </div>
      </div>
      <div class="col-md-offset-6 col-md-3 col-sm-6 paddingtop-bottom">
	  
			<h6 class="heading7"><?php echo $quote[rand(0,2)]; ?></h6>
			<img src="img/logo.jpg" style='margin-bottom:15px;' class="img-responsive img-thumbnail">
      </div>
    </div>
  </div>
</footer>

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>Copyright &copy; <?php echo date("Y"); ?> E-Commerce Website With Sentiment Analysis</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
      
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

