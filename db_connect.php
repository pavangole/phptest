<?php
$server= "localhost:3306";
$username="soham";
$password="soham";
$database="website";
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
 die("Error" .mysqli_connect_error());
}