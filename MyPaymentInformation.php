<?php 
require_once('include/session.php');
require_once("include/MyPaymentInformationData.php");
$arr = select($_SESSION['Username']);
$size = sizeof($arr);

if(isset($_POST['Search'])) {
    //$arr = query
}

if(isset($_POST['Delete'])) {
    //Query here
    delete($_POST['radio']);
}


?>

<html>
    <link href="css/MyPaymentInformation.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
        <h1> Payment Information </h1>
        <div id="line"> </div>
        <h2></h2>
    </div>
    <form method="POST">
    <table id="tableStyle" height="<?php echo (sizeof($arr)/3+2)*50;?>px">
        <tr>
            <td class="title"> Select </td>
            <td class="title"> Card Number </td>
            <td class="title"> Name on Card </td>
            <td class="title"> Exp Date </td>
        </tr>
        <?php for($i = 0; $i < $size/3; $i++) {?>
            <tr>
                    <td> <input name="radio" type="radio" value="<?php echo $arr[$i*3];?>"> </td>
                <?php for($y = 0; $y < 3; $y++) {?>
                    <td> <?php echo $arr[$y+$i*3];?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <input class="Next1" type="Submit" Value="Delete" name="Delete">
    <a id="Next2" class="Next1" href="MePage.php" class="button">Back</a>
    </form>
</body>
</html>
