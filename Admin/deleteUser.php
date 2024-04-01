<?php
include "./../components/db.php";
class DeleteUser
{
    function delUserTasks()
    {
        if (isset($_POST['deleteuser'])) {
            global $conn;
            $userId = $_POST['user'];
            $query = "DELETE FROM tasks where user_id ='$userId'";
            mysqli_query($conn, $query);
        }
    }
    function delUser()
    {
        if (isset($_POST['deleteuser'])) {
            global $conn;
            $userId = $_POST['user'];
            $sql = "DELETE FROM users where id ='$userId'";
            mysqli_query($conn, $sql);
            header("location:dashboard.php");
        }
    }
}
$deleteUser = new DeleteUser();
$deleteUser->delUserTasks();
$deleteUser->delUser();