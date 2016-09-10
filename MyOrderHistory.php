<?php 
require_once('include/session.php');
require_once("include/MyOrderHistoryData.php");
$arr = testing();
$size = sizeof($arr);

if(isset($_POST['Search'])) {
    //$arr = query
}

if(isset($_POST['ViewDetail'])) {
    $_SESSION['Order'] = $_POST['radio'];
    header("Location: /OrderDetail.php");
}


?>

<html>
    <link href="css/MyOrderHistory.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
        <h1> Order History </h1>
        <h2></h2>
    </div>
    <form method="POST">
        <div id="lowline" align="center"> <label style="color:white"> Order ID</label> <input id="orderID" name="OrderID"> <input class="Next" type="Submit" Value="Search" Name="Search"> </div>
    <table id="tableStyle" height="<?php echo (sizeof($arr)/4+2)*50;?>px">
        <tr>
            <td class="title"> Select </td>
            <td class="title"> Order ID </td>
            <td class="title"> Movie </td>
            <td class="title"> Status </td>
            <td class="title"> Total Cost </td>
        </tr>
        <?php for($i = 0; $i < $size/4; $i++) {?>
            <tr>
                    <td> <input name="radio" type="radio" value="<?php echo $arr[$i*4];?>"> </td>
                <?php for($y = 0; $y < 4; $y++) {?>
                    <td> <?php echo $arr[$y+$i*4];?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <input class="Next1" type="Submit" Value="View Detail" name="ViewDetail">
    <a id="Next2" class="Next1" href="MePage.php" class="button">Back</a>
    </form>
</body>
</html>
