<html>
<html>
    <head>
        <link rel="stylesheet" href="result.css">
        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .button{
  background-color: black;
  color: azure;
}
.button:hover{
  background-color: red;
  color: azure;
}
</style>
    </head>
    <body>
        <div class="contain">
        <header>
        <div class="header"> 
                <img src="logo1.png" width="100%" height="150px">
              </div>
        </header>
        <nav>
              <table>
              <div class="navbar">
                <tr>
                <td> <a href="index.html">HOME</a> </td>
                <td> <a href="student_details.html">STUDENT DETAILS</a> </td>
                <td><a href="result.php"> RESULTS</a></td>
                <td> <a href="attendence.php">ATTENDENCE </a> </td>
                <td> <a href="login.php">TEACHER </a> </td>
                <td> <a href="about.html"> ABOUT</a> </td>
                <td> <a href="midresult.php"> MID RESULTS</a> </td>
                </tr>
                  </div>
                </div> 
              </div>
            </table>
            </nav>
        <div class="marquee"> <marquee bgcolor="light green" width="100%" loop="-1" scrollamount="10" > <font color="white" face="Times New Roman"> CHECK YOUR THIS MONTH ATTENDENCE USING YOUR ADMITION NUMBER</font>  </marquee> </div>
        <div class="date">  <script>    
            var d= new Date();
            d.getFullYear();
            d.getHours();
            document.write(d);
            </script></div>
        <article>
        <div class="container">
        <center>
        <table border=1>
	<form action="attendence.php" method="post">
	<tr> <td> <label for="admin"> Admition Number:</label> </td>
	<td> <input type="text" name="admin" placeholder="enter admition number"> </td> </tr>
	<tr> <th colspan=2> <button class="button">Get Result </button> </th> </tr> 
	</form>
</table>
</center>
</div>
<?php
include('db.php');


if(isset($_POST['admin'])) {
    $admin = $_POST['admin'];

    // Retrieve student details
    $studentQuery = "SELECT admition_no,roll_number,name ,class,passing_year,attendance FROM students_1 WHERE admition_no = '$admin'";
    $studentResult = $con->query($studentQuery);


    // Display student details
    if($studentResult->num_rows > 0) {
        $student = $studentResult->fetch_assoc();
        echo "<center>";
        echo "<h2>ATTENDENCE</h2>";
        echo "<table border='1'>";
        echo "<tr><th bgcolor='red'><font color=white> Admition_No </font> </th> <th bgcolor='red'><font color=white> Roll_Number </font> </th><th bgcolor='red'><font color=white> Name </font> </th><th bgcolor='red'><font color=white> Class</th><th bgcolor='red'><font color=white>Year</th><th bgcolor='red'><font color=white>Attendance</th></tr>";
        echo "<tr>";
        echo "<td>" . $student["admition_no"] . "</td>";
        echo "<td>" . $student["roll_number"] . "</td>";
        echo "<td>" . $student["name"] . "</td>";
        echo "<td>" . $student["class"] . "</td>";
        echo "<td>" . $student["passing_year"] . "</td>";
        echo "<td>" . $student["attendance"] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    } else {
        echo "<script>alert('No student details found for hall ticket number $hallticket');</script>";
    }
}

$con->close();
?>
