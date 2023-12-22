<?php
require 'config.php';
if(!empty($_SESSION["id"])){
	header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$username' or email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Username or Email Has Already Taken');</script>";

    }
    else{
        if($password == $confirmpassword){
            $query="INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful');</script>";
        }
        else{
            echo
            "<script>alert('Password does not match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
     <link rel="stylesheet" href="style2.css">
</head>
<body>
     <div class="bg">
    <center>
    <h2>Registration</h2>
    <table>
    <form action="" action="" method="post" autocomplete="off">
        <tr>
         <td><label for="name">Name : </label></td>
        <td> <input type="text" name="name" id="name" required value=""></td><br>
        </tr>
        <tr>
        <td><label for="username">Username : </label></td>
        <td><input type="text" name="username" id="username " required value=""></td><br>
         </tr>
        <tr>
        <td><label for="email">Email : </label></td>
        <td><input type="email" name="email" id="email" required value=""></td><br>
        </tr>
        <tr>
        <td><label for="password">Password : </label></td>
        <td><input type="password" name="password" id="password" required value=""></td><br>
        </tr>
         <tr>
        <td><label for="confirmpassword">Confirm Password</label></td>
       <td> <input type="password" name="confirmpassword" id="confirmpassword" required value=""></td>
        <br>
      <td><button type="submit" name="submit">Register</button></td>
        
    </form>
    
    </table>
    
    <br>
    <a href="login.php">Login</a>
    </center>
    </div>
</body>
</html>