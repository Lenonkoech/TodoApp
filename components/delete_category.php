<?php
session_start();
include "db.php";
include "notifications.php";
if (isset($_SESSION['userId'])) {
    $userState = $_SESSION['userId'];
}
if (isset($_POST['deleteCategory'])) {
    $category_id = $_POST['category'];
    $sql = "DELETE FROM categories where id= '$category_id'";
    mysqli_query($conn, $sql);
    addNotification("Category deleted !!!");
}