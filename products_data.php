<?php
include 'dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $query = "SELECT * FROM `product_item` WHERE `status`='1'";
        if (isset($_POST['product_type'])) {
            $p_type = implode(",", $_POST['product_type']);
            $query .= "AND `product_type_id` IN ('" . $p_type . "')";
        }
        if (isset($_POST['company'])) {
            $p_company = implode(",", $_POST['company']);
            $query .= "AND `company_name` IN ('" . $p_company . "')";
        }
        if (isset($_POST['product_category'])) {
            $p_cat = implode(",", $_POST['product_category']);
            $query .= "AND `pro_category` IN ('" . $p_cat . "')";
        }
        if (isset($_POST['price'])) {
            $p_price = implode(",", $_POST['price']);
            $query .= "AND `sell_price` < ('" . $p_price . "')";
        }
        if (isset($_POST['sort'])) {
            $val = $_POST['sort'];
            if ($val == 1) {
                $query .= "AND ORDER BY `date`";
            }
            if ($val == 2) {
                $query .= "AND ORDER BY `sell_price` desc";
            }
            if ($val == 3) {
                $query .= "AND ORDER BY `sell_price` asc";
            }
        }
        if (isset($_POST['offer'])) {
            $p_offer = implode(",", $_POST['offer']);
            $query .= "AND `discount` >= ('" . $p_offer . "')";
        }


        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        // $output='';
        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                // $output .='';

?>
                <?php
                $com_id = $row['company_name'];
                $sq = "SELECT `company_name` FROM `company_name` WHERE `id`=$com_id;";
                $rs2 = mysqli_query($conn, $sq);
                $row2 = mysqli_fetch_array($rs2);

                $pro_category = $row['pro_category'];

                // For product type
                $pro_type = $row['product_type_id'];
                $sq11 = "SELECT `product_type` FROM `product` WHERE `id`=$pro_type;";
                $rs11 = mysqli_query($conn, $sq11);
                $row3 = mysqli_fetch_array($rs11);
                // echo $row3['product_type'];////////////////////////// Men, Women ..........

                $sq12 = "SELECT `pro_category` FROM `product_category` WHERE `id`=$pro_category;";
                $rs12 = mysqli_query($conn, $sq12);
                $row4 = mysqli_fetch_array($rs12);
                // echo $row4['pro_category'];////////////////////////// shirt,-shirt ..........
                ?>

                <?php
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
                ?>



                <div class="product-sec">
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        if ($row9 > 0) {
                            while($row8 = mysqli_fetch_array($rs8)){  ////////////////////////Get all wishlist item
                                $p_id = $row8['pro_id'];
                                if ($p_id == $row['id']) {
                                    echo '<div class="wish-list " onclick="remove(' . $row['id'] . ')"><div class="heart is-active"></div></div>';
                                    break;
                                } else {
                                    echo '<div class="wish-list add" onclick="add(' . $row['id'] . ')"><div class="heart"></div></div>';
                                }  
                            } 
                            
                        } else {
                            echo '<div class="wish-list add" onclick="add(' . $row['id'] . ')"><div class="heart"></div></div>';
                        }
                    } else {
                        echo '<a class="wish-list" href="login.php"><div class="heart"></div></a>';
                    }

                    ?>

                    <a href="product-view.php?id=<?php echo $row['id']; ?>" target="_blank">
                        <div class="product-s">
                            <div class="pro-img">
                                <img class="pro" src="images/product-img/<?php echo $row3['product_type']; ?>/<?php echo $row4['pro_category']; ?>/<?php echo $row['product_img_name']; ?>.webp" alt="">
                            </div>
                            <div class="pro-desc">
                                <div class="company-name bold details-padding">
                                    <?php
                                    echo $row2['company_name'];
                                    ?>
                                </div>
                                <div class="product-name fade-color details-padding">
                                    <?php
                                    echo $row['short_product_details'];
                                    ?>
                                </div>
                                <div class="price-details details-padding">
                                    <span class="amt-font fade-color price-margin"><s>&#8377;<?php echo $row['mrp']; ?></s></span>
                                    <span class="bold price-margin  amount-font">&#8377;<?php echo $row['sell_price']; ?></span>

                                    <?php
                                    $disc = $row['mrp'] - $row['sell_price'];
                                    $discount = ($disc * 100) / $row['mrp'];
                                    ?>
                                    <span class="bold disc-color price-margin"><?php echo floor($discount); ?>% Off</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
<?php

            }
        } else {
            echo '<img class="em-img" src="./images/cart/empty-cart.png" alt="Cart is Empty">';
        }
        // echo $output;
    }
} else {
    // echo '<h3>Request is not Post</h3>';
    header("location: 404.php");
}
?>
<script>

</script>