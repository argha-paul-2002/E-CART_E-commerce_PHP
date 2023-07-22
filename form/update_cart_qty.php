<?php
include '../dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qty = $_POST['qty'];
    $cart_item_id = $_POST['id'];
    
    $none = "'none'";
    $sql="UPDATE `shop_cart` SET `pro_qty` = '$qty' WHERE `shop_cart`.`id` = '$cart_item_id';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>SUCCESS! </strong>QUANTITY UPDATED SUCCESSFULLY</div> ';
    }
    else{
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>ERROR! </strong> Not Updated</div> ';
    }


    // echo "F Name:\n" . $qty."\n".$cart_item_id;

    // $none = "'none'";
    // echo '<div class="alert success">
    // <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    // <strong>SUCCESS! </strong>ADDRESS UPDATED SUCCESS</div> ';
} else {
    header("location: ../404.php");
}
?>
