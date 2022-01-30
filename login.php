<?php
// Start the session
session_start();
$pass = "81dc9bdb52d04dc20036dbd8313ed055"; //1234 in md5
$error = false;
if (isset($_POST['pass'])){
    if (md5($_POST['pass'])==$pass){
        $_SESSION['loggedIn']=true;
    }
    else{
        $error=true;
    }
}
if(isset($_SESSION['loggedIn'])){
    header('Location: /form/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form action="login.php" METHOD='POST'>

<div class="loginpage-outer">
    <div class="loginpage">
        <div class="logo-holder">
            <img id="slidecaption" src="https://mumbaimirror.indiatimes.com/photo/75705626.cms" />
        </div>
        <?php if($error){echo "<div class='alert alert-danger mt-3 d-block w-100'>Wrong Password.</div>";}?>
        <div class="input-group loginform">
                <input type="password" class="form-control" placeholder="Enter your PIN" name="pass">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Login</button>
                </div>
        </div>
    </div>
</div>
</form>

</body>
</html>