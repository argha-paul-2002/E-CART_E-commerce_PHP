<?php
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

$mail = $_SESSION['umail'];
$sql7 = "SELECT `id` FROM `users` WHERE `email`= '$mail';";
$rs7 = mysqli_query($conn, $sql7);
$row7 = mysqli_fetch_array($rs7);
$u_id = $row7['id']; ///////////////////////////////////////Get the user id


if (isset($_POST['pro_id'])){
    $pro_id=$_POST['pro_id'];
    // echo $pro_id;
    // echo $u_id;
    $sql8 = "SELECT * FROM `wishlist` WHERE `user_id`=$u_id AND pro_id=$pro_id;";
    $rs8 = mysqli_query($conn, $sql8);
    $row8 = mysqli_num_rows($rs8);
    if ($row8 > 0) {
        echo "<script>alert('Already Exist in Wishlist');</script>";
    } else {
        $insert = "INSERT INTO `wishlist` (`user_id`, `pro_id`) VALUES ('$u_id', '$pro_id');";
        $insert_query = mysqli_query($conn, $insert);
        echo "<script>alert('Successfully added to Wishlist');</script>";
        
    }
}
else{
    header("location: 404.php");
}
?>