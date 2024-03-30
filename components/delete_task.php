<?php
session_start();
include "db.php";
include "notifications.php";
if (isset($_SESSION['userId'])) {
    $userState = $_SESSION['userId'];
}
if (isset($_POST['deleteTask'])) {
    $task_id = $_POST['task'];
    $sql = "DELETE FROM tasks where id= '$task_id' and user_id='$userState' ";
    mysqli_query($conn, $sql);
    addNotification("Task deleted !!!");
    header("location:../index.php");
}