<?php 
require_once('include/session.php');
require_once('include/BuyTicketPaymentData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];
date_default_timezone_set("America/New_York");
$dateToday = new DateTime('NOW');
$dateToday1 = $dateToday->format('Y-m-d');
$timeToday = $dateToday->format('H:i:s');


$savedTheater = $_SESSION['SavedTheater'];
#perform query
$movie = $_SESSION['Movie'];
#perform query for movie
$time = $_SESSION['Time'];

$arr = select($_SESSION['Username']);

if (isset($_POST['BuyTicket'])) {
	$orderNumber = getLastOrder();
	$orderNumber = $orderNumber + 1;
	#insertOrder($orderNumber,$dateToday1 ,$_SESSION['Senior'], $_SESSION['Child'], $_SESSION['Adult'], ($_SESSION['Senior'] + $_SESSION['Adult'] + $_SESSION['Child']),$timeToday , 'unused', $_SESSION['Username'], $_POST['SavedCard'], $_SESSION['Title'], $_SESSION['theaterID']);
	$_SESSION['OrderID'] = $orderNumber;
	header("Location: BuyTicketOrder.php");
}

if (isset($_POST['Submit'])) {
	if ($_POST['CardNumber'] == null || $_POST['CVV'] == null || $_POST['NameOnCard'] == null) {
		$error = "You left one of the fields blank!";
	} else {
		if (sizeof($_POST['CVV']) != 3 || sizeof($_POST['CVV'] != 4)) {
			$error = "Please input a correct CVV";
		} else {
			if(isset($_POST['save'])) {
				$temp = explode('/', $_POST['daymonth']);
				$newDate = $temp[2] . "-" . $temp[1] . "-" . $temp[0];
				$newDate = substr($newDate, -10);
				insert($_POST['CardNumber'],$_POST['CVV'],$_POST['NameOnCard'],$newDate,1,$_SESSION['Username']);
			}
			$orderNumber = getLastOrder();
			$orderNumber = $orderNumber + 1;
			$_SESSION['OrderID'] = $orderNumber;
			#insertOrder($orderNumber,$dateToday1 ,$_SESSION['Senior'], $_SESSION['Child'], $_SESSION['Adult'], ($_SESSION['Senior'] + $_SESSION['Adult'] + $_SESSION['Child']),$timeToday , 'unused', $_SESSION['Username'], $_POST['CardNumber'], $_SESSION['Title'], $_SESSION['theaterID']);
			header("Location: BuyTicketOrder.php");
		}
	}
}

?>

<html>
<link href="css/BuyTicketPayment.css" rel="stylesheet">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
	<title>Beiwen Liu</title>
</head>
<div align="center">
	<h1 id="title" > Buy Ticket </h1>
</div>
<div align="center">
	<h2> <?php echo $movie;?> </h2>
	<h2> <?php echo $savedTheater;?> </h2>
	<h2> <?php echo $time;?> </h2>
</div>
<div id="line"> </div>
<form id="Format" method="POST">
	<div align="center">
		<h2> Payment Information </h2>
	</div>
	<label class="text"> Use a saved card </label>
	<select name="Savedcard" class="text1"> 
		<?php for ($i = 0; $i < sizeof($arr); $i++) {?>
		<option value="<?php echo $i;?>"> <?php echo $arr[$i];?> </option>
		<?php } ?>
	</select>
	<input class="text1" id="Next" type="Submit" value="Buy Ticket" name="BuyTicket">
	<div align="center">
		<h2> Use a new card </h2>
	</div>
	<label class="text"> Name on Card </label>
	<input class="text1" name="NameOnCard">
	<br>
	<label class="text"> Card Number </label>
	<input class="text1" name="CardNumber">
	<br>
	<label class="text"> CVV </label>
	<input class="text1" name="CVV">
	<br>
	<label class="text"> Expiration Date </label>
	<input class="text1" type="date" min="<?php echo $dateToday1;?>" name="daymonth">
	<br>
	<input class="text" type="radio" name="save">
	<label style="color:white" class="text1"> Save this card for later use </label>
	<input id="Next" class="text1" type="Submit" name="Submit">
	<?php if (isset($error)) {?>
	<br>
	<label style="margin-left:30%; color:red" class="text1"> <?php echo $error;?> </label>
	<?php } ?>
</form>
</body>
</html>
