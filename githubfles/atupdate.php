<?php
include('db.php');
$admin = $_POST['n1'];
$Roll = $_POST['n2'];
$attendence = $_POST['n3'];
$student_query = "SELECT admition_no FROM students_1 WHERE admition_no ='$admin'";
$student_result = $con->query($student_query);
$student_id = $student_result->fetch_assoc()['admition_no'];

$update_query = "UPDATE students_1 SET roll_number = '$Roll' , attendance = '$attendence'
WHERE admition_no = '$student_id'";
if ($con->query($update_query) === TRUE) {
echo "<script> alert('Attendance updated successfully'); </script>";
echo "<script> location.replace('atupdate.html'); </script> ";
} else {
echo "Error: " . $update_query . "<br>" . $con->error;
}
$con->close();
?>