<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'connect.php';

if(isset($_GET['deleteAll'])){
    $query = "DELETE FROM `pc owners` WHERE 1";
    $result = mysqli_query($con, $query);
    if($result){
        header('location:manage.php?delmsg');
    }
    else {
        die(mysqli_error($con));
    }
}
if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $query = "DELETE FROM `pc owners` WHERE Student_ID = '$id'";
    $result = mysqli_query($con, $query);

    if($result){
        header('location:manage.php');
    }
    else {
        die(mysqli_error($con));
    }
}
?>