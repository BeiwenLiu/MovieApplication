<?php 
require_once('include/session.php');
require_once("include/ViewRevenueReportData.php");
$arr = testing();
$size = sizeof($arr);

?>

<html>
    <link href="css/ViewRevenueReportData.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
        <h1> View Revenue Report </h1>
        <div id="line"> </div>
        <h2></h2>
    </div>
    <table id="tableStyle" height="<?php echo (sizeof($arr)/2+2)*50;?>px">
        <tr>
            <td class="title"> Month </td>
            <td class="title"> Revenue </td>
        </tr>
        <?php for($i = 0; $i < $size/2; $i++) {?>
            <tr>
                <?php for($y = 0; $y < 2; $y++) {?>
                    <td> <?php echo $arr[$y+$i*2];?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <a id="Next2" class="Next1" href="ChooseFunctionality.php" class="button">Back</a>
</body>
</html>
