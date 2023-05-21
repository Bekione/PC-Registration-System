<?php
session_start();
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PWD = '';
$DB_NAME = 'pcregistration';

$con = new mysqli($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);
if(!$con){
    die(mysqli_error($con));
}
if(mysqli_connect_error()){
    exit("failed to connect " . mysqli_connect_error());
}
?>   