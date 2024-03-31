<!DOCTYPE html>
<html>
<?php
// @session_start();
include "server.php";
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

    <?php //include "./../components/notifications.php"            ?>
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
            <div class="login-form login ">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="Username" id="" placeholder='Enter Username' required>
                    <input type="password" name="Password" id="" placeholder='Enter Password' required>
                    <button type="submit" name='login-user'>Login</button>
                </form>
                <p class="footer">Don't have an account? <a href="sign-up.php" id='signup-link'>Sign Up</a></p>
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