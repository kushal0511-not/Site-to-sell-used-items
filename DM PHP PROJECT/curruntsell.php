<?php
session_start();
$sessionset=$_SESSION["isset"];
if($sessionset!=true){
    header('location: invalid.php');
}
else {
    $id=$_SESSION["customerid"];
    $user=$_SESSION["username"];
    $address=$_SESSION["address"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CHECK YOUR SELLING ITEMS</title>
    </head>
    <body>
    <div style="overflow: hidden;">
        <p style="float: left;">Hi <?php echo $user ?>&nbsp;&nbsp; <a href="homepage.php">HOME PAGE</a></p>
        <p style="float: right;"><a href="signout.php">SignOut</a></p>
    </div>
        <?php
            try{
                $user="root";
                $server="localhost";
                $password="";
                $db="php_project";
                $dbcon=new PDO("mysql:host=$server; dbname=$db" ,$user,$password);
                $selectquery="SELECT * FROM item WHERE seller_id=?";
                $stmt=$dbcon->prepare($selectquery);
                $stmt->execute([$id]);

                while($result=$stmt->fetch(PDO::FETCH_OBJ)){
                ?>

                <form action="" method="post">
                    <input type="hidden" name="itemid" value="<?php echo $result->id; ?>">
                    <table border="2" width="300" align="center">
                        <tr>
                            <td colspan="2" align="center"><img src="image/<?php echo $result->image_name; ?>"</td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2>&#8377; <?php  echo $result->price;?></h2></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo "<h3>".$result->product_name ."</h3>"; ?></td>
                        </tr>
                        <tr>
                            <td>Seller</td>
                            <td><?php echo $result->seller_name; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $result->address; ?></td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td><?php echo $result->phone_no; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit" value="Delete item from Sellings"></td>
                        </tr>
                    </table>
                </form>
                <br>
<?php
                }
                $count=$stmt->rowCount();
                if($count==0){
                    echo "<h1>Currently You Have No item to sell</h1>";
                }
            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
            }
?>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
$i=$_POST['itemid'];
?>
<form action="" method="get">
    <table align="center">
        <th>Are You Sure You want to delete this item?</th>
        <tr>
            <input type="hidden" name="item_id" value="<?php echo $i; ?>">
            <td align="center"><input type="submit" name="yes" value="YES">
                <input type="submit" name="no" value="NO">
            </td>
        </tr>
    </table>
</form>
<?php
}
if(isset($_GET['yes'])){
    $it=$_GET['item_id'];
    $user="root";
    $server="localhost";
    $password="";
    $db="php_project";
    $dbcon=new PDO("mysql:host=$server; dbname=$db" ,$user,$password);
    $deletequery="DELETE FROM item WHERE id=?";
    $stmt=$dbcon->prepare($deletequery);
    $stmt->execute([$it]);
    header('location: homepage.php');
}
elseif (isset($_POST['no'])) {
    header('location: curruntsell.php');
}
?>
