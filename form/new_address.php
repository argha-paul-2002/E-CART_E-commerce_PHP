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
    // $=$_POST[''];
    $none = "'none'";
    $sql = "INSERT INTO `address` (`u_id`, `name`, `ph_no`, `pincode`, `locality`, `full_address`, `city`, `state`, `district`) VALUES ('$id', '$name', '$add_number', ' $add_pin', '$add_locality', '$add_detailed', '$add_city', '$add_state', '$add_dist');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>SUCCESS! </strong>NEW ADDRESS ADDED</div> ';
    }
    else{
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>ERROR! </strong>ADDRESS NOT SAVED SUCCESSFULLY</div> ';
    }


    // echo "Name:\n" . $name . "\n" . $add_pin . "\n" . $add_locality . "\n" . $add_number
    //     . "\n" . $add_detailed . "\n" . $add_city
    //     . "\n" . $add_state . "\n" . $add_dist . "\n" . $id . "\n";


    // $none = "'none'";
    // echo '<div class="alert success">
    // <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    // <strong>SUCCESS! </strong>NEW ADDRESS ADDED</div> ';
} else {
    header("location: ../404.php");
}
?>

<?php

// $fullname=$_POST['fullname'];
// $username=$_POST['username'];
// echo "NAME:".$fullname."USERNAME:".$username


?>
