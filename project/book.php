<?php

require_once "function.php";
session_start();
$database = new database();

if (!isLogin()) {
    header("Location: " . BASE_URL . "login.php");
}

if(isset($_GET['id']) && isset($_GET['check-in']) && isset($_GET['check-out']) && !is_null($_GET['id']) && !is_null($_GET['check-in']) && !is_null($_GET['check-out'])){
    $id = $_GET['id'];
    $check_in = $_GET['check-in'];
    $check_out = $_GET['check-out'];
    $user_id = $_SESSION['userid'];
    $result = $database->insert_order($id, $user_id, $check_in, $check_out);
    header("Location: " . BASE_URL . "home.php");
}
