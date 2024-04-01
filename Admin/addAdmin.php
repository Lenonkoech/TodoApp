<?php
include "./../components/db.php";
class AddAdmin
{
    function addAdmin()
    {
        global $conn;
        if (isset($_POST['addAdmin'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST["email"];
            $password_E = md5($password);
            $query = "INSERT into admin (Name,username,Email,password) values('$name','$username','$email','$password_E')";
            mysqli_query($conn, $query);
        }
    }
}
$add = new AddAdmin();
$add->addAdmin();
