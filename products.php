<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $mail = $_SESSION['umail'];
}

?>
<html>

<head>
    <title>Online shopping for Men,Women Fashion & Lifestyle</title>
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <?php require 'navbar.php' ?>

    <div class="body-main">
        <!-- <div class="path"><span class="fade-color">Home/Clothing/Men/</span><span class="bold"> T-Shirts</span></div>
        <div class="path type bold big-font">Casual Shirts For men <span class="fade-color">- 120</span></div> -->
        <div class=" flex" style="   justify-content: center;">
            <form action="123.php">
                <div class="left-all-sec">
                    <div class="sticky">
                        <div class="filter-sec flex padding">
                            <span class="bold big-font">FILTER</span>
                            <div class="clear-filter">
                                <!-- <input type="reset"> -->
                                <span><a href="products.php" style="color: #ff3f6c;"><span>CLEAR ALL</span></a></span>
                            </div>
                        </div>
                        <div class="hr-line"></div>
                        <div>
                            <div class="heading bold padding ">CATEGORIES</div>
                            <div class="checks">
                                <?php
                                // For product type
                                $sq11 = "SELECT * FROM `product`";
                                $rs11 = mysqli_query($conn, $sq11);
                                $row8 = mysqli_num_rows($rs11);
                                while ($row3 = mysqli_fetch_array($rs11)) {
                                ?>
                                    <label class="container" style="text-transform: capitalize;"><?php echo $row3['product_type']; ?>
                                        <?php
                                        if (isset($_GET['pro_type'])) {
                                            $pr_type = $_GET['pro_type'];

                                            $p_type = $row3['id'];
                                            if ($pr_type == $p_type) {
                                        ?>
                                                <input type="checkbox" class="common_selector product_type" value="<?php echo $row3['id']; ?>" checked>
                                            <?php
                                            } else {
                                            ?>
                                                <input type="checkbox" class="common_selector product_type" value="<?php echo $row3['id']; ?>">
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <input type="checkbox" class="common_selector product_type" value="<?php echo $row3['id']; ?>">
                                        <?php
                                        }
                                        ?>

                                        <span class="checkmark"></span>
                                    </label>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="hr-line"></div>
                        <div>
                            <div class="heading bold padding ">SUB-CATEGORIES</div>
                            <div class="checks" style="height: 300px;overflow: auto;">
                                <?php
                                // For product type
                                $sq11 = "SELECT * FROM `product`";
                                $rs11 = mysqli_query($conn, $sq11);
                                $row8 = mysqli_num_rows($rs11);
                                while ($row3 = mysqli_fetch_array($rs11)) {
                                ?>
                                    <p class="bold p-type"><?php echo $row3['product_type']; ?></p>
                                    <?php
                                    // For product type
                                    $p_id = $row3['id'];
                                    $sq1 = "SELECT * FROM `product_category` WHERE `product_id`=$p_id";
                                    $rs1 = mysqli_query($conn, $sq1);
                                    $row1 = mysqli_num_rows($rs1);
                                    if (isset($_GET['pro_cat'])) {
                                        $pr_cat = $_GET['pro_cat'];
                                    }
                                    if (isset($_GET['pro_type'])) {
                                        $pr_type = $_GET['pro_type'];
                                    }
                                    while ($row5 = mysqli_fetch_array($rs1)) {
                                    ?>

                                        <label class="container" style="text-transform: capitalize;"><?php echo $row5['pro_category']; ?>
                                            <?php
                                            $p_cat = $row5['id'];
                                            $p_type = $row3['id'];

                                            if (isset($_GET['pro_cat'])) {
                                                if ($pr_cat == $p_cat && $pr_type == $p_type) {
                                            ?>

                                                    <input type="checkbox" class="common_selector product_category" value="<?php echo $row5['id']; ?>" checked>
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" class="common_selector product_category" value="<?php echo $row5['id']; ?>">
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <input type="checkbox" class="common_selector product_category" value="<?php echo $row5['id']; ?>">
                                            <?php
                                            }
                                            ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                        <div class="hr-line"></div>
                        <div style="height: 200px;overflow: auto;">
                            <div class="heading bold padding "><span>BRAND</span></div>
                            <div class="checks">
                                <?php
                                // For product type
                                $sq20 = "SELECT * FROM `company_name`";
                                $rs20 = mysqli_query($conn, $sq20);
                                // $row20 = mysqli_num_rows($rs11);
                                while ($row20 = mysqli_fetch_array($rs20)) {
                                ?>
                                    <label class="container" style="text-transform: capitalize;"><?php echo $row20['company_name']; ?>
                                        <input type="checkbox" class="common_selector company" value="<?php echo $row20['id']; ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="hr-line"></div>
                        </div>
                        <div style="height: 200px;overflow: auto;">
                            <div class="heading bold padding "><span>PRICE</span></div>
                            <div class="checks">
                                <!-- <div class="price-range-slider">

                                <p class="range-value">
                                    <input type="text" id="amount" readonly>
                                </p>
                                <div id="slider-range" class="range-bar"></div>

                            </div> -->

                                <label class="container">Under Rs.1000
                                    <input type="radio" name="price" value="1000" class="common_selector price">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Under Rs.2000
                                    <input type="radio" name="price" value="2000" class="common_selector price">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Under Rs.3000
                                    <input type="radio" name="price" value="3000" class="common_selector price">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Under Rs.4000
                                    <input type="radio" name="price" value="4000" class="common_selector price">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Under Rs.5000
                                    <input type="radio" name="price" value="5000" class="common_selector price">
                                    <span class="round-checkmark round"></span>
                                </label>
                            </div>
                            <div class="hr-line"></div>
                        </div>

                        <div style="height: 200px;overflow: auto;">
                            <div class="heading bold padding "><span>PRICE OFFER</span></div>
                            <div class="checks">
                                <label class="container">10% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="10">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">20% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="20">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">30% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="30">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">40% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="40">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">50% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="50">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">60% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="60">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">70% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="70">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">80% and above
                                    <input type="checkbox" name="offer" class="common_selector offer" value="80">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="hr-line"></div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="right-all-sec">
                <div class="filter-sec flex padding">
                    <span class="bold big-font">AVAILABLE PRODUCTS</span>
                    <div class="clear-filter">
                        <!-- <div class="dropdown">
                            <button class="dropbtn">
                                <div>Sort By</div>
                                <div><i class="arrow down"></i></div>
                            </button>
                            <div class="dropdown-content">
                                <label class="container">Whats New
                                    <input type="radio" name="sort" class="common_selector sort" value="1">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Price: Low to High
                                    <input type="radio" name="sort" class="common_selector sort" value="2">
                                    <span class="round-checkmark round"></span>
                                </label>
                                <label class="container">Price: High to Low
                                    <input type="radio" name="sort" class="common_selector sort" value="3">
                                    <span class="round-checkmark round"></span>
                                </label>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="hr-line"></div>
                <div id="output"></div>
                <div class="outer">
                    <div class="product-outer" style="flex-wrap: wrap;">
                        <!-- All products will fetch Here -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

<script>
    $('#show-more-content').hide();

    $('#show-more').click(function() {
        $('#show-more-content').show(200);
        $('#show-less').show();
        $('#show-more').hide();
    });

    $('#show-less').click(function() {
        $('#show-more-content').hide(150);
        $('#show-more').show();
        $(this).hide();
    });




    // Code to dis-select radio button 

    // $('input[type=radio]').on('click', function () {
    //     $self = $(this);
    //     if ($self.hasClass('is-checked')) {
    //         $self.prop('checked', false).removeClass('is-checked');
    //     } else {
    //         $self.addClass('is-checked');
    //     }
    // });

    $(document).ready(function() {
        filter_data();
        // all_filter();

        function filter_data() {
            var action = 'products_data';
            var product_type = get_filter('product_type');
            var company = get_filter('company');
            var product_category = get_filter('product_category');
            var price = get_filter('price');
            var sort = get_filter('sort');
            console.log(sort);
            var offer = get_filter('offer');
            $.ajax({
                url: "products_data.php",
                method: "POST",
                data: {
                    action: action,
                    product_type: product_type,
                    company: company,
                    product_category: product_category,
                    price: price,
                    sort: sort,
                    offer: offer
                },
                success: function(data) {
                    $('.product-outer').html(data);
                }
            });
        }

        // function all_filter() {
        //     $('input[type=checkbox]:checked').each(function() {

        //         var stat = $(this).parent().text();

        //         var res=$('#output').append(stat );
        //         console.log(res);
        //     });
        // }


        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }
        $('.common_selector').click(function() {
            filter_data();
            // all_filter();
        });
    })

    function remove(pro_id) {
        // alert('Successfully added to Wishlist'+pro_id);
        $.ajax({
            url: "remove_from_wishlist.php",
            method: "POST",
            data: {
                pro_id: pro_id
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

    function add(pro_id) {
        // alert('Successfully added to Wishlist'+pro_id);
        $.ajax({
            url: "add_to_wishlist.php",
            method: "POST",
            data: {
                pro_id: pro_id
            },
            success: function(data) {
                alert('Successfully Added to Wishlist');
                location.reload(true);
            },
            error: function() {
                alert('Can Not be Added to Wishlist');
            }
        });
    }


    // Code for Wishlist Heart
    // $(function tog() {
    //     $(".heart").on("click", function() {
    //         $(this).toggleClass("is-active");
    //     });
    // });
</script>


</html>