<?php
include '../dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $id = $_POST['id'];
    
    $none = "'none'";
    $sql="UPDATE `users` SET `first_name` = '$f_name',`last_name`='$l_name' WHERE `users`.`id` = '$id';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>SUCCESS! </strong>NAME UPDATED SUCCESSFULLY</div> ';
    }
    else{
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>ERROR! </strong>Name Not Updated</div> ';
    }


    // echo "F Name:\n" . $f_name."\n".$l_name."\n".$id;

    // $none = "'none'";
    // echo '<div class="alert success">
    // <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    // <strong>SUCCESS! </strong>ADDRESS UPDATED SUCCESS</div> ';
} else {
    header("location: ../404.php");
}
?>
