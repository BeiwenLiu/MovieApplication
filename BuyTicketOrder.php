<?php 
require_once('include/session.php');
require_once('include/BuyTicketOrderData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$savedTheater = $_SESSION['SavedTheater'];
#perform query
$movie = $_SESSION['Movie'];
#perform query for movie
$time = $_SESSION['Time'];

$theaterID = $_SESSION['theaterID'];
$orderID = $_SESSION['OrderID'];
$date = $_SESSION['Date'];

if(isset($_POST['Submit'])) {
	unset($_SESSION['Movie']);
	unset($_SESSION['theaterID']);
	unset($_SESSION['SavedTheater']);
	unset($_SESSION['OrderID']);
	unset($_SESSION['Time']);
	unset($_SESSION['Date']);
	header("Location: NowPlaying.php");
}


//End sessions here

?>

<html>
<link href="css/BuyTicketOrder.css" rel="stylesheet">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
  <title>Beiwen Liu</title>
</head>
<div align="center">
  <h1> Buy Ticket </h1>
</div>
<div align="center">
	<h2> <?php echo $movie;?> </h2>
	<h2> <?php echo $savedTheater;?> </h2>
	<h2> <?php echo $date; echo " "; echo "-"; echo " "; echo $time;?> </h2>
</div>
<div id="line"> </div>
<div align="center">
	<h2> Confirmation </h2>
</div>

<div align="center">
	<label class="text"> Order ID </label>
	<label class="text1"> <?php echo $orderID;?> </label>
	<h5> Thank you for your purchase! Please save Order ID for your records. </h5>
	<form method="POST">
	<input type="Submit" name="Submit" id="Next" class="button" value="Go to the Now Playing Page">
	</form>
</div>


<?php if (isset($error)) {?>
<label id="message"> <?php echo $error;?> </label>
<?php } ?>
</body>
</html>

