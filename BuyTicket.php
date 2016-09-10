<?php 
require_once('include/session.php');
require_once('include/BuyTicketData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$savedTheater = $_SESSION['SavedTheater'];
#perform query
$movie = $_SESSION['Movie'];
#perform query for movie
$time = $_SESSION['Time'];

$arr = select();

$basePrice = "11.54";


if(isset($_POST['Next'])) {
	if (strcmp($_POST['Adult'],'0') == 0 && strcmp($_POST['Senior'],'0') == 0 && strcmp($_POST['Child'],'0') == 0) {
		$error = "Please purchase a ticket";
	} else {
		$_SESSION['Adult'] = $_POST['Adult'];
		$_SESSION['Senior'] = $_POST['Senior'];
		$_SESSION['Child'] = $_POST['Child'];
		header("Location: BuyTicketPayment.php");
	}
}

?>


<html>
<link href="css/BuyTicket.css" rel="stylesheet">
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
	<h2> <?php echo $time;?> </h2>
</div>
<div id="line"> </div>
<form id="Format" method="POST">
	<label class="text1"> Adult </label>
	<select name="Adult" class="text"> 
		<?php for ($i = 0; $i <= 30; $i++) {?>
			<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
		<?php } ?>
	</select>
	<label class="text1"> No discount  </label>
	<br>
	<label class="text1"> Senior </label>
	<select name="Senior" class="text"> 
		<?php for ($i = 0; $i <= 30; $i++) {?>
			<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
		<?php } ?>
	</select>
	<label class="text1"> <?php echo $arr[1] * 100;?>% Discount </label>
	<br>
	<label class="text1"> Child </label>
	<select name="Child" class="text"> 
		<?php for ($i = 0; $i <= 30; $i++) {?>
			<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
		<?php } ?>
	</select>
	<label class="text1"> <?php echo $arr[0] * 100;?>% Discount </label>
	<input id="Next" type="Submit" value="Next" name="Next">
</form>
<?php if (isset($error)) {?>
<label class="text1" style="color:red"> <?php echo $error;?> </label>
<?php } ?>
</body>
</html>
