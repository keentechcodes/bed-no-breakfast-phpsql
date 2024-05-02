<?php
require_once "function.php";
/*
 *
 * */
session_start();
$msg = "";
$database = new database();
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['password'])) $password = $_POST['password'];
if (isset($email) && isset($password)) {
    if (!empty($email) && !empty($password)) {
        /*
         * validate
         * */
        $user = $database->get_user_row($email);
        if ($user) {
            if ($password == $user['password']) {
                $_SESSION['userid'] = $user['userid'];
                header("Location: " . BASE_URL . "home.php");
            } else {
                $msg = "Wrong password is entered. Please enter correct password.";
            }
        } else {
            $msg = "Wrong email is entered. Please enter correct email";
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Log in</h1>
            <div class="social-container">
            </div>
            <input type="email" placeholder="Email" name="email" required/>
            <input type="password" placeholder="Password" name="password" required/>
            <button type="submit">Log in</button>
        </form>
    </div>
    <form action="registration.php" method="post">
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Traveler!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button class="ghost" id="signUp">Register Now</button>
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