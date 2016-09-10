<?php 
require_once('include/session.php');
require_once('include/ChooseTheaterData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$arr = select($_SESSION['Username'], $_SESSION['Movie']); //Testing should be from SQL Query

if (isset($_POST['Choose'])) {
  if($_POST['savedTheater'] != null) {
    $_SESSION['SavedTheater'] = $_POST['savedTheater'];
    header("Location: SelectTime.php");
    $key = array_search($_POST['savedTheater'] , $arr);
    $key = $key + 1;
    $_SESSION['theaterID'] = $arr[$key];
    unset($_POST['savedTheater']);
  }
  unset($_POST['Choose']);
}

if (isset($_POST['Search'])) {
  if ($_POST['title'] != null) {
    header("Location: SearchResults.php");
    $_SESSION['SearchTheater'] = $_POST['title'];
 } else {
  $error = "Please Input a City, State, or Theater";
 }
}

?>

<html>
<link href="css/ChooseTheater.css" rel="stylesheet">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
  <title>Beiwen Liu</title>
</head>
<body>
  <div align="center">
    <h1> Choose Theater </h1>
  </div>
  <form id="Format" method="POST">
    <label id="ratingLabel" class="label"> Saved Theater </label> 
    <select id="rating" name="savedTheater">
      <?php for ($i = 0; $i < sizeof($arr); $i = $i + 2) {?>
      <option value="<?php echo $arr[$i];?>"> <?php echo $arr[$i];?> </option>
      <?php } ?>
    </select>
    <input id="back" class="submit" type="Submit" value="Choose" name="Choose">
    <br>
    <label class="label"> City/State/Theater </label> 
    <input class="field" name="title">
    <input id="back1" class="submit" type="Submit" value="Search" name="Search">

    <?php if (isset($error)) {?>
       <label id="error"> <?php echo $error;?> </label>
    <?php } ?>

  </form>
</body>
</html>
