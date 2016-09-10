<?php 
require_once('include/session.php');
require_once('include/OverviewData.php');

#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$movie = $_SESSION['Movie'];
$arr = select($movie);

$cast = explode(';', $arr[2]);
?>

<html>
    <link href="css/Overview.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <h1 class="title" style="text-align:center"> Overview </h1>
    <div align="center">
    	<?php if(isset($movie)) {?>
        <h1 class="title"><?php echo $arr[0];?> </h1>
        <?php }?>
    </div>

    <div id="OverviewDetails"> <div class="subtitle" align="center"> Synopsis </div>
     <?php echo $arr[1];?> </div>

    <div align="center" id="cast"> <div class="subtitle" align="center"> Cast </div>
    <?php for ($i = 0; $i < sizeof($cast); $i++) {?> 
        <div align="center"> <?php echo $cast[$i];?> </div>
    <?php } ?>

      </div>

    <div id="back">
    <a id="backButton" href="Movie.php" class="button"><label> back </label> </a>
    <div>
</body>
</html>
