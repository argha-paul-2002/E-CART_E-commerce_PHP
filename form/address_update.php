<?php
include '../dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['add_name'];
    $add_pin = $_POST['add_pin'];
    $add_locality = $_POST['add_locality'];
    $add_number = $_POST['add_number'];
    $add_detailed = $_POST['add_detailed'];
    $add_city = $_POST['add_city'];
    $add_state = $_POST['add_state'];
    $add_dist = $_POST['add_dist'];
    $id = $_POST['id'];
    $address_id=$_POST['address_id'];
    // $=$_POST[''];
    $none = "'none'";
    $sql="UPDATE `address` SET `name` = '$name',`ph_no`='$add_number',`pincode`='$add_pin',`locality`='$add_locality',`full_address`='$add_detailed ',`city`='$add_city',`state`='$add_state',`district`='$add_dist' WHERE `address`.`id` = '$address_id';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>SUCCESS! </strong>ADDRESS UPDATED SUCCESSFULLY</div> ';
    }
    else{
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>ERROR! </strong>Address Not Updated</div> ';
    }


    // echo "Name:\n" . $name."\n".$add_pin."\n".$add_locality."\n".$add_number
    // ."\n".$add_detailed."\n".$add_city
    // ."\n".$add_state."\n".$add_dist."\n".$id."\n".$address_id;
    // $none = "'none'";
    // echo '<div class="alert success">
    // <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    // <strong>SUCCESS! </strong>ADDRESS UPDATED SUCCESS</div> ';
} else {
    header("location: ../404.php");
}
?>
