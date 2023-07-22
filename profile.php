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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>


<body>
    <?php require 'navbar.php' ?>
    <div class="_full-outer">
        <div class="content row">
            <div class="left-sec-full">
                <div>
                    <div class="option-content">
                        <div class="profile row"><img class="profile-img" height="50px" width="50px" src="images/profile/profile-n.png">
                            <div class="pro-info">
                                <div class="pro-hello">Hello,</div>
                                <div class="user-name"><span><?php echo $row7['first_name']; ?></span>&nbsp;<span><?php echo $row7['last_name']; ?></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="option-content option-margin">
                        <div>
                            <div class="option-padding-bottom">
                                <div class="option-padding row">
                                    <img class="icon-images" src="images/profile/order.png">
                                    <a class="heading-txt" href="orders.php">MY ORDERS<span class="arrow-symbol"><svg width="16" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="arrow-symbol-s">
                                                <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787" class=""></path>
                                            </svg></span></a>
                                </div>
                            </div>
                            <div class="hr-line"></div>
                        </div>
                        <div>
                            <div class="option-padding-bottom">
                                <div class="option-padding row"><img class="icon-images" src="images/profile/user.png">
                                    <div class="heading-two">ACCOUNT</div>
                                </div>
                                <div>
                                    <div id="defaultOpen" class="cursor-pointer tablinks" onclick="openCity(event, 'Profile')">
                                        <div class="sub-heading-txt">Profile Information</div>
                                    </div>
                                    <div class="cursor-pointer tablinks" onclick="openCity(event, 'Address')">
                                        <div class="sub-heading-txt">Manage Addresses</div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line"></div>
                        </div>

                        <div>
                            <a href="wishlist.php">
                                <div class="option-padding-bottom cursor-pointer">
                                    <div class="option-padding row"><img class="icon-images" src="images/profile/heart.png">
                                        <div class="heading-two">MY WISHLIST</div>
                                    </div>
                                </div>
                            </a>
                            <div class="hr-line"></div>
                        </div>
                        <div class="hr-line"></div>
                        <div>
                            <a href="logout.php">
                                <div class="option-padding-bottom cursor-pointer">
                                    <div class="option-padding row"><img class="icon-images" src="images/profile/log-out.png">
                                        <div class="heading-two">LOG OUT</div>
                                    </div>
                                </div>
                            </a>
                            <div class="hr-line"></div>
                        </div>
                    </div>
                    <div class="option-content padding-lower">
                        <div>Toll-free number: <span style="color:blue">1800012154</span></div>
                    </div>
                </div>
            </div>
            <div class="right-sec-full">
                <div class="alert-result">

                </div>
                <div class="right-content">
                    <div id="Profile" class="pro-info  tabcontent">
                        <div class="right-heading">
                            <span class="heading-txt-right">Personal Information</span>
                            <span class="edit-style" onclick="myFunctionE1()" id="edit-1">Edit</span>
                            <span class="edit-style" onclick="myFunctionCancel1()" id="cancel-1" style="display:none;">Cancel</span>
                        </div>
                        <form class="change_profile" id="change_name">
                            <div class="personal-info-sec">
                                <div class="flex">
                                    <div class="name">
                                        <p>First Name</p>
                                        <input type="text" name="f_name" value="<?php echo $row7['first_name']; ?>" id="f_name" class="input-style-css" disabled required>
                                    </div>
                                    <div class="name">
                                        <p>Last Name</p>
                                        <input type="text" name="l_name" value="<?php echo $row7['last_name']; ?>" id="l_name" class="input-style-css" disabled required>
                                    </div>
                                    <div>
                                        <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                    </div>
                                    <div class="name submit-btn">
                                        <input id="save-btn" type="button" class="input-style-css submit-btn-style" hidden value="SAVE">
                                    </div>
                                </div>
                                <!-- <div class="select-gender">
                                    <p>Your Gender</p>
                                    <div class="flex">
                                        <div class="radio-btns">
                                            <span>Male</span>
                                            <input type="radio" name="gender" value="male" id="male" disabled required checked>
                                        </div>
                                        <div class="radio-btns">
                                            <span>Female</span>
                                            <input type="radio" name="gender" value="female" id="female" disabled required>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </form>

                        <form class="change_profile" id="change_email">
                            <div class="email-p">
                                <div class="right-heading">
                                    <span class="heading-txt-right">Email Address</span>
                                    <!-- <span class="edit-style" onclick="myFunctionE2()" id="edit-2">Edit</span>
                                    <span class="edit-style" onclick="myFunctionCancel2()" id="cancel-2" style="display:none;">Cancel</span> -->
                                </div>
                                <div class="flex">
                                    <div class="name">
                                        <p>Email Address</p>
                                        <input type="text" name="u-mail" value="<?php echo $row7['email']; ?>" id="u-mail" class="input-style-css" disabled required>
                                    </div>
                                    <div>
                                        <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                    </div>
                                    <div class="name submit-btn">
                                        <input id="save-btn-2" type="button" value="SAVE" class="input-style-css submit-btn-style" hidden>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="change_profile" id="change_phone">
                            <div class="phone">
                                <div class="right-heading">
                                    <span class="heading-txt-right">Mobile Number</span>
                                    <!-- <span class="edit-style" onclick="myFunctionE3()" id="edit-3">Edit</span>
                                    <span class="edit-style" onclick="myFunctionCancel3()" id="cancel-3" style="display:none;">Cancel</span> -->
                                </div>
                                <div class="flex">
                                    <div class="name">
                                        <p>Phone Number</p>
                                        <input type="text" name="u-phone" value="<?php echo $row7['phone_no']; ?>" id="u-phone" class="input-style-css" title="Please Enter valid Phone Number" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" disabled required>
                                    </div>
                                    <div>
                                        <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                    </div>
                                    <div class="name submit-btn">
                                        <input id="save-btn-3" type="button" class="input-style-css submit-btn-style" hidden>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="Address" class="pro-address tabcontent">
                        <span class="heading-txt-right">Manage Address</span>
                        <div>
                            <button class="collapsible-c">ADD A NEW ADDRESSS</button>
                            <div class="content-c">
                                <form id="add_new_address">
                                    <div class="form-width">
                                        <div class="right-heading">
                                            <span class="heading-txt-right">Manage Address</span>
                                            <!-- <span class="edit-style" onclick="myFunctionE4()" id="edit-4">Edit</span>
                                            <span class="edit-style" onclick="myFunctionCancel4()" id="cancel-4" style="display:none;">Cancel</span> -->
                                        </div>

                                        <div class="form-inner-flex">
                                            <div class="name">
                                                <p>Name</p>
                                                <input type="text" name="add_name" placeholder="Name" id="add-first-name" class="input-style-css-add" required>
                                            </div>
                                        </div>
                                        <div class="form-inner-flex">
                                            <div class="name">
                                                <p>Pincode</p>
                                                <input type="number" name="add_pin" placeholder="Pincode" id="add-pin" class="input-style-css-add" required>
                                            </div>
                                            <div class="name">
                                                <p>Locality</p>
                                                <input type="text" name="add_locality" placeholder="Locality" id="add-locality" class="input-style-css-add" required>
                                            </div>
                                        </div>
                                        <div class="form-inner-flex">
                                            <div class="name">
                                                <p>Mobile Number</p>
                                                <input type="number" name="add_number" placeholder="Phone Number" id="add-number" class="input-style-css-add no" title="Please Enter valid Phone Number" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="name" style="margin: 0 0px 20px 0px;">
                                            <p><label for="add-detailed">Address</label></p>
                                            <textarea id="add-detailed" name="add_detailed" rows="6" cols="50" class="textarea-style"placeholder="Address"></textarea>
                                        </div>
                                        <div class="form-inner-flex">
                                            <div class="name">
                                                <p>city</p>
                                                <input type="text" name="add_city" placeholder="City" id="add-city" class="input-style-css-add" required>
                                            </div>
                                            <div class="name">
                                                <p>State</p>
                                                <select id="add-state" name="add_state" name="select" class="input-style-css-add" onclick="selectDesableOp()" required>
                                                    <!-- <option id="op-s">--Select State--</option> -->
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                    </option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Ladakh">Ladakh</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal" selected>West Bengal</option>
                                                </select>
                                            </div>
                                            <div class="name">
                                                <p>District</p>
                                                <input type="text" name="add_dist" placeholder="District" id="add_dist" class="input-style-css-add" required>
                                            </div>
                                        </div>
                                        <!-- <div class="Address type">
                                            <p>Your Address Type</p>
                                            <div class="flex">
                                                <div class="radio-btns"><span>Home</span><input type="radio" name="add-type" id="add-type-home" disabled required>
                                                </div>
                                                <div class="radio-btns">
                                                    <span>Work</span>
                                                    <input type="radio" name="add-type" id="add-type-work" disabled required>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div>
                                            <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                        </div>

                                        <div class="name ">
                                            <input type="button" id="add_new_address_submit" class="input-style-css submit-btn-style form-submit" value="SAVE">
                                        </div>
                                        <div class="name submit-btn"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="saved-address">

                            <?php
                            $sql = "SELECT * FROM `address` WHERE `u_id`=$u_id;";
                            $rs = mysqli_query($conn, $sql);
                            $row3 = mysqli_num_rows($rs);
                            if ($row3 > 0) {
                                while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                    <div class="address-s">
                                        <div style="float:right">
                                            <!-- <input type="button" class="delete-btn" value="Delete"> -->
                                            <button class="delete-btn delete_address" id="delete_address">
                                                <input type="hidden" id="address_id" class="address_id" value="<?php echo $row['id']; ?>">
                                                <img src="images/wishlist/trash.png" alt="Delete">
                                            </button>

                                        </div>
                                        <div class="collapsible-s">
                                            <div>
                                                <div style="    font-size: 18px;font-weight: bold;">
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
                                        <div class="content-s">
                                            <form id="update_address" class="update_address">
                                                <div class="form-width">
                                                    <div class="right-heading">
                                                        <span class="heading-txt-right">Edit Address</span>
                                                        <!-- <span class="edit-style" onclick="myFunctionE4()" id="edit-4">Edit</span>
                                                <span class="edit-style" onclick="myFunctionCancel4()" id="cancel-4" style="display:none;">Cancel</span> -->
                                                    </div>

                                                    <div class="form-inner-flex">
                                                        <div class="name">
                                                            <p>Name</p>
                                                            <input type="text" name="add_name" value="<?php echo $row['name']; ?>" class="input-style-css-add add_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-inner-flex">
                                                        <div class="name">
                                                            <p>Pincode</p>
                                                            <input type="number" name="add_pin" value="<?php echo $row['pincode']; ?>" class="input-style-css-add add_pin" required>
                                                        </div>
                                                        <div class="name">
                                                            <p>Locality</p>
                                                            <input type="text" name="add_locality" value="<?php echo $row['locality']; ?>" class="input-style-css-add add_locality" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-inner-flex">
                                                        <div class="name">
                                                            <p>Mobile Number</p>
                                                            <input type="number" name="add_number" value="<?php echo $row['ph_no']; ?>" class="input-style-css-add add_number" title="Please Enter valid Phone Number" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" required>
                                                        </div>
                                                    </div>
                                                    <div class="name" style="margin: 0 0px 20px 0px;">
                                                        <p><label for="add_detailed">Address</label></p>
                                                        <textarea name="add_detailed" rows="6" cols="50" class="textarea-style add_detailed" required><?php echo $row['full_address']; ?></textarea>
                                                    </div>
                                                    <div class="form-inner-flex">
                                                        <div class="name">
                                                            <p>city</p>
                                                            <input type="text" name="add_city" value="<?php echo $row['city']; ?>" class="input-style-css-add add_city" required>
                                                        </div>
                                                        <div class="name">
                                                            <p>District</p>
                                                            <input type="text" name="add_dist" value="<?php echo $row['district']; ?>" class="input-style-css-add add_dist" required>
                                                        </div>
                                                        <div class="name">
                                                            <p>State</p>
                                                            <select name="add_state" name="select" class="input-style-css-add add_state" onclick="selectDesableOp()" required>
                                                                <option value="<?php echo $row['state']; ?>" selected><?php echo $row['state']; ?></option>
                                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                <option value="Assam">Assam</option>
                                                                <option value="Bihar">Bihar</option>
                                                                <option value="Chandigarh">Chandigarh</option>
                                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                                <option value="Daman and Diu">Daman and Diu</option>
                                                                <option value="Delhi">Delhi</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Gujarat">Gujarat</option>
                                                                <option value="Haryana">Haryana</option>
                                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                                <option value="Jharkhand">Jharkhand</option>
                                                                <option value="Karnataka">Karnataka</option>
                                                                <option value="Kerala">Kerala</option>
                                                                <option value="Ladakh">Ladakh</option>
                                                                <option value="Lakshadweep">Lakshadweep</option>
                                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Manipur">Manipur</option>
                                                                <option value="Meghalaya">Meghalaya</option>
                                                                <option value="Mizoram">Mizoram</option>
                                                                <option value="Nagaland">Nagaland</option>
                                                                <option value="Odisha">Odisha</option>
                                                                <option value="Puducherry">Puducherry</option>
                                                                <option value="Punjab">Punjab</option>
                                                                <option value="Rajasthan">Rajasthan</option>
                                                                <option value="Sikkim">Sikkim</option>
                                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                                <option value="Telangana">Telangana</option>
                                                                <option value="Tripura">Tripura</option>
                                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                <option value="Uttarakhand">Uttarakhand</option>
                                                                <option value="West Bengal">West Bengal</option>
                                                            </select>
                                                        </div>


                                                        <div>
                                                            <input type="hidden" name="id" value="<?php echo $u_id ?>">
                                                            <input type="hidden" name="address_id" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="name submit-btn">
                                                        <input type="button" value="SAVE" id="update_address_submit" class="input-style-css submit-btn-style form-submit update_address_submit">
                                                    </div>
                                                    <div class="name submit-btn"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                // echo "<h1>No Saved Address</h1>";
                                echo '<img src="images/cart/no-data.jpg" alt="No Data Found" style="width:50%;height:50%">';
                            }
                            ?>

                        </div>

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
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function selectDesableOp() {
        document.getElementById("op-s").disabled = true;
    }

    function myFunctionE1() {
        document.getElementById("f_name").disabled = false;
        document.getElementById("l_name").disabled = false;

        document.getElementById("save-btn").hidden = false;
        document.getElementById("edit-1").style.display = "none";
        document.getElementById("cancel-1").style.display = "inline-block";
    }

    function myFunctionCancel1() {
        document.getElementById("f_name").disabled = true;
        document.getElementById("l_name").disabled = true;
        document.getElementById("save-btn").hidden = true;
        document.getElementById("edit-1").style.display = "inline-block";
        document.getElementById("cancel-1").style.display = "none";
    }

    function myFunctionE2() {
        document.getElementById("u-mail").disabled = false;
        document.getElementById("save-btn-2").hidden = false;
        document.getElementById("edit-2").style.display = "none";
        document.getElementById("cancel-2").style.display = "inline-block";
    }

    function myFunctionCancel2() {
        document.getElementById("u-mail").disabled = true;
        document.getElementById("save-btn-2").hidden = true;
        document.getElementById("edit-2").style.display = "inline-block";
        document.getElementById("cancel-2").style.display = "none";
    }

    function myFunctionE3() {
        document.getElementById("u-phone").disabled = false;
        document.getElementById("save-btn-3").hidden = false;
        document.getElementById("edit-3").style.display = "none";
        document.getElementById("cancel-3").style.display = "inline-block";
    }

    function myFunctionCancel3() {
        document.getElementById("u-phone").disabled = true;
        document.getElementById("save-btn-3").hidden = true;
        document.getElementById("edit-3").style.display = "inline-block";
        document.getElementById("cancel-3").style.display = "none";
    }



    // ***************************************************FOR PERSONAL DATA UPDATE START*****************************************
    // For Personal Information

    $("#save-btn").on('click', function(event) {
        if (!$('#f_name').val()) {
            alert("You need to fill out First Name");
        } else if (!$('#l_name').val()) {
            alert("You need to fill out Last Name");
        } else {
            var form = $("#change_name");
            // var url = form.attr('action');
            $.ajax({
                method: "POST",
                url: 'form/personal_info_update.php',
                data: form.serialize(),
                success: function(data) {

                    // Ajax call completed successfully
                    // alert("Form Submited Successfully");
                    $('.alert-result').html(data);
                    alert('SUCCESS! Name Saved Successfully');
                    // location.reload();
                },
                error: function(data) {

                    // Some error in ajax call
                    // $('.alert-result').html(data);
                    alert("some Error")
                }
            });
        }
    });

    //For Email Address

    // $("#save-btn-2").on('click', function(event) {
    //     if (!$('#u-mail').val()) {
    //         alert("You need to fill out Email");
    //     } else {
    //         var form = $("#change_email");
    //         // var url = form.attr('action');
    //         $.ajax({
    //             method: "POST",
    //             url: 'form/email_update.php',
    //             data: form.serialize(),
    //             success: function(data) {

    //                 // Ajax call completed successfully
    //                 // alert("Form Submited Successfully");
    //                 $('.alert-result').html(data);
    //                 alert('SUCCESS! Email Changed Successfully');
    //                 // location.reload();
    //             },
    //             error: function(data) {

    //                 // Some error in ajax call
    //                 // $('.alert-result').html(data);
    //                 alert("some Error")
    //             }
    //         });
    //     }
    // });

    //For Mobile Number

    // $("#save-btn-3").on('click', function(event) {
    //     if (!$('#u-phone').val()) {
    //         alert("You need to fill out First Name");
    //     } else {
    //         var form = $("#change_name");
    //         // var url = form.attr('action');
    //         $.ajax({
    //             method: "POST",
    //             url: 'form/personal_info_update.php',
    //             data: form.serialize(),
    //             success: function(data) {

    //                 // Ajax call completed successfully
    //                 // alert("Form Submited Successfully");
    //                 $('.alert-result').html(data);
    //                 alert('SUCCESS! Address Saved');
    //                 // location.reload();
    //             },
    //             error: function(data) {

    //                 // Some error in ajax call
    //                 // $('.alert-result').html(data);
    //                 alert("some Error")
    //             }
    //         });
    //     }
    // });
    // ***************************************************FOR PERSONAL DATA UPDATE END*****************************************

    document.getElementById("defaultOpen").click();

    function checkLength(el) {
        if (el.value.length != 6) {
            alert("length must be exactly 6 characters")
        }
    }

    $(document).ready(function() {
        $("submit-btn").click(function() {
            location.reload(true);
        });
    });
    /**********************************************FETCH ALL ADDRESSES************************** */
    // $(document).ready(function() {
    //     get_address();

    //     function get_address() {
    //         var user_id = '<?php //echo $u_id 
                                ?>';
    //         $.ajax({
    //             url: "form/load_address.php",
    //             method: "POST",
    //             data: {
    //                 user_id: user_id
    //             },
    //             success: function(data) {
    //                 // $('.saved-address').html(data);
    //             }
    //         });
    //     }
    // });

    var coll = document.getElementsByClassName("collapsible-c");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active-c");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";

            }
        });
    }

    var coll_s = document.getElementsByClassName("collapsible-s");
    for (i = 0; i < coll_s.length; i++) {
        coll_s[i].addEventListener("click", function() {
            this.classList.toggle("active-s");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                // content.style.maxHeight = auto;
            }
        });
    }



    // Add Address Form Section**************************************************
    /* stop form from submitting normally */
    // event.preventDefault();
    // $('#submit').on('click',
    $("#add_new_address_submit").on('click', function(event) {
        if (!$('#add-first-name').val()) {
            alert("You need to fill out Name");
        } else if (!$('#add-pin').val()) {
            alert("You need to fill out PIN Code");
        } else if (!$('#add-locality').val()) {
            alert("You need to fill out Locality");
        } else if (!$('#add-number').val()) {
            alert("You need to fill out Phone Number");
        } else if (!$('#add-detailed').val()) {
            alert("You need to fill out Address");
        } else if (!$('#add-city').val()) {
            alert("You need to fill out City");
        } else if (!$('#add-state').val()) {
            alert("You need to fill out State");
        } else if (!$('#add_dist').val()) {
            alert("You need to fill out District");
        } else {
            var form = $("#add_new_address");
            // var url = form.attr('action');
            $.ajax({
                method: "POST",
                url: 'form/new_address.php',
                data: form.serialize(),
                success: function(data) {

                    // Ajax call completed successfully
                    // alert("Form Submited Successfully");
                    $('.alert-result').html(data);
                    alert('SUCCESS! Address Saved');
                    location.reload();
                },
                error: function(data) {

                    // Some error in ajax call
                    // $('.alert-result').html(data);
                    alert("some Error")
                }
            });
        }


    });
    // *******************************************************FORM VALIDATE*******************************************************





    /******************************************************Update Address *******************************************************/

    $(".update_address_submit").on('click', function(event) {

        if (!$(this).parent().parent().find(".add_name").val()) {
            alert("You need to fill out Name");
        } else if (!$(this).parent().parent().find(".add_pin").val()) {
            alert("You need to fill out a PIN Code");
        } else if (!$(this).parent().parent().find(".add_locality").val()) {
            alert("You need to fill out Locality");
        } else if (!$(this).parent().parent().find(".add_number").val()) {
            alert("You need to fill out a Mobile Number");
        } else if (!$(this).parent().parent().find(".add_detailed").val()) {
            alert("You need to fill out a Address");
        } else if (!$(this).parent().parent().find(".add_city").val()) {
            alert("You need to fill out a City");
        } else if (!$(this).parent().parent().find(".add_dist").val()) {
            alert("You need to fill out a District");
        } else if (!$(this).parent().parent().find(".add_state").val()) {
            alert("You need to fill out a State");
        } else {
            // var form = $("#update_address");
            var form = $(this).closest(".update_address");
            // var url = form.attr('action');
            $.ajax({
                method: "POST",
                url: 'form/address_update.php',
                data: form.serialize(),
                success: function(data) {

                    // Ajax call completed successfully
                    // alert("Form Submited Successfully");
                    $('.alert-result').html(data);
                    alert('SUCCESS! Address Updated Successfully');
                    location.reload();
                },
                error: function(data) {

                    // Some error in ajax call
                    alert("some Error")
                }
            });
        }

    });

    /******************************************************Delete Address *******************************************************/
    $(document).ready(function() {
        $(".delete_address").click(function() {
            if (confirm('Are you sure you want to Delete?')) {
                // Save it!

                var a_id = $(this).children(".address_id").val();
                removeItem(this);
                // $('.test_class').val();
                // $(".element-classname").text();
                // var url = form.attr('action');
                $.ajax({
                    method: "POST",
                    url: 'form/delete_address.php',
                    data: {
                        a_id: a_id
                    },
                    success: function(data) {

                        // Ajax call completed successfully
                        // alert("Form Submited Successfully");
                        $('.alert-result').html(data);
                        alert('SUCCESS! Deleted Successfully');

                    },
                    error: function(data) {

                        // Some error in ajax call
                        alert("some Error")
                    }
                });

            }

        });
    });

    function removeItem(item) {
        $($(item).closest(".address-s")).fadeOut(400, function() {
            $(this).remove();
        });
    }

    // $(".delete_address").click(function() {
    //     //make call to update backend, on successful response ->
    //     // will probably require a that = this workaround
    //     // removeItem(this);
    //     alert("HII");
    // });
    $('.change_profile').each(function() {
            $(this).data('serialized', $(this).serialize())
        })
        .on('change input', function() {
            $(this)
                .find('input:button')
                .attr('disabled', $(this).serialize() == $(this).data('serialized')).css('cursor', 'pointer');
        })
        .find('input:button')
        .attr('disabled', true).css('cursor', 'not-allowed');

    $('.update_address').each(function() {
            $(this).data('serialized', $(this).serialize())
        })
        .on('change input', function() {
            $(this)
                .find('input:button')
                .attr('disabled', $(this).serialize() == $(this).data('serialized')).css('cursor', 'pointer');
        })
        .find('input:button')
        .attr('disabled', true).css('cursor', 'not-allowed');
</script>

</html>