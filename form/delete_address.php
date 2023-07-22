<?php 
include '../dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a_id=$_POST['a_id'];
    $none="'none'";

    // echo $a_id;


    $none = "'none'";
    $sql = "DELETE FROM `address` WHERE `address`.`id` = '$a_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>SUCCESS! </strong>DELETED SUCCESSFULLY</div> ';
    }
    else{
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>ERROR! </strong>CAN NOT BE DELETED</div> ';
    }
    // DELETE FROM `address` WHERE `address`.`id` = 1
    // echo '<div class="alert success">
    // <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    // <strong>SUCCESS! </strong>Address Deletes Successfully</div> ';
    
}
else{
    header("location: 404.php");
}
?>