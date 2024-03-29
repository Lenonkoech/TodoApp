<?php
$errors = array();
session_start();
include "db.php";
if (isset($_POST['addCategory'])) {
    $category = $_POST['category'];
    $sql = "INSERT into categories (`category`) 
    values('$category')";
    mysqli_query($conn, $sql);
    addNotification("Category added !!!");
    header("location:../index.php");
}