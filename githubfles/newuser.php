<?php
include('db.php');
$hallticket_no = $_POST['n1'];
$Stud_Name = $_POST['n2'];
$Group = $_POST['n3'];
$year = $_POST['n4'];

$sql = $con->prepare("INSERT INTO students(hall_ticket_number,name,branch,Year) VALUES(?,?,?,?)");
$sql->bind_param('ssss',$hallticket_no,$Stud_Name,$Group,$year);
$sql->execute();
echo "<script> alert('Sucessfully Submited');</script>";
echo "<script> location.replace('student_details.html');</script>";
$sql->close();
$con->close();
?>