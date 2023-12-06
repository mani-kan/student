<?php

$con = new mysqli("localhost","root","","sample");
if($con->connect_error)
{
    die($con->connect_error."Connection Failed");
}
?>