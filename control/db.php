<?php

// This is a Database Connection code.
$conn = mysqli_connect("localhost", "root", "", "morgaon_5443");
$mysqli = new mysqli("localhost", "root", "", "morgaon_5443");

// when the connection fails then error message will be printed.
if(!$conn){
    die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}
?>