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
        <div class="marquee"> <marquee bgcolor="light green" width="100%" loop="-1" scrollamount="9" > <font color="white" face="Times New Roman"> CHECK YOUR RESULTS SEM WISE ANY TIME ANY WHERE ANY PLACE </font>  </marquee> </div>
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
	<form action="result.php" method="post">
	<tr> <td> <label for="hallTicket"> Hall Ticket Number:</label> </td>
	<td> <input type="text" name="hallticket" placeholder="enter hallticket number"> </td> </tr>
	
	<tr colspan=2> <td> <label for="semester">Select Semester:</label> </td>
	<td> <Select name="semester">
    <option value="#">-Select Semeser - </option>
	<option value="Semester-1">semester 1 </option>
	<option value="Semester-2">semester 2 </option>
	<option value="Semester-3">semester 3 </option>
	<option value="Semester-4">semester 4 </option>
	<option value="Semester-5">semester 5 </option>
	<option value="Semester-6">semester 6 </option>
	</Select> </td> </tr>
	<tr> <th colspan=2> <button class="button">Get Result </button> </th> </tr> 
	</form>
</table>
</center>
</div>

<?php
include('db.php');


if(isset($_POST['hallticket']) && isset($_POST['semester'])) {
    $hallticket = $_POST['hallticket'];
    $semester = $_POST['semester'];

    // Retrieve student details
    $studentQuery = "SELECT hall_ticket_number,name, branch, Year FROM students WHERE hall_ticket_number = '$hallticket'";
    $studentResult = $con->query($studentQuery);
    $studentQuerys = "SELECT sem_name  FROM semester WHERE sem_name = '$semester'";
    $studentsem = $con->query($studentQuerys);

    // Retrieve result details
    $resultQuery = "SELECT subjects.subject_name, marks.marks, semester.sem_name
                    FROM marks
                    INNER JOIN subjects ON marks.subject_name = subjects.subject_name
                    INNER JOIN semester ON marks.sem_name = semester.sem_name
                    WHERE marks.hall_ticket_number = '$hallticket' AND marks.sem_name = '$semester'";
    $resultResult = $con->query($resultQuery);

    // Display student details
    if($studentResult->num_rows > 0) {
        $student = $studentResult->fetch_assoc();
        echo "<center>";
        echo "<h2>Student Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th bgcolor='red'><font color=white> Hallticket Number </font> </th> <th bgcolor='red'><font color=white> Name </font> </th><th bgcolor='red'><font color=white> Branch </font> </th><th bgcolor='red'><font color=white> Year</th></tr>";
        echo "<tr>";
        echo "<td>" . $student["hall_ticket_number"] . "</td>";
        echo "<td>" . $student["name"] . "</td>";
        echo "<td>" . $student["branch"] . "</td>";
        echo "<td>" . $student["Year"] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    } else {
        echo "<script>alert('No student details found for hall ticket number $hallticket');</script>";
    }
    if($studentsem->num_rows > 0) {
        $student = $studentsem->fetch_assoc();
        echo "<center>";
        echo "<h2>Semester</h2>";
        echo "<table border='1'>";
        echo "<tr><th bgcolor='yellow'> Semester </th> </tr>";
        echo "<tr>";
        echo "<td>" . $student["sem_name"] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    } else {
        echo "<script>alert('No student details found for hall ticket number $hallticket');</script>";
    }

    // Display result details
    if($resultResult->num_rows > 0) {
        echo "<center>";
        echo "<h2>Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th bgcolor='yellow'>Subject</th><th bgcolor='yellow'>Marks</th></tr>";
        while ($row = $resultResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["subject_name"] . "</td>";
            echo "<td>" . $row["marks"] . "</td>";
            echo "</tr>";
            echo "</center>";
        }
        echo "</table>";
    } else {
        echo "<script>alert('No student details found for hall ticket number $hallticket');</script>";
    }
}

$con->close();
?>
 </article>
        <div class="hh">

        </div>
    </body>
</html>
