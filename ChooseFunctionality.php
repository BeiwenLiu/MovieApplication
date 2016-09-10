<?php
require_once('include/session.php');
if(isset($_POST['logout'])) {
	//logout here
	unset($_SESSION['Username']);
	header("Location: index.php");
}

?>

<html>
<link href="css/ChooseFunctionality.css" rel="stylesheet">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
  <title>Beiwen Liu</title>
</head>
<div align="center">
  <h1> Choose Functionality </h1>
</div>
<div class="line"> </div>

<div class="something" align="center">
<a class="Next" href="ViewRevenueReport.php" class="button">View Revenue Report</a>
</div>
<div class="something" align="center">
<a class="Next" href="ViewPopularMovieReport.php" class="button">View Popular Movie Report</a>
</div>

<form method="POST">
<div class="something" align="center">
<input id="logout" type="Submit" class="Next" href="MePage.php" value="Log Out" name="logout">
</div>
</form>

<div id="holder" class="line"> </div>
<div class="line"> </div>
</body>
</html>
