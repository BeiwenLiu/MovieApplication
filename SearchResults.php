<?php 
require_once('include/session.php');
require_once('include/SearchResultsData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$result = $_SESSION['SearchTheater'];
//Perform query to populate $arr
$arr = select($result, $_SESSION['Movie']);

if(isset($_POST['Next'])) {
  if(isset($_POST['radio'])) {
    $key = array_search($_POST['radio'], $arr);
    $key = $key + 1;
    if(isset($_POST['save'])) {
      #update query
      
      insert($arr[$key], $_SESSION['Username']);
    }
    $_SESSION['SavedTheater'] = $_POST['radio'];
    $_SESSION['theaterID'] = $arr[$key];
    header("Location: SelectTime.php");
  } else {
    $error = "Please select a theater";
  }
} 
?>


<html>
<link href="css/SearchResults.css" rel="stylesheet">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
  <title>Beiwen Liu</title>
</head>
<div align="center">
  <h1> Results </h1>
</div>
<form id="Format" method="POST">
  <?php for ($i = 0; $i < sizeof($arr); $i = $i + 2) {?>
  <div class="border"> <input class="white" type="radio" value="<?php echo $arr[$i];?>" name="radio"> <?php echo $arr[$i];?> <br> </div>
  <?php } ?>
  <input id="next" class="save" type="Submit" value="Next" name="Next">
  <input class="save" type="radio" name="save">
  <label class="save"> Save this theater </label>
</form>
<?php if (isset($error)) {?>
<label id="error"> <?php echo $error;?> </label>
<?php } ?>
</body>
</html>
