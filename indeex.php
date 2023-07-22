<?php
include 'dbconnect.php';
session_start();
?>

<html>

<head>
    <title>Online shopping for Men,Women Fashion & Lifestyle</title>
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <?php require 'navbar.php' ?>
    <div class="body_main">
        <a href="#">
            <div class="vertical_txt">
                <h3>FLAT 50% OFF</h3>
            </div>
        </a>
        <div class="banner">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <!-- <div class="numbertext">1 / 3</div> -->
                    <a href="products.php"><img src="images/banner/banner-1.png" style="width:100%"></a>
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">2 / 3</div> -->
                    <a href="products.php"><img src="images/banner/banner-2.png" style="width:100%"></a>
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 3</div> -->
                    <a href="products.php"><img src="images/banner/banner-3.png" style="width:100%"></a>
                    <!-- <div class="text">Caption Three</div> -->
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>


        </div>

        <!-- PRODUCT DESIGN SECTION STARTS -->
        <?php
        $sql1 = "SELECT * FROM `product`";
        $rs1 = mysqli_query($conn, $sql1);
        while ($row1 = mysqli_fetch_array($rs1)) {
        ?>
            <div class="outer_section">
                <div class="inner">
                    <div class="inner_products_type">
                        <a href="products.php?pro_type=<?php echo $row1['id'] ?>&pro_cat=NULL">
                            <img src="images/product-type/<?php echo $row1['pro_type_img_name'] ?>.png" class="product_type_image_format" alt="">
                        </a>
                    </div>
                    <div class="pro-out-sec">
                        <div class="outer">
                            <div class="product-outer">

                                <?php
                                $c_id = $row1['id'];
                                $sql = "SELECT * FROM `product_category` WHERE `product_id`=$c_id;";
                                $rs = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                    <div class="product-sec">
                                        <a href="products.php?pro_type=<?php echo $row1['id'] ?>&pro_cat=<?php echo $row['id']; ?>">
                                            <div class="product-s">
                                                <div class="pro-img">
                                                    <img class="pro" src="images/product-category/<?php echo $row1['product_type'] ?>/<?php echo $row['pro_category']; ?>.webp" alt="">
                                                </div>
                                                <div class="pro-desc">
                                                    <?php
                                                    $p = $row['company_name'];
                                                    $sq = "SELECT `company_name` FROM `company_name` WHERE `id`=$p;";
                                                    $rs2 = mysqli_query($conn, $sq);
                                                    $row2 = mysqli_fetch_array($rs2);
                                                    ?>
                                                    <div class="company-name bold details-padding">
                                                        <?php
                                                        echo $row2['company_name'];
                                                        ?>
                                                    </div>
                                                    <div class="product-name fade-color details-padding"><?php echo $row['pro_category']; ?>
                                                    </div>
                                                    <div class="price-details details-padding">

                                                        <span class="bold disc-color price-margin">Upto <?php echo $row['offer']; ?>% Off</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


        <!-- PRODUCT DESIGN SECTION ENDS -->
    </div>
</body>
<?php
include 'footer.php';
?>

<script src="js/navigation.js"></script>
<script src="js/slider.js"></script>
<script src="js/arrows.js"></script>


</html>