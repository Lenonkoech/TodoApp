<?php
session_start();
include "./../components/db.php";
include "./../components/notifications.php";
$username = '';
$password = '';
$email = '';


if (isset($_POST['reg-user'])) {
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    //form validation protocols
    if (empty($username)) {
        addNotification("Username required !!!");
    }
    if (empty($email)) {
        addNotification("Email required !!!");
    }
    if (empty($password)) {
        addNotification("Password required !!!");
    }
    //uploading to database
    $user_check_query = "SELECT * From users Where username ='$username' or Email ='$email' Limit 1";//check if username or email alread exist
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { //if username exists
        if ($user['username'] === $username) {
            addNotification("Username already exists !!!");
        }
        if ($user['Email'] === $email) {
            addNotification("Email already !!!");
        }
    } else {
        $password_1 = md5($password);//encrypt password
        $query = "INSERT into users (Username,Email,Password)
    values('$username','$email','$password_1')";
        mysqli_query($conn, $query);
        $userId = $conn->insert_id;
        $_SESSION['UserId'] = $userId;
        $_SESSION['sucess'] = 'Account creation sucess';
        header('location:./../index.php');
    }
}



if (isset($_POST['login-user'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    //field validation controls
    if (empty($username)) {
        addNotification("Username required !!!");
    }
    if (empty($password)) {
        addNotification("Password required !!!");
    }
    //Loging in a user
    else {
        $password_1 = md5($password);
        $query = "SELECT *From users where username='$username' and password ='$password_1'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $userId = $row['id'];
            $_SESSION['UserId'] = $userId;
            $_SESSION['sucess'] = "You are now logged in";
            header('location: ./../index.php');
        } else {
            addNotification("Wrong username or password !!!");
        }
    }
}