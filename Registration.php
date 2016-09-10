<!DOCTYPE html>
<?php 
require_once('include/session.php');
require_once('include/RegistrationData.php');

if (isset($_POST['Create'])) {
    if ($_POST['Username'] != null && $_POST['Email'] != null && $_POST['Password'] != null && $_POST['ConfirmPassword'] != null) {
        if(strcmp($_POST['Password'], $_POST['ConfirmPassword']) == 0) {
            if (check($_POST['Username'], $_POST['Email']) == 0) {
                if($_POST['ManagerPassword'] != null) {
                    if(checkManager($_POST['ManagerPassword']) == 1) {
                        insertManager($_POST['Username'],$_POST['Email'],$_POST['Password']);
                        header("Location: index.php");
                    } else {
                        $error = "Manager password incorrect";
                    }
                } else {
                    insertCustomer($_POST['Username'],$_POST['Email'],$_POST['Password']);
                    header("Location: index.php");
                }
            } else {
                $error = "Username or Email already registered";
            }
        } else {
            $error = "Password and Confirm Password do not match";
        }
    } else {
        $error = "You left one of the fields blank!";
    }
}
?>


<html>

<link href="css/Registration.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Beiwen Liu</title>
</head>
<body>
    <div align="center">
        <h1>New User Registration</h1>
    </div>
    <div id="border" align="center">
        <form id="Format" method="POST">
            <label class="label"> Username </label> 
            <input class="field" name="Username">
            <br>
            <label class="label"> Email Address </label>
            <input class="field" name="Email">
            <br>
            <label class="label"> Password </label> 
            <input class="field" name="Password">
            <br>
            <label class="label"> Confirm Password </label>
            <input class="field" name="ConfirmPassword">
            <br>
            <label class="label"> Manager Password </label> 
            <input class="field" name="ManagerPassword">
            <br>
            <?php if (isset($error)) {?>
            <div class="error" align="center">
                <label id="errorMessage" class="field"> <?php echo $error;?> </label> <br>
            </div>
            <?php } ?>
            <input id="Create" class="submit" type="Submit" value="Create" name="Create">
        </div>
    </form>

    
</body>
</html>
