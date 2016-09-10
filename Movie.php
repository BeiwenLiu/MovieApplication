<?php 
require_once('include/session.php');
require_once('include/MovieData.php');

#echo $_SESSION['Username'];
#echo $_SESSION['Login'];


if(isset($_POST['Overview'])) {
	header("Location: Overview.php");
}

if(isset($_POST['MovieReview'])) {
	header("Location: MovieReview.php");
}

if(isset($_POST['BuyTicket'])) {
    header("Location: ChooseTheater.php");
}



$movie = $_SESSION['Movie'];
$arr = select($movie);

#Display movie release date, rating, length, genre, rating
#Perform query here

?>

<html>
    <link href="css/Movie.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
    	<?php if(isset($movie)) {?>
        <h1><?php echo $movie?></h1>
        <?php }?>
    </div>

    <div id="movieDetails"> 
        <?php for ($i = 0; $i < sizeof($arr); $i++) {?>
            <label class="input1"> <?php echo $arr[$i];?> </label>
        <?php } ?>

    </div>

    <form id="MovieForm" method="POST">
    	<input class="input" type="Submit" name="Overview" value="Overview">
    </br>
    	<input class="input" type="Submit" name="MovieReview" value="Movie Review">
    </br>
    	<input class="input" type="Submit" name="BuyTicket" value="Buy Ticket">
    </form>

</body>
</html>
