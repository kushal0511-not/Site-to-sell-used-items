<?php
session_start();
$sessionset=$_SESSION["isset"];
if($sessionset!=true){
    header('location: invalid.php');
}
else {
    $customer_id=$_SESSION["customerid"];
    $username=$_SESSION["username"];
    $address=$_SESSION["address"];
    $customer_name=$_SESSION["name"];
    $customer_phone=$_SESSION["phone_no"];
    $customer_email=$_SESSION["email"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div style="overflow: hidden;">
            <p style="float: left;">Hi <?php echo $username ?>&nbsp;&nbsp; <a href="homepage.php">HOME PAGE</a></p>
            <p style="float: right;"><a href="signout.php">SignOut</a></p>
        </div>
        <form action="" method="post">
            <table align="center" border="2">
                <th colspan="2">Edit Your Details</th>
                <tr>
                    <td>Your Username</td>
                    <td><input type="text" name="Username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td>Your Name</td>
                    <td><input type="text" name="name" value="<?php echo $customer_name; ?>"></td>
                </tr>
                <tr>
                    <td>Your Email</td>
                    <td><input type="text" name="email" value="<?php echo $customer_email; ?>"></td>
                </tr>
                <tr>
                    <td>Your Address</td>
                    <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
                </tr>
                <tr>
                    <td>Your Contact No</td>
                    <td><input type="text" name="phone" value="<?php echo $customer_phone; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Edit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $u=$_POST['Username'];
    $n=$_POST['name'];
    $e=$_POST['email'];
    $a=$_POST['address'];
    $p=$_POST['phone'];
    try {
        $server="localhost";
        $user="root";
        $password="";
        $db="php_project";
        $dbcon=new PDO("mysql:host=$server; dbname=$db",$user,$password);
        $updatequery="UPDATE customer SET username=?, name=?, email=?, address=?, phone_no=? WHERE id=?";
        $stmt=$dbcon->prepare($updatequery);
        $stmt->execute([$u,$n,$e,$a,$p,$customer_id]);
        $_SESSION["username"]=$u;
        header('location: homepage.php');
        } catch (PDOException $e) {
            echo "Error:".$e->getMessage();
    }
}
?>
