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
    $sql="DELETE FROM wishlist WHERE `wishlist`.`pro_id` =$pro_id AND `user_id`=$u_id;";
    $rs8 = mysqli_query($conn, $sql);
    if($rs8){
        header("location: wishlist.php");
    }
    else{
        header("location: form/wrong.php");
    }
}
else{
    header("location: form/wrong.php");
    die();
}
?>