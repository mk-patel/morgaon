<?php

$conn = mysqli_connect("localhost", "pe3xg4xbezm1", "Manish9826@", "accountsman_db");
$mysqli = new mysqli("localhost", "pe3xg4xbezm1", "Manish9826@", "accountsman_db");

if(!$conn){
    die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}

?>