<?php
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $mail = $_SESSION['umail'];
    $sql7 = "SELECT `id` FROM `users` WHERE `email`= '$mail';";
    $rs7 = mysqli_query($conn, $sql7);
    $row7 = mysqli_fetch_array($rs7);
    $u_id = $row7['id']; ///////////////////////////////////////Get the user id

    /* GET Selected Address By the User */
    $a_id = $_GET['a_id'];

    /* GET Selected Payment Method By the User */
    $payment = $_GET['method'];

    /* GET the Total Price of the Cart */
    $total = $_GET['total'];

    $sql7 = "SELECT * FROM `shop_cart` WHERE `user_id`=$u_id;";
    $rs7 = mysqli_query($conn, $sql7);
    $num = mysqli_num_rows($rs7);


    /* INSERT INTO ORDER_DETAILS TABLE FIRST */
    $sql = "INSERT INTO `order_details` (`user_id`, `order_date`, `ship_address`, `order_total`, `payment_method`,`total_item`) VALUES ('$u_id', current_timestamp(), '$a_id', '$total', '$payment','$num');";
    $res = mysqli_query($conn, $sql);
    if ($res) {

        $sq = "SELECT * FROM `order_details` ORDER BY id DESC LIMIT 1;";
        $re = mysqli_query($conn, $sq);
        $row = mysqli_fetch_array($re);

        /* Get the Recent Order ID */
        $order_id = $row['id'];
        echo "<br>" . $order_id;

        $sql8 = "SELECT * FROM `shop_cart` WHERE `user_id`=$u_id;";
        $rs8 = mysqli_query($conn, $sql8);
        while ($row8 = mysqli_fetch_array($rs8)) {
            //Pro item id
            echo "<br>Pro item ID :" . $row8['pro_id'];
            //qty
            echo "<br>Quantity " . $row8['pro_qty'];
            //pro size Orderd
            echo "<br>Size" . $row8['pro_size'];

            $pro_id = $row8['pro_id']; ///////////////////Product ID
            $pro_qty = $row8['pro_qty']; /////////////////PRODUCT QUANTITY
            $pro_size = $row8['pro_size']; ///////////////SIZE OF PRODUCT

            $sq11 = "SELECT * FROM `product_item` WHERE `id`=$pro_id;";
            $rs11 = mysqli_query($conn, $sq11);
            $row3 = mysqli_fetch_array($rs11);
            echo "<br>" . $row3['sell_price'] . "<br>";
            $pro_price = $row3['sell_price']; ///////////////SIZE OF PRODUCT//////////////////////////////Product Price

            $sql1 = "INSERT INTO `order_item` (`pro_item_id`, `order_id`, `qty`, `size`, `price`, `date`) VALUES ('$pro_id', '$order_id', '$pro_qty', '$pro_size', '$pro_price', current_timestamp());";
            $res1 = mysqli_query($conn, $sql1);
            // $row3 = mysqli_fetch_array($res1);
            if ($res1) {
                header("location: form/order_success.php");
            }
        }
    } else {
        header("location: form/wrong.php");
    }
} else {
    header("location: 404.php");
}
