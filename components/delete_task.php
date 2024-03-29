<?php
session_start();
include "db.php";
include "notifications.php";
if (isset($_POST['deleteTask'])) {
    $task_id = $_POST['task'];
    $sql = "DELETE FROM tasks where id= '$task_id'";
    mysqli_query($conn, $sql);
    addNotification("Task deleted !!!");
    header("location:../index.php");
}