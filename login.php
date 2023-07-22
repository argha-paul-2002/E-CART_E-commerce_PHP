<?php

$loggedin = false;
$showError = false;
include('dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('dbconnect.php');
    $umail = $_POST["umail"];
    $password = $_POST["password"];

    if ($umail == NULL) {
        $showError = "Please Enter Right Username";
    } else if ($password == NULL) {
        $showError = "Please Enter correct password";
    } else {
        $sql = "SELECT * FROM `users` WHERE `email`='$umail';";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['name'];

                if ($password == $row['password']) {
                    // if(password_verify($password,$row['password'])){
                    $loggedin = true;
                    // session_start();
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['umail'] = $umail;
                    // echo "Log in Successfull";
                    header("location: indeex.php");
                } else {
                    $showError = "Please Enter Username and Password Correctly";
                }
            }
        } else {
            $showError = "Invalid Credentials";
        }
    }
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Cart | LogIn</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo/favicon.png">
</head>

<body>
    <!-- <div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
    </div> -->
    <?php
    $none = "'none'";
    if ($showError) {
        echo '<div class="alert error">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Error! </strong>' . $showError . '</div> ';
    }
    if ($loggedin) {
        echo '<div class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display=' . $none . ';">&times;</span>
        <strong>Success! </strong> You logged in Successfully.
    </div> ';
    }
    ?>

    <div id="myModal" class="modal" style="display:block;">
        <!--   ********************* ************ **** Modal content **** ************** *********************-->
        <div class="modal-content">
            <!-- right-panel-active -->
            <div class="container " id="container">

                <div class="form-container sign-in-container">
                    <form action="login.php" method="post">
                        <h1>Log In</h1>
                        <div class="social-container">
                            <a href="#"><img src="images/logo/favicon.png" alt="" style="width: 20%;"></a>
                        </div>
                        <input type="email" placeholder="Email" name="umail" title="Email" required />
                        <input type="password" placeholder="Password" name="password" title="Password" required />
                        <a href="forgot.php" id="forgot">Forgot your password?</a>
                        <button type="submit" class="active-color buttons">Log In</button>
                        <a href="signup.php"><span class="buttons notactive-color">Sign Up</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>