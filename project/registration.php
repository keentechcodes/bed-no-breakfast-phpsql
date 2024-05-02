<?php

require_once "function.php";
/*
 *
 * */
session_start();
$msg = "";
$database = new database();
if (isset($_POST['firstname'])) $firstname = $_POST['firstname'];
if (isset($_POST['lastname'])) $lastname = $_POST['lastname'];
if (isset($_POST['phonenumber'])) $phonenumber = $_POST['phonenumber'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['password'])) $password = $_POST['password'];
if (isset($_POST['confirmpassword'])) $confirmpassword = $_POST['confirmpassword'];

if (isset($firstname) && isset($lastname) && isset($phonenumber) && isset($email) && isset($password) && isset($confirmpassword)) {
    if (!empty($firstname) && !empty($lastname) && !empty($phonenumber) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
        /*
         * validate
         * */
        if($password <> $confirmpassword) {
            $msg = "Please confirm correct password";
        }
        else {

            $result = $database->insert_user_row($firstname, $lastname, $phonenumber, $email, $password, 1);
            var_dump($result);
            if (!$result) {
                $msg = "Registeration failed. Please try again.";
            } else {
                header("Location: " . BASE_URL . "registercomplete.php");
            }
        }
    }

}


?>

<html>
<link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="loginCSS.css" rel="stylesheet" type="text/css">
<?php
if ($msg) {
    ?>
    <div class="alert alert-danger"><strong>ERROR!</strong><?php echo $msg; ?></div>
    <?php
}

?>

<h2>Bed no Breakfast</h2>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h1>Create Account</h1>
            <div class="social-container">
            </div>
            <input type="text" placeholder="First Name" name="firstname" required/>
            <input type="text" placeholder="Last Name" name="lastname" required/>
            <input type="email" placeholder="Email" name="email" required/>
            <input type="text" placeholder="Phone Number" name="phonenumber" required/>
            <input type="password" placeholder="Password" name="password" required/>
            <input type="password" placeholder="Confirm Password" name="confirmpassword" required/>
            <button type="submit">Register</button>
        </form>
    </div>
    <form action="login.php" method="post">
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Log in</button>
                </div>
            </div>
        </div>
    </form>
</div>

<footer>
    <p>
        LBYCPG2 Project <i class="fa fa-heart"></i> by
        <a target="_blank" href="https://www.facebook.com/keenan.mayuga">Keenan Mayuga</a>
        and
        <a target="_blank" href="https://www.facebook.com/dainejadman.1/">Daine Jadman</a>.
    </p>
</footer>
</html>