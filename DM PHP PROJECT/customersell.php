<?php
session_start();
$sessionset=$_SESSION["isset"];
if($sessionset!=true){
    header('location: invalid.php');
}
else{
    $cid=$_SESSION["customerid"];
    $user=$_SESSION["username"];
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Your Sellings</title>
        <div style="overflow: hidden;">
            <p style="float: left;">Hi <?php echo $user ?>&nbsp;&nbsp; <a href="homepage.php">HOME PAGE</a></p>
            <p style="float: right;"><a href="signout.php">SignOut</a></p>
        </div>
    </head>
    <?php 
    try{
        $user="root";
        $server="localhost";
        $password="";
        $db="php_project";
        $dbcon=new PDO("mysql:host=$server; dbname=$db" ,$user,$password);
        $selectquery="SELECT * FROM buy WHERE seller_id=?";
        $stmt=$dbcon->prepare($selectquery);
        $stmt->execute([$cid]);
        while($result=$stmt->fetch(PDO::FETCH_OBJ)){
?>
    <body>
        <table border="2">
            <tr>
            <td colspan="2" align="center"><img src="image/<?php echo $result->image_name; ?>"</td>
            </tr>
            <tr>
                <td>Selling Price</td>
                <td><?php echo $result->price; ?></td>
            </tr>
            <tr>
                <td>Your Selling Product</td>
                <td><?php echo $result->product_name; ?></td>
            </tr>
            <tr>
                <td>Buyer Name</td>
                <td><?php echo $result->buyer_name; ?></td>
            </tr>
            <tr>
                <td>Buyer Address</td>
                <td><?php echo $result->buyer_address; ?></td>
            </tr>
            <tr>
                <td>Buyer email</td>
                <td><?php echo $result->buyer_email; ?></td>
            </tr>
            <tr>
                <td>Buyer's Phone no.</td>
                <td><?php echo $result->buyer_phone_no; ?></td>
            </tr>
        </table>
        <br>
    </body>
</html>
<?php            
        }
        $count=$stmt->rowCount();
        if($count==0){
            echo "<h1>Currently You have No Selling Poduct</h1>";
        }
    }catch(PDOException $e){
        echo "Error:".$e->getMessage();
    }
}
?>
