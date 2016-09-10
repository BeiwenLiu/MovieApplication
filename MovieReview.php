<?php 
require_once('include/session.php');
require_once('include/MovieReviewData.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];


if (isset($_POST['SubmitReview'])) {
    header("Location: GiveReview.php");
    unset($_POST['SubmitReview']);
}

$movie = $_SESSION['Movie'];
$arr = select();
$size = sizeof($arr);
echo $size;
//Need to calculate average rating
?>

<html>
<link href="css/MovieOverview.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <h1 id="title" style="text-align:center"> Overview </h1>
    <div align="center">
    	<?php if(isset($movie)) {?>
        <h1><?php echo $movie?></h1>
        <?php }?>
    </div>
    <form method="POST">
    <div id="giveReview"> <input id="SubmitReview" class="back" type="Submit" name="SubmitReview" value="Give Review">  </div>
    </form>
    <table id="tableStyle" height="<?php echo (sizeof($array)/4+2)*50;?>px">
        <?php for ($x = 0; $x < $size; $x++) {?>
        <tr>
            <td class="movieButton"> <?php echo $arr[$x];?> </td>                 
        </tr>
        <?php }?>
    </table>
    <div id="back">
        <a href="Movie.php" id="backButton" class="button"><label> back </label> </a>
    </div>
</body>
</html>
