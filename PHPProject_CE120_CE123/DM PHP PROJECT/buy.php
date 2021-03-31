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
    $email=$_SESSION["email"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>BUY YOUR ITEMS</title>
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
                $selectquery="SELECT * FROM item";
                $stmt=$dbcon->prepare($selectquery);
                $stmt->execute();

                while($result=$stmt->fetch(PDO::FETCH_OBJ)){
                ?>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
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
                            <td>Email</td>
                            <td><?php echo $result->email; ?></td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td><?php echo $result->phone_no; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit" value="BUY"></td>
                        </tr>
                    </table>
                </form>
                <br>
<?php
                }
                $count=$stmt->rowCount();
                if($count==0){
                    echo "<h1>Currently No item to sell</h1>";
                }
            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
            }
?>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $i=$_POST['id'];
    $_SESSION["selected_item"]=true;
    $_SESSION["item_id"]=$i;
    header('location: confirm.php');
}
?>
