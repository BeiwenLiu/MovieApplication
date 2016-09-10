<?php 
require_once('include/session.php');
#echo $_SESSION['Username'];
#echo $_SESSION['Login'];

$movie = $_SESSION['Movie'];



if (isset($_POST['SubmitReview'])) {
    if($_POST['comment'] != null && $_POST['title'] != null) {
        #perform query here
        $error = "Successfully Submitted";
        #$_POST['rating']; Rating value
        unset($_POST['comment']);
    } else {
        $error = "Please provide a title or a comment";
    }
    unset($_POST['SubmitReview']);
}

if (isset($_POST['Back'])) {
    header("Location: MovieReview.php");
}

//Need to calculate average rating
?>

<html>
<link href="css/GiveReview.css" rel="stylesheet">
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
    <form id="Format" method="POST">
        <label id="ratingLabel" class="label"> Rating </label> 
        <select id="rating" name="rating">
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
        </select>
        <br>
       <label class="label"> Title </label> 
       <input class="field" name="title">
       <br>
       <label class="label"> Comment </label>
       <textarea id="Comment" rows="20" cols="60" name="comment">
       </textarea>
       <br>
       <?php if (isset($error)) {?>
       <label id="error"> <?php echo $error;?> </label>
       <?php } ?>
       <br>
       <input id="back" class="submit" type="Submit" value="Submit" name="SubmitReview">
       <input id="back1" class="submit" type="Submit" value="Back" name="Back">
   </form>
</body>
</html>
