<?php 
require_once('include/session.php');
require_once('include/NowPlayingData.php');


$something = select(); #array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16");

$size = sizeof($something);

for ($a = 0; $a < $size; $a++) {
    if (isset($_POST['x'.$a])) {
        $_SESSION['Movie'] = $something[$a];
        header("Location: Movie.php");
   }
}

if(isset($_POST['me_x'])) {
    header("Location: MePage.php");
}

if(isset($_POST['logout_x'])) {
    unset($_SESSION['Username']);
    unset($_SESSION['Password']);
    header("Location: index.php");
}


?>

<html>
    <link href="css/index.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <form method="POST">
    <div align="center">
        <div align="center">
            <input alt="Submit" class="Next" type="image" src="images/profile.png" width="50" height="50" class="button" name="me">
            <input alt="Submit" class="Next1" type="image" src="images/logout.png" width="100" height="50" class="button" name="logout">
        </div>
        <h1 id="welcome">
            Welcome <?php echo $_SESSION['Username'];?> </h1>
        <div id="line"> </div>
        <h2 class="border">Now Playing</h2>
    </div>
    <table id="tableStyle" height="<?php echo (sizeof($something)/4+2)*50;?>px">
                <?php for ($x = 0; $x < $size; $x++) {?>
                    <tr>
                <td> <input type ="Submit" class="movieButton" name="x<?php echo $x;?>" value="<?php echo $something[$x];?>"> </td>                 
                    </tr>
                <?php }?>
        </table>

    </form>

    <div id="line"> </div>
</body>
</html>
