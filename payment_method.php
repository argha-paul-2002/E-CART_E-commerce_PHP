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
if(!isset($_GET['a_id'])){
    header("location: form/wrong.php");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/payment_method.css">
</head>

<body style="white-space: nowrap;">

<?php //require 'navbar.php' ?>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'credit')" id="defaultOpen">
            <img src="images/icons/credit-card.png" alt="Credit Card">
            <span class="dis-txt">Credit Card</span>
        </button>
        <button class="tablinks" onclick="openCity(event, 'debit')">
            <img src="images/icons/debit-card.png" alt="Debit Card">
            <span class="dis-txt">Debit Card</span>
        </button>
        <button class="tablinks" onclick="openCity(event, 'cash')">
            <img src="images/icons/cod.png" alt="Cash on Delivery">
            <span class="dis-txt">Cash on Delivery</span>
        </button>
    </div>

    <div id="credit" class="tabcontent" style="display:contents">
        <?php include 'form/card_form.php'; ?>
    </div>

    <div id="debit" class="tabcontent">
        <?php include 'form/card_form.php'; ?>
    </div>

    <div id="cash" class="tabcontent">
        <form action="checkout.php">
            <input type="hidden" name="a_id" value="<?php echo $_GET['a_id']; ?>">
            <?php include 'form/cod_form.php'; ?>
        </form>
    </div>

</body>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "contents";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    $("#save-btn").on('click', function(event) {
        if (!$('#method').is(':checked')) {
            alert("Payment Method Is not Selected :( ");
        }
    });
</script>

</html>