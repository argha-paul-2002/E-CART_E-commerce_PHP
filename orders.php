<?php
session_start();
include 'dbconnect.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php
include 'dbconnect.php';
$mail = $_SESSION['umail'];
$sql7 = "SELECT `id` FROM `users` WHERE `email`= '$mail';";
$rs7 = mysqli_query($conn, $sql7);
$row7 = mysqli_fetch_array($rs7);
$u_id = $row7['id']; ///////////////////////////////////////Get the user id
?>
<html>

<head>

    <title>E-Cart Wishlist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/orders.css">
</head>

<body>
    <?php require 'navbar.php' ?>
    <div class="order-empty">
        <div class="order-empty-img">
            <img class="order-em-img" src="images/orders/empty-order.jpg" alt="Cart is Empty">
        </div>
        <div class="order-em-head">
            <h1>Oops! You haven't placed any order yet!</h1>
        </div>
        <a class="order-empty-link" href="indeex.php">
            <button class="order-empty-button">SHOP NOW</button>
        </a>
    </div>
    <div class="container-1">
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 style="color:rgb(255, 105, 105)">Please contact Customer Service Center</h2>
                <h4>Phone Number: <span style="color:rgb(49, 0, 184)">188525852</span></h4>
            </div>

        </div>

        <div class="heading">
            <p class=" underlined">My orders</p>
            <img src="images/orders/shopping-cart.png" alt="wishlist logo">
        </div>
        <div class="list">

            <?php
            $sql = "SELECT *, DATE_FORMAT(order_date,'%d/%m/%Y') AS o_date FROM `order_details` WHERE `user_id`=$u_id ORDER BY id DESC";
            $rs = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($rs)) {
                $id = $row['id'];
            ?>
                <div class="flex">
                    <div class="outer" onclick="location.href = 'order_details.php?order=<?php echo $id ?>';">
                        <div class="flex">
                            <div class="inner">
                                <img src="images/orders/order.png" alt="Order Image">
                            </div>
                            <div class="inner">Items :
                                <?php echo $row['total_item']; ?>
                            </div>
                            <div class="inner amount">&#8377;<?php echo $row['order_total']; ?>
                            </div>
                            <div class="inner">
                                <?php echo $row['o_date']; ?>
                            </div>

                        </div>
                    </div>
                    <div class="inner-btn">
                        <button class="cart-btn cancel">
                            <div class="flex">
                                <img src="images/orders/sad-face.png" alt="Add to Cart">
                                <p style="padding-top: 4px;">Cancel Order</p>
                            </div>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
<script>
    // class_name = document.getElementsByClassName("bottom");
    // var length = class_name.length;
    // console.log(length);
    // var fadeTime = 300;
    // console.log(length);
    // if (length == 0) {
    //     $(".container-1").fadeOut(fadeTime);
    //     $(".order-empty").fadeIn(100);
    // }



    // Get the modal
    var modal = document.getElementById("myModal");

    $('.cancel').click(function() {
        modal.style.display = "block";
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>