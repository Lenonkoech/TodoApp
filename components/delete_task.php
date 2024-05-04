<?php
session_start();
class Task
{
    public function task()
    {
        include "db.php";
        include "notifications.php";
        if (isset($_SESSION['userId'])) {
            $userState = $_SESSION['userId'];
        }
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $task = $_POST['taskStatus'];
            echo $task;
            $sql = "UPDATE  tasks SET Status ='complete' where id='$task'";
            $result = $conn->query($sql);
            addNotification("Status changed");
            header("location:../index.php");
        }
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $task_id = $_POST['task'];
            $sqli = "DELETE FROM tasks where `tasks`.`id`= $task_id ";
            echo $task_id;
            $result = $conn->query($sqli);
            // addNotification("Task Deleted !!!");
            header("location:../index.php");
        }
    }
}
$Task = new Task();
$Task->task();
