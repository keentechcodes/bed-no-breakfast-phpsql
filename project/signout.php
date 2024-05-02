<?php

require_once "function.php";
session_start();
$database = new database();
session_destroy();
header("Location: " . BASE_URL . "login.php");


