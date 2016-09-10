<?php 
require_once('include/session.php');
require_once("include/MyPreferredTheaterData.php");
$arr = select($_SESSION['Username']);
$size = sizeof($arr);


if(isset($_POST['Delete'])) {
    delete($_POST['radio'], $_SESSION['Username']);
}


?>

<html>
    <link href="css/MyPreferredTheaterData.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
        <h1> My Preferred Theater </h1>
        <div id="line"> </div>
        <h2></h2>
    </div>
    <form method="POST">
    <table id="tableStyle" height="<?php echo (sizeof($arr)*50);?>px">
        <?php for($i = 0; $i < $size; $i = $i + 2) {?>
            <tr>
                    <td> <input name="radio" type="radio" value="<?php echo $arr[$i];?>"> </td>
                    <td> <?php echo $arr[$i + 1];?> </td>
            </tr>
        <?php } ?>
    </table>

    <input class="Next1" type="Submit" Value="Delete" name="Delete">
    <a id="Next2" class="Next1" href="MePage.php" class="button">Back</a>
    </form>
</body>
</html>
