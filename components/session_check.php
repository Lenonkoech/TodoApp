<?php
//checks if user is in session or not
if (!isset($_SESSION['Username'])) {
    $_SESSION['msg'] = "LOG in to Account";
    header("location: ./Users/login.php");
}
