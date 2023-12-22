<?php
require 'config.php';
if(!empty($_SESSION["id"])){
	$id=$_SESSION["id"];
	$result=mysqli_query($conn,"SELECT * FROM tb_user WHERE id=$id");
	$row=mysqli_fetch_assoc($result);
}
else{
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="bg-img">
  	<div class="container">
    		<div class="topnav">
      			<a href="#home">Home</a>
      			<a href="menu.php">Menu</a>
      			<a href="about.php">About</a>
			<a href="logout">Logout</a>
   		 </div>
          <h1 id="heading" >Welcome to Pizza Galaxy <?php echo $row["name"]; ?></h1>
 	 </div>
    </div>
    
    
    
    
</body>
</html>