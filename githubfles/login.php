<html>
    <head>
        <title> login form </title>
       <link rel="stylesheet" href="styless.css">
       <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body bgcolor="#1E002D">
<header>
<div class="header"> 
                <img src="logo3.png" width="100%" height="140px">
              </div>
            </header>
<div class="container">
<form action="login.php" method="post">
    <div class="d1">
       <font color="black" ><h3> Email </h3></font> <input type="text" name="username" placeholder="enter your email" required>
    </div>
    <div class="d2">
       <font color="black"> <h3> Password </h3> </font> <input type="password" name="password" placeholder="enter paswword" required>
    </div> <br>
   <center> <button> Login</button> </center>
</form>

</div>
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $con->prepare( " SELECT*FROM login WHERE mail=? AND  password=? ");
    $stmt->bind_param("ss", $username ,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo "<script> location.replace('creation.html') </script>";
    }
else {
    echo "<script> alert('Wrong mail and password'); </script>";
    echo "<script> location.replace('login.php');</script>";
}
$stmt->close();
}

$con->close();
?>
<div class="hh" id="#navbar.html">

</div>
</div>

</body>
</html>