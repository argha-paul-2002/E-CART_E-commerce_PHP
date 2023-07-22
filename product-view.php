<?php
include 'dbconnect.php';
session_start();
$showError = false;
$showAlert = false;
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>E-Cart | Product Details</title>
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/product-view-flip.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php require 'navbar.php' ?>

    <?php
    if (!isset($_GET['id'])) {
        header("location: 404.php");
        die();
        // die;
    } else {
        // global $id;
        $id = $_GET['id'];
        $sql1 = "SELECT * FROM `product_item` WHERE `id`=$id;";
        $rs1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($rs1);
    ?>
        <form action="product-view.php" method="get">
            <?php require 'product-view-a.php'; ?>
        </form>
    <?php
    }
    ?>


    <?php
    $none = "'none'";
    if ($showError) {
        echo '<div class="alert error">
    <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
    <strong>Error! </strong>' . $showError . '</div> ';
    }
    if ($showAlert) {
        echo '<div class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Success! </strong>' . $showAlert . '</div> ';
    }
    ?>
    <?php
    include 'footer.php';
    ?>
</body>
<script>
    $(function() {
        $(".heart").on("click", function() {
            $(this).toggleClass("is-active");
        });
    });

    function myFunction(smallImg) {
        var fullImg = document.getElementById("imageBox");
        fullImg.src = smallImg.src;
    }

    // $(".size-buttons-tipAndBtnContainer").click(function() {
    //     $('.size-buttons-size-button-selected').removeClass('size-buttons-size-button-selected');
    //     $(this).find(".size-buttons-size-button").addClass("size-buttons-size-button-selected");
    // });

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

    var a = 0;
    const radio = document.querySelectorAll('input[name="size"]');

    function checkRadio() {
        for (var i = 0; i < radio.length; i++) {
            if (radio[i].checked) {
                a = 1;
                break;
            }
        }
        if (a == 0) {
            alert('Size not Selected');
        }
    }


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
</script>

</html>