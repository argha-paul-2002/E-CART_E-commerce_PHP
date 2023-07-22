<?php
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if (isset($_GET['cart_item_id'])){
    $cart_item_id=$_GET['cart_item_id'];
    $sql="DELETE FROM shop_cart WHERE `shop_cart`.`id` = $cart_item_id ";
    $rs8 = mysqli_query($conn, $sql);
    header("location: cart.php");
}
else{
    header("location: 404.php");
    die();
}
?>