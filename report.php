<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "yoga");
$query = "SELECT * FROM milkreport";
$results = mysqli_query($connect, $query);
$chart_data = '';
while($rows = mysqli_fetch_array($results))
{
 $chart_data .= "{ month:'".$rows["month"]."', amount:".$rows["amount"].", total:".$rows["total"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
 
 
<!DOCTYPE html>
<html>
 <head>
  <title>The Ranch Diary Farm Management</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Report For Milk Sales (Monthly)</h2>  
   <br /><br />
   <div id="chart"></div>
  </div>
  <div>
  <a href="homereport1.php">Return to Report</a>
  </div>
 </body>
</html>
 
<script>
Morris.Area({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'month',
 ykeys:['amount','total'],
 labels:['Amount', 'Total Amount'],
 hideHover:'auto',
 stacked:true
});
</script>