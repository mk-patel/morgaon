<?php

$conn = mysqli_connect("localhost", "root", "", "accounts");
$mysqli = new mysqli("localhost", "root", "", "accounts");

if(!$conn){
    die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}

?>