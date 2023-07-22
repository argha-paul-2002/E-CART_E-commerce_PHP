<?php
$host="localhost";
$user="root";
$password="";
$dbname="e-commerce";

//Creating a Connection
// global $conn;
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    die("Sorry we failed to connect".mysqli_connect_error());
}
//  else{
//     echo "Connection Successfull";
//  }
?>