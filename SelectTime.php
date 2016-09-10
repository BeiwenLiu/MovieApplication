<?php 
require_once('include/session.php');
require_once('include/SelectTimeData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

date_default_timezone_set("America/New_York");
$dateToday = new DateTime('NOW');
$timeToday = new DateTime('NOW');

$dateToday = $dateToday->format('Y-m-d');
$timeToday = $timeToday->format('H:i:s');

$datetime = new DateTime('today');

$movie = $_SESSION['Movie'];
#perform Query
if (isset($_SESSION['SavedTheater'])) {
  $savedTheater = $_SESSION['SavedTheater'];
}

for ($i = 0; $i < 7; $i++) {
  if(isset($_POST['x'.$i])) {
    $tempDate = $_POST['x'.$i];
    $_SESSION['Date'] = $tempDate;
    $timeArray = select($_SESSION['theaterID'], $_SESSION['Movie'], $_POST['x'.$i], $dateToday, $timeToday);
    unset($_POST['x'.$i]);

  }
}

for ($i = 0; $i < 7; $i++) {
  if(isset($_POST['y'.$i])) {
    $_SESSION['Time'] = $_POST['y'.$i];
    unset($_POST['y'.$i]);
    header("Location: BuyTicket.php");
  }
}
?>

<html>
<link href="css/SelectTime.css" rel="stylesheet">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
  <title>Beiwen Liu</title>
</head>
<body>
  <div align="center">
    <h1> Select Time for <?php echo $movie?> at <?php echo $savedTheater;?> </h1>
  </div>
  <form id="Format" method="POST">
    <table id="tableStyle">
      <tr>
        <?php for($i = 0; $i < 7; $i++) {?>
          <td class="column"> <input type="Submit" class="dateColumn" name="x<?php echo $i;?>" value="<?php echo $datetime->format('Y-m-d');  $datetime->modify('+1 day');?>"> </td>
        <?php } ?>
      </tr>
    </table>
    
    <?php if (isset($tempDate)) {?>
    <div align="center">
    <h2> Times for <?php echo $tempDate;?> </h2>
  </div>
      <table id="tableStyle2">
        <tr>
          <?php if (sizeof($timeArray) == 0) {?>
                <td class="column"> <input type="button" class="dateColumn" value="No available times for this date!"> </td>
              <?php } else { ?>
          <?php for ($y = 0; $y < sizeof($timeArray); $y++) {?> 
              <td class="column"> <input type="Submit" class="dateColumn" name="y<?php echo $y;?>" value="<?php echo $timeArray[$y];?>"> </td>
          <?php } ?>
    <?php } ?>
      <?php }?>
    </tr>
  </form>
</body>
</html>