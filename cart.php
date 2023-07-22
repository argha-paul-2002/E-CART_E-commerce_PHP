<?php
session_start();
$out = 0;

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

<html lang="en">

<head>
    <title>Shopping Cart | E-Cart.com</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body onload="recalculateCart();">
    <?php require 'navbar.php' ?>
    <div class="cart-empty">
        <div class="empty-img">
            <img class="em-img" src="images/cart/empty-cart.png" alt="Cart is Empty">
        </div>
        <div class="em-head">
            <h1>Oops! Your cart is empty!</h1>
        </div>
        <a class="empty-link" href="indeex.php">
            <button class="empty-button">SHOP NOW</button>
        </a>
    </div>
    <main class="main-c" style="z-index:2;">
        <div class="container">
            <div class="left-section">
                <div class="alert-result">

                </div>
                <?php
                /* Selecting product info from cart*/
                $sql8 = "SELECT * FROM `shop_cart` WHERE `user_id`=$u_id;";
                $rs8 = mysqli_query($conn, $sql8);
                while ($row8 = mysqli_fetch_array($rs8)) {
                ?>

                    <div class="total-product">
                        <?php
                        $pro_id = $row8['pro_id']; ///////////////////Product ID
                        $pro_size = $row8['pro_size']; ///////////////SIZE OF PRODUCT
                        $pro_qty = $row8['pro_qty']; /////////////////PRODUCT QUANTITY

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
                        <div class="product">
                            <div class="pic"><img class="picture" src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row3['product_img_name']; ?>.webp" alt=""></div>
                            <div class="details">
                                <a href="product-view.php?id=<?php echo $pro_id; ?>">
                                    <p class="big-font"><?php echo $row2['company_name']; ?></p>
                                    <p class="fade-font"><?php echo $row3['short_product_details']; ?></p>
                                    <p class="fade-font">Size: <?php echo $row16['size_name']; ?></p>
                                </a>
                                <div class="price-details">
                                    <span class="fade-font price-margin mrp-price">
                                        <s class="hrdc">&#8377;
                                            <span class="disc"><?php echo $row3['mrp']; ?></span>
                                        </s>
                                    </span>
                                    <span class="offer-price price-margin  amount-font">&#8377;
                                        <span class="price"><?php echo $row3['sell_price']; ?></span></span>
                                    <?php
                                    $disc = $row3['mrp'] - $row3['sell_price'];
                                    $discount = ($disc * 100) / $row3['mrp'];
                                    ?>
                                    <span class="offer-price disc-color price-margin"><?php echo floor($discount); ?>% Off</span>
                                </div>

                                <?php
                                if ($qty_stock <= 0) {
                                    echo '<p class="out-of-stock">Out Of Stock</p>';
                                    $out += 1;
                                }
                                ?>
                                <span>Sub Total:&#8377;</span>
                                <?php $sub = $row8['pro_qty'] * $row3['sell_price']; ?>
                                <span class="subtotal"><?php echo $sub ?></span>
                                <?php $mr = $row8['pro_qty'] * $row3['mrp']; ?>
                                <span class="mrp-di" hidden><?php echo $mr; ?></span>
                            </div>

                        </div>

                        <div class="button-controls">
                            <div class="qty">
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input class="input" id="quantity" type="number" value="<?php echo $row8['pro_qty']; ?>" min="1" max="10" />
                                    <span class="plus">+</span>
                                </div>
                                <!-- <p class="big-font"><?php //echo $row8['id']; 
                                                            ?></p> -->
                                <input type="button" class="flex button-font cursor number qty_update " value="Update">
                                <input type="hidden" name="cart_id" value="<?php echo $row8['id']; ?>" id="cart_id">
                                <a href="add_to_wishlist.php?pro_id=<?php echo $row8['pro_id']; ?>" onclick="location.href='add_to_wishlist.php?pro_id=<?php echo $row8['id']; ?>'">
                                    <button class="flex button-font cursor number wish">
                                        <img src="images/wishlist/heart.png" class="small-heart" alt="">
                                        <p>Wishlist</p>
                                    </button>
                                </a>
                                <!-- <a href="javascript:void(0)" onclick="location.href='remove_from_cart.php?pro_id=<?php //echo $row8['pro_id']; 
                                                                                                                        ?>'"> -->
                                <a href="remove_from_cart.php?cart_item_id=<?php echo $row8['id']; ?>" onclick="location.href='remove_from_cart.php?pro_id=<?php echo $row8['pro_id']; ?>'">
                                    <button class="flex button-font cursor number rmv">
                                        <img src="images/wishlist/trash.png" class="small-rmv" alt="">
                                        <p>Remove</p>
                                    </button>
                                </a>

                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($out == 0) {
                ?>
                    <div class="place-order">
                        <div class="btn-outer">
                            <button class="checkout-cta" onclick="location.href = 'address_confirm.php';" id="checkout">PLACE ORDER</button>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="place-order">
                        <div class="btn-outer">
                            <button style="opacity:0.5;cursor:not-allowed;" class="checkout-cta" id="checkout_n" disabled>PLACE ORDER</button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="right-section">
                <div class="pro-details">
                    <p>
                    <h2 class="fade-font">PRICE DETAILS</h2>
                    </p>
                    <div class="bill-details right-font">
                        <div class="bill flex">
                            <div class="type">Price (<span class="total-items">1</span> items)</div>
                            <div class="amount">&#8377;<span class="final-value" id="basket-subtotal"></span></div>
                        </div>
                        <div class="bill flex">
                            <div class="type">Discount</div>
                            <div class="disc-c amount disc-color">-&#8377;<span id="disc-f"></span></div>
                        </div>
                        <div class="bill flex">
                            <div class="type">Delivery Charges</div>
                            <div class="amount disc-color">FREE</div>
                        </div>
                        <div class="bill flex lines bold-font">
                            <div class="type">Total Amount</div>
                            <div class="amount">&#8377;<span class="total-value" id="basket-total"></span></div>
                        </div>
                        <div class="disc-color saving">
                            <strong>You will save &#8377;<span class="disc-c" id="disc-fc">8500</span> on this order</strong>
                        </div>

                        <div class="flex bold-font">
                            <div class="type"><img class="secure-img" src="images/icons/secure.png" alt=""></div>
                            <div class="secure fade-font">Safe and Secure Payments.Easy returns. 100% Authentic
                                products.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>


<script>
    // ***********************************Quantity Update*******************************
    $(document).ready(function() {
        $(".qty_update").on('click', function(event) {
            // $(".qty_update").click(function() {
            // var qty=$(this).closest(".quantity").val();
            var qty = $(this).parent().children(".number").children("#quantity").val();
            var id = $(this).parent().children('#cart_id').val();
            $.ajax({
                method: "POST",
                url: 'form/update_cart_qty.php',
                data: {
                    qty: qty,
                    id: id
                },
                success: function(data) {

                    // Ajax call completed successfully
                    // alert("Form Submited Successfully");
                    $('.alert-result').html(data);
                    alert('SUCCESS! Quantity Updated Successfully');
                    // alert(data);
                    // location.reload();
                },
                error: function(data) {

                    // Some error in ajax call
                    alert("some Error")
                }
            });
        });
    });





    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            count = count > 10 ? 10 : count;
            $input.val(count);
            $input.change();
            return false;
        });
    });

    $(".rmv").click(function() {
        removeItem(this);
    });
    var fadeTime = 300;

    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent().parent().parent();
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            recalculateCart();
            updateSumItems();
        });
    }


    /* Assign actions */
    $(".input").change(function() {
        updateQuantity(this);
    });

    $(document).ready(function() {
        updateSumItems();
    });
    var sub_total = 0;
    var productRow = $(".input").parent().parent().parent().parent();
    var price = parseFloat(productRow.children(".product").children(".details").children(".price-details").children(".offer-price").children(".price").text());
    // console.log(price);
    $('.total-product').each(function() {
        sub_total = sub_total + price;
        // console.log(sub_total);
    });


    // subTotal=subTotal+price;
    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent().parent().parent();
        var price = parseFloat(productRow.children(".product").children(".details").children(".price-details").children(".offer-price").children(".price").text());
        var disc_price = parseFloat(productRow.children(".product").children(".details").children(".price-details").children(".mrp-price").children(".hrdc").children(".disc").text());
        console.log(disc_price);
        // console.log(price);
        var quantity = $(quantityInput).val();


        var lineDisc = disc_price * quantity;
        console.log(disc_price);
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children(".product").children(".details").children(".subtotal").each(function() {
            $(this).fadeOut(fadeTime, function() {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        /* Update line price MRP display and recalc cart totals */
        productRow.children(".product").children(".details").children(".mrp-di").each(function() {
            $(this).fadeOut(fadeTime, function() {
                $(this).text(lineDisc.toFixed(2));
                recalculateCart();
            });
        });

        // productRow.find(".item-quantity").text(quantity);
        updateSumItems();
    }

    function updateSumItems() {
        var sumItems = 0;
        $(".input").each(function() {
            sumItems += parseInt($(this).val());
        });
        $(".total-items").text(sumItems);
    }


    /* Recalculate cart */
    function recalculateCart(onlyTotal) {
        var subtotal = 0;
        var mrp = 0;

        /* Sum up MRP totals */
        $(".details").each(function() {
            mrp += parseFloat($(this).children(".mrp-di").text());
        });
        // console.log(mrp);

        /* Sum up row totals */
        $(".details").each(function() {
            subtotal += parseFloat($(this).children(".subtotal").text());
        });

        /* Calculate totals */
        var mrpSub = mrp;
        var total = subtotal;
        var disc = mrp - subtotal;
        // console.log(mrp);
        // console.log(subtotal);
        // console.log(disc);

        /*If switch for update only total, update only total display*/
        if (onlyTotal) {
            /* Update total display */
            $(".total-value").fadeOut(fadeTime, function() {
                $("#basket-total").html(total.toFixed(2));
                $("#basket-subtotal").html(mrpSub.toFixed(2));
                $("#disc-f").html(disc.toFixed(2));
                $("#disc-fc").html(disc.toFixed(2));
                $(".disc-c").fadeIn(fadeTime);
                $(".total-value").fadeIn(fadeTime);
            });
        } else {
            /* Update summary display. */
            $(".final-value").fadeOut(fadeTime, function() {
                $("#basket-subtotal").html(mrpSub.toFixed(2));
                $("#disc-f").html(disc.toFixed(2));
                $("#disc-fc").html(disc.toFixed(2));
                $("#basket-total").html(total.toFixed(2));
                if (total == 0) {
                    $(".checkout-cta").fadeOut(fadeTime);
                    $(".main-c").fadeOut(100);
                    $(".cart-empty").fadeIn(fadeTime);
                } else {
                    $(".checkout-cta").fadeIn(fadeTime);
                    $(".main-c").fadeIn(fadeTime);
                }
                $(".final-value").fadeIn(fadeTime);
            });
        }
    }
</script>


</html>