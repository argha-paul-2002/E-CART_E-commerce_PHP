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
?>


<html>

<head>

    <title>E-Cart | My profile</title>
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
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
                        <span class="heading-txt-right">Select Order Address</span>
                        <div>
                            <button class="collapsible-c" onclick="location.href = 'profile.php';">ADD OR MODIFY ADDRESSS</button>
                            <div class="content-c">
                            </div>
                        </div>
                        <form action="payment_method.php">
                            <div class="saved-address">

                                <?php
                                $sql = "SELECT * FROM `address` WHERE `u_id`=$u_id;";
                                $rs = mysqli_query($conn, $sql);
                                $row3 = mysqli_num_rows($rs);
                                if ($row3 > 0) {
                                    while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                        <label class="container">
                                            <input type="radio" name="a_id" id="address" class="radio address" value="<?php echo $row['id']; ?>" required>
                                            <div class="address-s">
                                                <div class="collapsible-s">
                                                    <div>
                                                        <div style=" font-size: 18px;font-weight: bold;">
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
                                <?php
                                    }
                                } else {
                                    // echo "<h1>No Saved Address</h1>";
                                    echo '<img src="images/cart/no-data.jpg" alt="No Data Found" style="width:50%;height:50%">';
                                }
                                ?>

                            </div>
                            <input type="submit" id="save-btn" class="input-style-css submit-btn-style extra" value="CONTINUE">
                        </form>
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
    $("#save-btn").on('click', function(event) {
        if (!$('.address').is(':checked')) {
            alert("Address Is not Selected :( ");
        } 
    });
</script>

</html>