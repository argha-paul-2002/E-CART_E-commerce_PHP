<?php
// session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>
<?php


?>


<div class="navigaton">
    <div class="navbar">
        <div style="display:flex;">
            <div class="left-logo">
                <a href="indeex.php">
                    <img src="images/logo/logo light.png" alt="logo">
                </a>
            </div>
            <div class="right">
                <ul style="display:flex;">
                    <?php
                    $sql1 = "SELECT * FROM `product`";
                    $rs1 = mysqli_query($conn, $sql1);
                    while ($row1 = mysqli_fetch_array($rs1)) {
                    ?>
                        <li><a href="products.php?pro_type=<?php echo $row1['id'] ?>&pro_cat=NULL"><?php echo $row1['product_type']?></a>
                            <div class="links"></div>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="searchbar">
            <div class="search">
                <div class="txt-search">
                    <input type="text" name="t1" class="search-txt" id="search" placeholder="Search" onclick="search_click()">
                </div>
            </div>

        </div>
        <div class="options">
            <div class="option_inner">


                <?php
                if (!$loggedin) {
                    echo '<a href="login.php">
                <div class="option_padding">
                    <input type="button" value="LogIn" class="login_button" id="myBtn">
                </div>
                </a>';
                }
                if ($loggedin) {
                    echo ' 
                <a href="profile.php">
                <div class="profile option_padding">
                <p class="text_align">
                    <img src="images/icons/user.png" alt="profile">
                </p>
                <p class="small">User</p>
            </div>
                </a>';
                }
                echo '<a href="wishlist.php">
            <div class="wishlist option_padding">
                <p class="text_align">
                    <img src="images/icons/wish.png" alt="wishlist">
                </p>
                <p class="small">Wishlist</p>
            </div>
        </a>
        <a href="cart.php">
            <div class="cart option_padding">
                <p class="text_align">
                    <img src="images/icons/cart.png" alt="bag">
                </p>
                <p class="small">Cart</p>
            </div>
        </a>
    </div>
</div>
</div>
</div>';
                ?>