<!--Code for user to add tasks to the database-->
<?php
session_start();
class Add_task
{
    public function add_tasks()
    {
        if (isset($_SESSION['userId'])) {
            $userState = $_SESSION['userId'];
        }
        include "db.php";
        include "notifications.php";
        if (isset($_POST['add-task'])) {
            $description = $_POST['description'];
            $category = $_POST['category'];
            $user = $userState;
            $start_date = $_POST['start-date'];
            $end_date = $_POST['end-date'];
            $status = $_POST['status'];
            $sql = "INSERT into tasks (`user_id`,`start_date`,`end_date`,`description`,`category`,`status`) 
    values('$user','$start_date','$end_date','$description','$category','$status')";
            mysqli_query($conn, $sql);
            addNotification("Task added !!!");
            header("location:../index.php");
        }//end of if
    }//end of function
}//end of class
$addTask = new Add_task();
$addTask->add_tasks();