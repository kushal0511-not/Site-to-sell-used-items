<?php
session_start();
$sessionset=$_SESSION["isset"];
if($sessionset!=true){
    header('location: invalid.php');
}
else{
$id=$_SESSION["customerid"];
$user=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>YOUR HOME PAGE</title>
    </head>
    <body>
        <div style="overflow: hidden;"><h4>
            <p style="float: left;">Hi <?php echo $user ?></p>
            <p style="float: right;">&nbsp;&nbsp;&nbsp;&nbsp;<a href="signout.php">SignOut</a></p>
            <p style="float: right;">&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete.php">Delete Account</a></p>
            <p style="float: right;">&nbsp;&nbsp;&nbsp;<a href="updatedetails.php">Update Account</a></p>&nbsp;&nbsp;&nbsp;</h4>
        </div>
        <h1 align="center">Welcome To the Home Page of Our SITE TO SELL USED ITEMS</h1>
        <p align="center"><a href="sell.php">Sell</a>&nbsp
        <a href="buy.php">Buy</a></p>
        <br>
        <p align="center">Check Your Current SELLINGS <a href="curruntsell.php">Here</a></p>
        <p align="center">Check Your BUYINGS <a href="customerbuys.php">Here</a></p>
        <p align="center">Check Your SELLINGS <a href="customersell.php">Here</a></p>
    </body>
</html>
<?php
}
?>
