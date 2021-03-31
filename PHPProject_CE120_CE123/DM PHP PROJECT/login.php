<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
            <table align="center" border="2">
                <tr>
                    <td>Enter Your Username</td>
                    <td><input type="text" name="username" value="" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Log In"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $u=$_POST['username'];
    $p=$_POST['password'];
    $pass=base64_encode($p);
    try {
        $server="localhost";
        $user="root";
        $password="";
        $db="php_project";
        $dbcon=new PDO("mysql:host=$server; dbname=$db",$user,$password);
        $selectquery="SELECT * FROM customer WHERE username=? && password=?";
        $stmt=$dbcon->prepare($selectquery);
        $stmt->execute([$u,$pass]);
        if($stmt->rowCount()>0){
            $result=$stmt->fetch(PDO::FETCH_OBJ);
            session_start();
            $_SESSION["customerid"]=$result->id;
            $_SESSION["username"]=$result->username;
            $_SESSION["name"]=$result->name;
            $_SESSION["phone_no"]=$result->phone_no;
            $_SESSION["email"]=$result->email;
            $_SESSION["address"]=$result->address;
            $_SESSION["isset"]=true;
            header('location: homepage.php');
        }
        else{
            echo "Incorect Username or Password";
        }
    } catch (PDOException $e) {
        echo "Error:".$e->getMessage();
    }
}
?>
