<?php
include('db.php');
$subject = $_POST['n1'];


$sql = $con->prepare("INSERT INTO subjects(subject_name) VALUES(?)");
$sql->bind_param('s',$subject);
$sql->execute();
echo "<script> alert('Sucessfully Submited');</script>";
echo "<script> location.replace('subjects.html');</script>";
$sql->close();
$con->close();
?>