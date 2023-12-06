<?php
include('db.php');
$hall_ticket_number = $_POST['n1'];
$subject = $_POST['n2'];
$new_marks = $_POST['n3'];
$sem = $_POST['n4'];
// Get student id based on hall ticket number
$student_query = "SELECT hall_ticket_number FROM students WHERE hall_ticket_number ='$hall_ticket_number'";
$student_result = $con->query($student_query);
$student_id = $student_result->fetch_assoc()['hall_ticket_number'];
// Get subject id based on subject name
$subject_query = "SELECT subject_name FROM subjects WHERE subject_name = '$subject'";
$subject_result = $con->query($subject_query);
$subject_id = $subject_result->fetch_assoc()['subject_name'];
// Get semester id based on sem_name
$subject_query = "SELECT sem_name FROM semester WHERE sem_name = '$sem'";
$subject_result = $con->query($subject_query);
$sem_id = $subject_result->fetch_assoc()['sem_name'];
// Update marks in the results table
$update_query = "UPDATE marks SET marks = '$new_marks'
WHERE hall_ticket_number = '$student_id' AND subject_name = '$subject_id' AND sem_name = '$sem_id'";
if ($con->query($update_query) === TRUE) {
echo "<script> alert('Marks updated successfully'); </script>";
echo "<script> location.replace('update.html'); </script> ";
} else {
echo "Error: " . $update_query . "<br>" . $con->error;
}
$con->close();
?>