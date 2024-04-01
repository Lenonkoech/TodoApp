<?php
session_start();
include "./../components/db.php";
include "./../components/notifications.php";
if (isset($_POST['deleteTask'])) {
    $task_id = $_POST['task'];
    $sql = "DELETE FROM tasks where id= '$task_id' ";
    mysqli_query($conn, $sql);
    addNotification("Task deleted !!!");
    header("location:dashboard.php");
}