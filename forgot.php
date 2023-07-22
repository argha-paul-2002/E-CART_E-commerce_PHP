<?php
session_start();
$showAlert = false;
$showError = false;
$userAlert = false;
include('dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $umail = $_POST["umail"];
    $unumber = $_POST["unumber"];
    if ($umail == NULL) {
        $userAlert = true;
    } else {
        // Check whether this username exists
        $existSql = "SELECT * FROM `users` WHERE `email`='$umail' AND `phone_no`='$unumber';";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            // $exists = true;
            $sql = "INSERT INTO `forgot_password` (`email`) VALUES ('$umail');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            // $exists = false; 
            // $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $showError = "Username Not Exists";
        }
    }
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Cart | LogIn</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    
    <?php
    $none = "'none'";
    if ($showError) {
        echo '<div class="alert error">
     <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
     <strong>Error! </strong>' . $showError . ' </div>';
    }
    if ($showAlert) {
        echo '<div class="alert success">
     <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
     <strong>Success! </strong> Recovery mail will be sent to your registered mail id.
 </div> ';
    }
    if ($userAlert) {
        echo '<div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Error! </strong>Please enter values correctly.
    </div>';
    }
    ?>

    <div id="myModal" class="modal" style="display:block;">
        <!--   ********************* ************ **** Modal content **** ************** *********************-->
        <div class="modal-content">
            <!-- right-panel-active -->
            <div class="container " id="container">

                <div class="form-container sign-in-container">
                    <form action="forgot.php" method="post">
                        <h1>Forgot your password?</h1>
                        <div class="social-container">
                            <a href="#"><img src="images/logo/favicon.png" alt="" style="width: 20%;"></a>
                        </div>
                        <input type="email" placeholder="Email" name="umail" title="Email" required />
                        <input type="text" name="unumber" placeholder="Phone Number" id="add-number" title="Phone Number" class="input-style-css-add" onKeyPress="if(this.value.length==10) return false;" pattern="(6|7|8|9)\d{9}" minlength="10" maxlength="10" required>
                        <p>We will send a recovery password link through your email.</p>
                        <button class="active-color buttons">Submit</button>
                        <a href="signup.php"><span class="buttons notactive-color">Sign Up</span></a>
                        <a href="login.php"><span class="buttons notactive-color">Log In</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>