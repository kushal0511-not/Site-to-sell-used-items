<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
            <table border="2" align="center">

                <tr>
                    <td>Enter Your Username:</td>
                    <td><input type="text" name="username" value="" placeholder="Enter Your Username" required></td>
                </tr>
                <tr>
                    <td>Enter Your Password:</td>
                    <td><input type="password" name="password" value="" placeholder="Enter Your Password" required></td>
                </tr>
                <tr>
                    <td>Enter Your Name</td>
                    <td><input type="text" name="name" value="" placeholder="Enter your fullname" required></td>
                </tr>
                <tr>
                    <td>Enter Your Email</td>
                    <td><input type="email" name="email" value="" placeholder="example@gmail.com" required></td>
                </tr>
                <tr>
                    <td>Enter Address</td>
                    <td><input type="text" name="address" value="" placeholder="Your Address" required></td>
                </tr>
                <tr>
                    <td>Enter Your Phone Number</td>
                    <td><input type="text" name="phone_no" value="" placeholder="1234567890" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Register"></td>
                </tr>
            </table>
        </form>
        <br>
        <p align="center">Already Have Account? Click <a href="login.php">Here</a></p>
    </body>
</html>


<?php
if(isset($_POST['submit'])){
    $u=$_POST['username'];
    $pass=$_POST['password'];
    $p=base64_encode($pass);
    $n=$_POST['name'];
    $e=$_POST['email'];
    $add=$_POST['address'];
    $phone=$_POST['phone_no'];
    try{
        $user="root";
        $server="localhost";
        $password="";
        $db="php_project";
        $dbcon=new PDO("mysql:host=$server; dbname=$db" ,$user,$password);
        $insertquery="INSERT INTO customer(username,password,name,email,address,phone_no) VALUES ('$u','$p','$n','$e','$add','$phone')";
        $query=$dbcon->query($insertquery);
        header('location: login.php');
    } catch(PDOException $e){
        echo "Error:".$e->getMessage();
    }
}
?>
