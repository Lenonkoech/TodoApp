<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../Assets/css/main.css">
    <!--
    - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <?php include "./../components/notifications.php" ?>

    <?php
    //code to process admin login
    class Login
    {
        function processLogin()
        {
            include "./../components/db.php";
            $username = "";
            $password = "";
            if (isset($_POST['admin-login'])) {
                $username = $_POST['Username'];
                $password = $_POST['Password'];
                $password_E = md5($password);
                $sql = "SELECT *FROM admin where `username`='$username' AND `password`='$password_E'";
                $result = mysqli_query($conn, $sql);
                $admin = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $adminId = $row['id'];
                    }
                    $_SESSION['Username'] = $username;
                    $_SESSION['sucess'] = 'Sucessfull login';
                    header('location: dashboard.php');
                } else {
                    addNotification('Wrong username or password');
                }
            }
        }
    }
    $adminLogin = new Login();
    $adminLogin->processLogin();//access the method processLogin of class login
    ?>
</head>

<body>
    <div id="notifications"></div>
    <style>
        #notifications {
            background-color: #e472c9;
            color: white;
            position: absolute;
            max-height: 30px;
            width: max-content;
            border-radius: 3px;
            margin-top: -25%;
            z-index: 999;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px;
            display: none;
            text-transform: capitalize;
            font-weight: 700;
        }
    </style>
    <div class="form-container">
        <header>
            <ion-icon name="settings" aria-label="Favorite">
            </ion-icon>
            <h2>To-do-App</h2>
            </a>
        </header>
        <main>
            username :admin password :1234
            <div class="login-form login ">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="Username" id="" placeholder='Enter Username' required>
                    <input type="password" name="Password" id="" placeholder='Enter Password' required>
                    <button type="submit" name='admin-login'>Login</button>
                </form>

            </div>
        </main>
    </div>
    <script>
        //make notification disapper after 2 secs
        document.addEventListener("DOMContentLoaded", function () {
            var notificationDiv = document.getElementById("notifications");
            notificationDiv.style.display = 'flex'; // Display the div

            // Set timeout to hide the div after 5 seconds
            setTimeout(function () {
                notificationDiv.style.display = 'none'; // Hide the div
            }, 3000); // 5000 milliseconds = 5 seconds
        });</script>
    <!--
      - ion-icon link
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>