<?php
include 'dbconnect.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $mail = $_SESSION['umail'];

    // Get user id from user email

    $sql7 = "SELECT * FROM `users` WHERE `email`= '$mail';";
    $rs7 = mysqli_query($conn, $sql7);
    $row7 = mysqli_fetch_array($rs7); ///////////////////////////ALL INFORMATION FROM USER TABLE
    $u_id = $row7['id']; ///////////////////////////////////////Get the user id


}
if(!isset($_GET['order'])){
    header("location: form/wrong.php");
    exit;
}
?>


<html>

<head>

    <title>E-Cart | My profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/order_details.css">
    <style>
        .radio {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .container input:checked~.address-s .collapsible-s {

            border-radius: 30px;
            background-color: #9d2a32;
        }

        .extra {
            font-size: 20px;
            margin: 15px 0 0 0;
            width: 100%;
            padding: 15px 0px;
        }

        .right-sec-full {
            margin: auto;
        }

        .navbar {
            width: 90%;
            margin: auto;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>


<body>
    <?php require 'navbar.php' ?>
    <div class="_full-outer">
        <div class="content row">
            <div class="right-sec-full">
                <div class="alert-result">

                </div>
                <div class="right-content">

                    <div id="Address" class="pro-address tabcontent">
                        <span class="heading-txt-right">Order Address</span>
                        <form action="payment_method.php">
                            <div class="saved-address">

                                <?php
                                $o_id = $_GET['order'];
                                $sq = "SELECT * FROM `order_details` WHERE `id`=$o_id;";
                                $rs1 = mysqli_query($conn, $sq);
                                $row1 = mysqli_fetch_array($rs1);



                                $a_id = $row1['ship_address'];
                                $sql = "SELECT * FROM `address` WHERE `id`=$a_id;";
                                $rs = mysqli_query($conn, $sql);
                                $row3 = mysqli_num_rows($rs);
                                $row = mysqli_fetch_array($rs);
                                ?>

                                <label class="container">
                                    <input type="radio" name="a_id" id="address" class="radio address" value="<?php echo $row['id']; ?>" required>
                                    <div class="address-s">
                                        <div class="collapsible-s">
                                            <div>
                                                <div style=" font-size: 18px;font-weight: bold;">
                                                    <?php //echo $row['id']; 
                                                    ?>
                                                    <span><?php echo $row['name']; ?></span>
                                                    <span><?php echo $row['ph_no']; ?></span>
                                                </div>

                                            </div>
                                            <div class="details">
                                                <span><?php echo $row['locality']; ?>,</span>
                                                <span><?php echo $row['full_address']; ?>,</span>
                                                <span><?php echo $row['city']; ?>,</span>
                                                <span><?php echo $row['state']; ?>,</span>
                                                <span><?php echo $row['district']; ?>,</span>
                                                <span><?php echo $row['pincode']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-items">
            <?php
            $order_id = $_GET['order'];
            $sql8 = "SELECT * FROM `order_item` WHERE `order_id`=$order_id;";
            $rs8 = mysqli_query($conn, $sql8);
            while ($row8 = mysqli_fetch_array($rs8)) {
            ?>
                <?php
                $pro_id = $row8['pro_item_id']; ///////////////////Product ID From Order_Item Table
                $pro_size = $row8['size']; ///////////////SIZE OF PRODUCT Order_Item Table
                $pro_qty = $row8['qty']; /////////////////PRODUCT QUANTITY Order_Item Table

                // ALL DATA FROM PRODUCT ITEM ACCORDING TO PRODUCT ID

                $sq11 = "SELECT * FROM `product_item` WHERE `id`=$pro_id;";
                $rs11 = mysqli_query($conn, $sq11);
                $row3 = mysqli_fetch_array($rs11);
                $pro_type_id = $row3['product_type_id'];
                $pro_category = $row3['pro_category'];
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

                //Get the size name
                $sq14 = "SELECT * FROM `product_category` WHERE `id`=$pro_size;";
                $rs14 = mysqli_query($conn, $sq14);
                $row14 = mysqli_fetch_array($rs14);

                //Get the size of stock
                $sq15 = "SELECT * FROM `size-qty` WHERE `size`=$pro_size AND `pro_item_id`=$pro_id;";
                $rs15 = mysqli_query($conn, $sq15);
                $row15 = mysqli_fetch_array($rs15);

                $qty_stock = $row15['qty_available'];


                //Get the Name of the size
                $sq16 = "SELECT * FROM `size` WHERE `id`=$pro_size;";
                $rs16 = mysqli_query($conn, $sq16);
                $row16 = mysqli_fetch_array($rs16);


                ?>
                <div class="items">
                    <div class="p-image">
                        <img src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row3['product_img_name']; ?>.webp" alt="Product Image" class="p_img_class">
                    </div>
                    <div class="p-details">
                        <a href="product-view.php?id=<?php echo $pro_id; ?>">
                            <p class="big-font"><?php echo $row2['company_name'];
                                                ?></p>
                            <p class="fade-font"><?php echo $row3['short_product_details'];
                                                    ?></p>
                            <p class="fade-font">Size: <?php echo $row16['size_name'];
                                                        ?></p>
                            <p class="fade-font">Quantity: <?php echo $pro_qty;
                                                            ?></p>
                            <p>
                                <span class="offer-price price-margin  amount-font">&#8377;<span class="price"><?php echo $row8['price'];
                                                                                                                ?>
                            </p><?php //echo $row3['sell_price']; 
                                ?></span>
                            </span>
                            </p>
                        </a>
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
    $("#save-btn").on('click', function(event) {
        if (!$('.address').is(':checked')) {
            alert("Address Is not Selected :( ");
        }
    });
</script>

</html>