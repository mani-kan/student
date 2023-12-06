
<?php
include('db.php');
$stud_id = $_POST['n1'];
$sub_id = $_POST['n2'];
$sem_id = $_POST['n3'];
$marks = $_POST['n4'];

$sql = $con->prepare("INSERT INTO midresults(hall_ticket_number,subject_name,sem_name,marks) VALUES(?,?,?,?)");
$sql->bind_param('sssi',$stud_id,$sub_id,$sem_id,$marks);
$sql->execute();
if(($sem_id == 'n3') && ($stud_id == 'n1') && ($sub_id == 'n2'))
{
   echo "<script> alert('Wrong Information');</script>";


   echo "<script> location.replace('newresult.html'); </script>";
} else{
   echo "<script> alert('Sucessfully Submited'); </script>";
   
   echo "<script> location.replace('newresult.html'); </script>";
   
}
$sql->close();
$con->close();
?>
 </body>
    </html>