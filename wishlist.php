<?php
session_start();

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
    <link rel="stylesheet" href="css/wishlist.css">
</head>

<body>
    <?php require 'navbar.php' ?>
    <div class="wish-empty">
        <div class="wish-empty-img">
            <img class="wish-em-img" src="images/wishlist/empty-wishlist.webp" alt="Cart is Empty">
        </div>
        <div class="wish-em-head">
            <h1>Oops! Your wishlist is empty!</h1>
        </div>
        <a class="wish-empty-link" href="indeex.php">
            <button class="wish-empty-button">SHOP NOW</button>
        </a>
    </div>
    <div class="container" style="margin:0 0 20px 0">
        <div class="heading">
            <img src="images/wishlist/heart.png" alt="wishlist logo">
            <p>My wishlist</p>
        </div>
        <div class="list">
            <table>
                <tr class="heading-txt">
                    <th>Product Name</th>
                    <th>Unit price</th>
                    <th>Stock Status</th>
                    <th></th>
                </tr>
                <?php
                $sql8 = "SELECT * FROM `wishlist` WHERE `user_id`=$u_id;";
                $rs8 = mysqli_query($conn, $sql8); //////////////////All data from wishlist
                while ($row8 = mysqli_fetch_array($rs8)) {
                ?>
                    <tr class="bottom">
                        <?php
                        $pro_id = $row8['pro_id']; ///////////////////Product ID
                        // ALL DATA FROM PRODUCT ITEM ACCORDING TO PRODUCT ID

                        $sq11 = "SELECT * FROM `product_item` WHERE `id`=$pro_id;";
                        $rs11 = mysqli_query($conn, $sq11);
                        $row3 = mysqli_fetch_array($rs11);
                        $pro_type_id = $row3['product_type_id'];
                        $pro_category = $row3['pro_category'];
                        $qty_stock = $row3['qty_stock'];
                        $company_id = $row3['company_name'];


                        $sq = "SELECT `company_name` FROM `company_name` WHERE `id`=$company_id;";
                        $rs2 = mysqli_query($conn, $sq);
                        $row2 = mysqli_fetch_array($rs2); /////////////////////Company Name

                        // Get the product type.....men,women....

                        $sq12 = "SELECT * FROM `product` WHERE `id`=$pro_type_id;";
                        $rs12 = mysqli_query($conn, $sq12);
                        $row12 = mysqli_fetch_array($rs12);

                        // Get the product category.......shirt,....

                        $sq13 = "SELECT * FROM `product_category` WHERE `id`=$pro_category;";
                        $rs13 = mysqli_query($conn, $sq13);
                        $row13 = mysqli_fetch_array($rs13);
                        ?>
                        <td style="text-align: left; padding: 10 0 10 20;">
                            <a href="product-view.php?id=<?php echo $pro_id; ?>">
                                <div class="flex">
                                    <div class="left-section">
                                        <img class="demo-img" src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row3['product_img_name']; ?>.webp" alt="">
                                    </div>
                                    <div class="right-section">
                                        <p class="right-sec-text"><?php echo $row2['company_name']; ?></p>
                                        <p class="right-sec-text"><?php echo $row3['short_product_details']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <div>
                                <span class="strike-txt"><s>&#8377;<?php echo $row3['mrp']; ?></s></span>
                                <span style="font-weight: bold; color:#388e3c;">&#8377;<?php echo $row3['sell_price']; ?></span>
                            </div>
                        </td>
                        <?php
                        if ($qty_stock <= 0) {
                            echo '<td style="color:#ff3737;">Out of stock</td>';
                        } else {
                            echo '<td style="color:#388e3c;">In stock</td>';
                        }
                        ?>

                        <td>
                            <div>
                                <!-- <a href="remove_wishlist_2.php?wish_id=<?php //echo $row8['id']; ?>"> -->
                                <button class="delete-btn  rmv-d" onclick="remove(<?php echo $row8['id'] ?>)"><img src="images/wishlist/trash.png" alt="Delete"></button>
                                <!-- </a> -->
                                <!-- <button class="cart-btn">
                                    <div class="flex">
                                        <img src="images/wishlist/cart.png" alt="Add to Cart">
                                        <p style="padding-top: 4px;">Add to cart</p>
                                    </div>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
<script>
    var class_name = document.getElementsByClassName("bottom");
    var length = class_name.length;
    console.log(length);
    if (length == 0) {
        $(".container").fadeOut(fadeTime);
        $(".wish-empty").fadeIn(100);
    }

    $(".rmv-d").click(function() {
        removeItem(this);
    });
    var fadeTime = 300;

    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent().parent().parent();
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            length = length - 1;
            console.log(length);
            if (length == 0) {
                $(".container").fadeOut(fadeTime);
                $(".wish-empty").fadeIn(100);
            }
        });
    }

    function remove(wish_id) {
        // alert('Successfully added to Wishlist'+pro_id);
        $.ajax({
            url: "remove_wishlist_2.php",
            method: "POST",
            data: {
                wish_id: wish_id
            },
            success: function(data) {
                alert('Successfully Removed From Wishlist');
                location.reload(true);
            },
            error: function() {
                alert('Can Not be Deleted');
            }
        });
    }
</script>

</html>