<!--Code for user to add tasks to the database-->
<?php
session_start();
include "db.php";
include "notifications.php";
if (isset($_POST['add-task'])) {
    $description = $_POST['description'];
    $category = $_POST['category'];
    $user = $_SESSION['Username'];
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];
    $status = $_POST['status'];
    $sql = "INSERT into tasks (`user_id`,`start_date`,`end_date`,`description`,`category`,`status`) 
    values('$user','$start_date','$end_date','$description','$category','$status')";
    mysqli_query($conn, $sql);
    addNotification("Task added !!!");
    if (!isset($_SESSION['Username'])) {
        $_SESSION['msg'] = "LOG in to Account";
        header("location: ./../../Users/login.php");
    } else {
        header("location:../index.php");
    }
}