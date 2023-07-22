<?php
session_start();
$showAlert = false;
$showError = false;
$userAlert = false;
include('dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('dbconnect.php');
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $umail = $_POST["umail"];
    $unumber = $_POST["unumber"];
    $password = $_POST["password"];
    if ($fname == NULL || $lname == NULL || $unumber == NULL || $umail == NULL) {
        $userAlert = true;
    } else if ($password == NULL) {
        $showError = "Please enter Password Correctly";
    } else {
        // Check whether this username exists
        $existSql = "SELECT * FROM `users` WHERE `email`='$umail';";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            // $exists = true;
            $showError = "Username Already Exists";
        } else {
            // $exists = false; 
            // $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `phone_no`, `date_created`) VALUES ('$fname', '$lname', '$umail', '$password', '$unumber',current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        }
    }
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Cart | SignUp</title>
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    
    <!-- <div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Error!</strong>Please enter values correctly.
    </div> -->
    <?php
    $none = "'none'";
    if ($userAlert) {
        echo '<div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Error! </strong>Please enter values correctly.
    </div>';
    }
    if ($showAlert) {
        echo '<div class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Success! </strong> Your account is now created and you can login.
    </div> ';
    }
    if ($showError) {
        echo '<div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Error! </strong>' . $showError . '</div> ';
    }
    ?>
    <div class="hello" style="width:100%;margin:auto;">
        <div id="myModal" class="modal" style="display:block;">
            <!--   ********************* ************ **** Modal content **** ************** *********************-->
            <div class="modal-content">
                <!-- right-panel-active -->
                <div class="container " id="container">

                    <div class="form-container sign-in-container">
                        <form action="signup.php" method="post">
                            <h1>Sign Up</h1>
                            <div class="social-container">
                                <a href="#"><img src="images/logo/favicon.png" alt="" style="width: 20%;"></a>
                            </div>
                            <input type="text" placeholder="First Name" title="First Name" name="fname" required />
                            <input type="text" placeholder=" Last Name" name="lname" title="Last Name" required />
                            <input type="email" placeholder="Email" name="umail" title="Email" required />
                            <input type="text" name="unumber" placeholder="Phone Number" id="add-number" title="Phone Number" class="input-style-css-add" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" required>
                            <input type="password" placeholder="Password" name="password" title="Password" required />
                            <button type="submit" class="active-color buttons">Sign Up</button>
                            <a href="login.php"><span class="buttons notactive-color">Log In</span></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>