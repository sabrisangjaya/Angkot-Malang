<?php
//if(!isset($_SESSION)) session_start(); 
// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "angkot";
$host = "sql109.epizy.com";
$user = "epiz_21095603";
$password = "sabri123";
$db = "epiz_21095603_angkot";
$con = mysqli_connect($host, $user, $password,$db);
if (!$con) die("Connection error: " . mysqli_connect_error());
?>