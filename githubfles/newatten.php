<?php
include('db.php');
$Admition_no = $_POST['n1'];
$name = $_POST['n2'];
$Roll = $_POST['n3'];
$branch = $_POST['n4'];
$year = $_POST['n5'];
$atten = $_POST['n6'];

$sql = $con->prepare("INSERT INTO students_1(admition_no,name,roll_number,class,passing_year,attendance) VALUES(?,?,?,?,?,?)");
$sql->bind_param('sssssi',$Admition_no,$name,$Roll,$branch,$year,$atten);
$sql->execute();
   echo "<script> alert('Sucessfully Submited'); </script>";
   echo "<script> location.replace('newatten.html'); </script>";
$sql->close();
$con->close();
?>