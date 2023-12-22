<?php
require 'config.php';
if(!empty($_SESSION["id"])){
	header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail=$_POST["usernameemail"];
    $password=$_POST["password"];
    $result=mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$usernameemail' OR email='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script>alert('Wrong Password');</script>";
        }
    }
    else{
        echo
        "<script>alert('User Not Registered');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="bg">
    <center>
    <h2>Login</h2>
    <table>
    <form class="" action="" method="post" autocomplete="off">
        <tr>
       <td> <label for="usernameemail">Username or Email : </label></td>
       <td> <input type="text" name="usernameemail" id="usernameemail" required value=""></td><br>
        </tr>
        <tr>
       <td> <label for="password">Password :</label></td>
        <td><input type="password" name="password" id="password" required value=""></td><br>
        </tr>
       <br>
       <tr>
         <td><button type="submit" name="submit">Login</button></td>
      </tr>
    </form>
    </table>
     
    <br>
    <a href="registration.php">Registration</a>
    </center>
    </div>
</body>
</html>