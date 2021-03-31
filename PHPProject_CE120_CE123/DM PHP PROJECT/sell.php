<?php
session_start();
$sessionset=$_SESSION["isset"];
if($sessionset!=true){
    header('location: invalid.php');
}
else {
    $seller_id=$_SESSION["customerid"];
    $user=$_SESSION["username"];
    $address=$_SESSION["address"];
    $seller_name=$_SESSION["name"];
    $seller_phone=$_SESSION["phone_no"];
    $seller_email=$_SESSION["email"];
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
        <p style="float: left;">Hi <?php echo $user ?>&nbsp;&nbsp; <a href="homepage.php">HOME PAGE</a></p>
        <p style="float: right;"><a href="signout.php">SignOut</a></p>
    </div>
        <table border="2">
            <form action="" method="post" enctype="multipart/form-data">
                <tr>
                    <td>Enter the name of the product to sell</td>
                    <td><input type="text" name="product_name" value="" placeholder="Product name" required></td>
                </tr>
                <tr>
                    <td>Enter Your Name(if you want to give another name)</td>
                    <td><input type="text" name="seller_name" value="<?php echo $seller_name; ?>" required></td>
                </tr>
                <tr>
                    <td>Enter Your Address</td>
                    <td><input type="text" name="seller_address" value="<?php echo $address ?>" required></td>
                </tr>
                <tr>
                    <td>Enter Your Phone Number</td>
                    <td><input type="number" name="phone_no" value="<?php echo $seller_phone; ?>" required></td>
                </tr>
                <tr>
                    <td>Enter Your Email</td>
                    <td><input type="text" name="seller_email" value="<?php echo $seller_email; ?>" required></td>
                </tr>
                <tr>
                    <td>Enter The Price:</td>
                    <td><input type="number" name="price" value="" placeholder="Enter amount Rupees" required></td>
                </tr>
                <tr>
                    <td>Upload Your Selling Image Here</td>
                    <td><input type="file" name="uploadfile" value=""></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </form>
        </table>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    $productname=$_POST['product_name'];
    $sellername=$_POST['seller_name'];
    $selleraddress=$_POST['seller_address'];
    $selleremail=$_POST['seller_email'];
    $phoneno=$_POST['phone_no'];
    $price=$_POST['price'];
    $filename=$_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/".$filename;
    try{
        $user="root";
        $server="localhost";
        $password="";
        $db="php_project";
        $dbcon=new PDO("mysql:host=$server; dbname=$db" ,$user,$password);
        $insertquery="INSERT INTO item(seller_id,product_name,seller_name,address,email,phone_no,price,image_name) VALUES ('$seller_id','$productname','$sellername','$selleraddress','$selleremail','$phoneno','$price','$filename')";
        $query=$dbcon->query($insertquery);
        if(move_uploaded_file($tempname,$folder)){
            header("location: success.php");
        }
    }catch(PDOException $e){
        echo "Error:".$e->getMessage();
    }

}

?>
