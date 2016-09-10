<!DOCTYPE html>
<?php 
require_once('include/session.php');
require_once('include/indexData.php');


if (isset($_POST['Register'])) {
    header("Location: Registration.php");
    unset($_POST['Register']);
}

if (isset($_POST['Login'])) {
    if($_POST['Username'] != null && $_POST['Password'] !=null) {
        #Validate information here with database
        #(if valid)
        if(verifyManager($_POST['Username'], $_POST['Password']) > 0) {
            header("Location: ChooseFunctionality.php");
        } else {
            $count = verifyCustomer($_POST['Username'],$_POST['Password']);
            if ($count == 1) {
                $_SESSION['Username'] = $_POST['Username'];
                header("Location: NowPlaying.php");
            } else {
                $error = "Incorrect username or password";
            }
        }
        unset($_POST['Login']);
        unset($_POST['Password']);
        unset($_POST['Username']);
    } else {
        $error = "Username or Password missing";
    }
}
?>


<html>

<link href="css/index.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div id="center" align="center">
    <form id="Format" method="POST">
        <div class="header" align="center">
        <h1>Login</h1>
    </div>
        <label class="label"> Username </label> 
        <input class="field" name="Username">
        <br>
        <label class="label"> Password </label>
        <input class="field" name="Password">
        <br>
        <?php if (isset($error)) {?>
        <label id="errorMessage" class="field"> <?php echo $error;?> </label> <br>
        <?php } ?>
        <div id="footer" class="header" align="center">
        <input class="submit" type="Submit" value="Login" name="Login">
        <input class="submit" type="Submit" value="Register" name="Register">
        </div>
    </form>
</div>
    
</body>
</html>
