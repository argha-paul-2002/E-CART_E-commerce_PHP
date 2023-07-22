<?php
if (!isset($_GET['id'])) {
    header("location: 404.php");
    die();
}
include 'dbconnect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $mail = $_SESSION['umail'];
    $sql7 = "SELECT `id` FROM `users` WHERE `email`= '$mail';";
    $rs7 = mysqli_query($conn, $sql7);
    $row7 = mysqli_fetch_array($rs7);
    $u_id = $row7['id']; ///////////////////////////////////////Get the user id


    $sql8 = "SELECT * FROM `wishlist` WHERE `user_id`=$u_id";
    $rs8 = mysqli_query($conn, $sql8);
    $row9 = mysqli_num_rows($rs8);
}




$p = $row1['company_name'];
$sq = "SELECT `company_name` FROM `company_name` WHERE `id`=$p;";
$rs2 = mysqli_query($conn, $sq);
$row2 = mysqli_fetch_array($rs2);



?>
<?php cart() ?><?php

                // ALL DATA FROM PRODUCT ITEM ACCORDING TO ID FROM PRODUCT_ITEM

                $pro_type_id = $row1['product_type_id'];
                $pro_category = $row1['pro_category'];

                // Get the product type.....men,women....

                $sq12 = "SELECT * FROM `product` WHERE `id`=$pro_type_id;";
                $rs12 = mysqli_query($conn, $sq12);
                $row12 = mysqli_fetch_array($rs12);

                // Get the product category.......shirt,....

                $sq13 = "SELECT * FROM `product_category` WHERE `id`=$pro_category;";
                $rs13 = mysqli_query($conn, $sq13);
                $row13 = mysqli_fetch_array($rs13);
                ?>

<div class="outer outer-width outer-width-res full-width">
    <div class="flex flex-row" style="background-color: rgb(255, 255, 255); padding: 16px;">

        <!-- ********************RIGHT SECTION*********************** -->

        <div class="flex flex-col left-width left">
            <div class="dis-block width-100">
                <div class="left-inner">
                    <div class="left-inner-sec">
                        <div class="galary-left">
                            <div class="galary-left-vis">
                                <div class="gal-over-hid" style="height: 640px;">
                                    <ul class="transition" style="transform: translateY(0px);">
                                        <li class="small-img-sec small-img-prop" style="height: 64px;">
                                            <div class="small-img-pic">
                                                <div class="img-sec">
                                                    <img class="img-i" src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row1['product_img_name']; ?>.webp" onclick="myFunction(this)">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="small-img-sec small-img-prop" style="height: 64px;">
                                            <div class="small-img-pic">
                                                <div class="img-sec">
                                                    <img class="img-i" src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row1['product_img_name_2']; ?>.webp" onclick="myFunction(this)">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="galary-right">
                            <div class="right-img-sec">

                                <div class="img-deco pos-static" style="height: inherit; width: inherit;">
                                    <img class="pic-deco pic-deco-m" id="imageBox" src="images/product-img/<?php echo $row12['product_type']; ?>/<?php echo $row13['pro_category']; ?>/<?php echo $row1['product_img_name']; ?>.webp">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wish-list-outer">
                        <?php

                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            if ($row9 > 0) {
                                while($row8 = mysqli_fetch_array($rs8)){  ////////////////////////Get all wishlist item
                                    $p_id = $row8['pro_id'];
                                    if ($p_id == $id) {
                                        echo '<div class="wish-list " onclick="remove(' . $id . ')"><div class="heart is-active"></div></div>';
                                        break;
                                    } else {
                                        echo '<div class="wish-list add" onclick="add(' . $id . ')"><div class="heart"></div></div>';
                                    }  
                                } 
                            } else {
                                echo '<div class="wish-list add" onclick="add(' . $id . ')"><div class="heart"></div></div>';
                            }
                        } else {
                            echo '<a class="wish-list" href="login.php"><div class="heart"></div></a>';
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="dis-block width-100">
                <div class="margin-top margin-btn-bottom">
                    <ul class="row" style="display: flex;">
                        <li class=" col col-width" style="cursor:pointer;">

                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="hidden" name="p_id" value="<?php echo $id ?>">
                            <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            ?>
                                <a style="display:flex">
                                    <button type="submit" onclick='checkRadio()' class="btn-txt-deco button-dec "><svg class="_1KOMV2" width="16" height="16" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
                                            <path class="" d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"></path>
                                        </svg> Add to cart
                                    </button>
                                    <button onclick="location.href='cart.php'" class="btn-txt-deco button-dec " style="margin: 0 0 0 10px;">
                                        Go to Cart</button>
                                </a>
                            <?php
                            } else {
                            ?>
                                <a>
                                    <button onclick="location.href='login.php'" class="btn-txt-deco button-dec "><svg class="_1KOMV2" width="16" height="16" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
                                            <path class="" d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"></path>
                                        </svg> Add to cart
                                    </button>
                                </a>
                            <?php
                            }
                            ?>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="dis-block width-100"></div>
        </div>



        <!-- ********************RIGHT SECTION*********************** -->

        <div class="right-width right">
            <div class="product-details">
                <p class="comp-name"><?php echo $row2['company_name']; ?></p>
                <p class="pro-name"><?php echo $row1['short_product_details']; ?></p>
            </div>
            <div class="price">
                <div class="price-details details-padding">
                    <span class="bold price-margin  amount-font">&#8377;<?php echo $row1['sell_price']; ?></span>
                    <span class="amt-font fade-color price-margin"><s>&#8377;<?php echo $row1['mrp']; ?></s></span>
                    <?php
                    $disc = $row1['mrp'] - $row1['sell_price'];
                    $discount = ($disc * 100) / $row1['mrp'];
                    ?>
                    <span class="bold disc-color price-margin"><?php echo floor($discount); ?>% Off</span>
                    <p class="tax">inclusive of all taxes</p>
                </div>
            </div>

            <!-- ******************* SIZE SELECTION SECTION ******************* -->

            <div class="size-buttons-size-container" id="sizeButtonsContainer">
                <div class="size-buttons-size-header">
                    <h4 class="size-buttons-select-size">SELECT SIZE</h4>
                </div>
                <div class="size-buttons-size-buttons">

                    <?php
                    $sql5 = "SELECT * FROM `size-qty` WHERE `pro_item_id`=$id AND `qty_available`>0;";
                    $rs5 = mysqli_query($conn, $sql5);
                    while ($row5 = mysqli_fetch_array($rs5)) {
                    ?>

                        <label class="container">
                            <?php
                            $ss = $row5['size'];
                            ?>
                            <input type="radio" name="size" id="size" class="radio" value="<?php echo $ss ?>" required>
                            <div class="size-buttons-tipAndBtnContainer">
                                <div class="size-buttons-buttonContainer">
                                    <span class="size-buttons-size-button size-buttons-size-button-default size-buttons-size-button-selected">
                                        <span class="size-buttons-size-strike-hide"></span>

                                        <?php
                                        $s = $row5['size'];
                                        $sql6 = "SELECT `size_name` FROM `size` WHERE `id`=$s;";
                                        $rs6 = mysqli_query($conn, $sql6);
                                        $row6 = mysqli_fetch_array($rs6);
                                        ?>
                                        <p class="size-buttons-unified-size"><?php echo $row6['size_name']; ?></p>
                                    </span>
                                </div>
                            </div>
                        </label>

                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="number">
                <span class="minus">-</span>
                <input class="input" name="qty" type="number" value="1" min="1" max="10" />
                <span class="plus">+</span>
            </div>

            <div class="product-quality">
                <p>100% Original Products</p>
                <p>Pay on delivery might be available</p>
                <p>Easy 30 days returns and exchanges</p>
                <p>Try & Buy might be available</p>
            </div>
            <div class="product-details-lower">
                <div style="width:35%;">
                    <h4 class="pdp-product-description-title"><!-- react-text: 249 -->Product Details
                        <!-- /react-text -->
                    </h4>
                    <div class="pdp-product-description-content">
                        <ul>
                            <p style="white-space: pre-wrap;"><?php echo $row1['product_details']; ?></p>
                        </ul>
                    </div>
                </div>
                <div class="pdp-sizeFitDesc">
                    <h4 class="pdp-sizeFitDescTitle pdp-product-description-title">Size &amp; Fit</h4>
                    <div class="pdp-sizeFitDescContent pdp-product-description-content"><?php echo $row1['size_fit']; ?> </div>
                </div>
                <div class="pdp-sizeFitDesc">
                    <h4 class="pdp-sizeFitDescTitle pdp-product-description-title">Material &amp; Care</h4>
                    <div class="pdp-sizeFitDescContent pdp-product-description-content">Cotton<br>Machine Wash</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

function cart()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $mail = $_SESSION['umail'];
        global $conn;
        global $showError, $showAlert;
        $sql7 = "SELECT `id` FROM `users` WHERE `email`= '$mail';";
        $rs7 = mysqli_query($conn, $sql7);
        $row7 = mysqli_fetch_array($rs7);
        if (isset($_GET['p_id']) && isset($_GET['size']) && isset($_GET['qty'])) {
            $pro_id = $_GET['p_id'];
            $u_id = $row7['id'];
            $size = $_GET['size'];
            $qty = $_GET['qty'];
            $sql8 = "SELECT * FROM `shop_cart` WHERE `user_id`=$u_id AND `pro_id`=$pro_id AND `pro_size`=$size";
            $rs8 = mysqli_query($conn, $sql8);
            $row8 = mysqli_num_rows($rs8);
            if ($row8 > 0) {
                $showError = "Item is already in the cart";
            } else {
                $insert = "INSERT INTO `shop_cart` (`user_id`, `pro_id`,`pro_size`,`pro_qty`) VALUES ($u_id, $pro_id,$size,$qty);";
                $insert_query = mysqli_query($conn, $insert);
                $showAlert = "Item is successfully added to cart";
            }
        }
    }
    // else{
    //     header("location: login.php");
    // }
}
?>