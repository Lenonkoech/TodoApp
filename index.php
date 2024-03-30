<?php
session_start();
include_once 'components/session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <title>to-do-list</title>
</head>

<body>

    <!-- HTML div element to display notifications -->
    <div id="notifications"></div>
    <script>
        //make notification disapper after 2 secs
        document.addEventListener("DOMContentLoaded", function () {
            var notificationDiv = document.getElementById("notifications");
            notificationDiv.style.display = 'flex'; // Display the div

            // Set timeout to hide the div after 5 seconds
            setTimeout(function () {
                notificationDiv.style.display = 'none'; // Hide the div
            }, 5000); // 5000 milliseconds = 5 seconds
        });

    </script>
    <!-- Main wrapper for the calendar application -->
    <div class="wrapper">
        <div class="container-calendar">

            <div id="left">
                <h3 id="monthAndYear"></h3>
                <div class="button-container-calendar">
                    <button id="previous" onclick="previous()">
                        ❮ </button>
                    <button id="next" onclick="next()">
                        ❯
                    </button>
                </div>
                <table class="table-calendar" id="calendar" data-lang="en">
                    <thead id="thead-month"></thead>
                    <!-- Table body for displaying the calendar -->
                    <tbody id="calendar-body"></tbody>
                </table>
                <div class="footer-container-calendar">

                    <!-- Dropdowns to select a specific month and year -->
                    <select id="month" onchange="jump()" style="display: none;">

                    </select>
                    <!-- Dropdown to select a specific year -->
                    <select id="year" onchange="jump()" style="display: none;"></select>
                    <ul class="calendar-menu">
                        <li id="all-link"><ion-icon name="calendar-outline" aria-label="Favorite"></ion-icon>All</li>
                        <li id="pending-link"><ion-icon name="timer-outline" aria-label="Favorite"></ion-icon>Pending
                        </li>
                        <li id="complete-link"><ion-icon name="checkmark-circle-outline"></ion-icon>Complete</li>
                        <li id="category-link"><ion-icon name="settings-outline" aria-label="Favorite"></ion-icon>Manage
                            categories</li>
                        <!-- <h2 id="selectedDate" contenteditable="true"></h2> -->
                        <form action="index.php" method="post" id="dateForm" style="display:none">
                            <input type="text" id="selectedDate" name="date">
                            <button id='date-btn'>Submit</button>

                        </form>
                        <button id="category-toggle" onclick="toggle()" style="display:none"></button>
                        <div class="manage-tasks" id="item" style="display:none">
                            <div class="box">
                                <div class="box-header">
                                    <ion-icon name="settings" aria-label="Favorite">
                                    </ion-icon>
                                    <h2>To-do-App Categories
                                    </h2>
                                    <button onclick="toggle()">✖</button>
                                </div>
                                <div class="manage-buttons">
                                    <button class="mng-add" id="mng-add" type="submit">Add Category</button>
                                    <button class="mng-delete" id="mng-delete" type-="submit">Delete Selected</button>
                                </div>
                            </div>
                            <div class="category-box">
                                <h2>Category name</h2>
                                <table>
                                    <form action="./components/delete_category.php" method="post">
                                        <?php include "./components/get_category.php" ?>
                                        <button type='submit' id="delete-btn" name="deleteCategory"
                                            style="display:none">Delete</button>
                                    </form>
                                    <tr>
                                        <form action="./components/add_category.php" method="post">
                                            <td><input type="text" name="category" placeholder="Add new category ..."
                                                    required>
                                                <button type="submit" id="add-category" name="addCategory"
                                                    style="display:none"></button>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <form action="index.php" method="post" class="toggle-buttons">
                            <button id="all-btn" class="btn" type='submit' name="status" value="all"></button>
                            <button id="pending-btn" class="btn" type='submit' name="status" value="pending"></button>
                            <button id="complete-btn" class="btn" type='submit' name="status" value="complete"></button>
                        </form>

                    </ul>

                </div>
            </div>
            <div id="right">
                <div class="tasks-bar">
                    <ul class="tasks">
                        <form action="index.php" method="post">
                            <li><button class="btn" id="mybtn" name="category" type='submit' value="all"
                                    onclick="toggleActive(this)">All</button></li>
                            <?php include "./components/categories.php" ?>
                        </form>
                        <div class="control-buttons">
                            <li><button class="add" id="add-btn" type='submit'>Add Task</button></li>
                            <li><button class="delete" id="del-btn" type="submit">Delete Selected?</button></li>
                        </div>
                    </ul>
                    <div class="details_table">
                        <table>
                            <th></th>
                            <th colspan="1">Description</th>
                            <th>Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <tr class='add-task-row'>
                                <form action="./components/delete_task.php" method="post">
                                    <?php include "./components/get_tasks.php" ?>
                                    <button id="delete-task" type='submit' name='deleteTask'
                                        style='display:none'>Delete</button>
                                </form>
                                <form action="./components/add-task.php" method="POST" id="myform">
                                    <td width='40px'></td>
                                    <td width="400px"><input type="text" name="description" id="eventTitle"
                                            width="400px" padding-left="5px" required></td>
                                    <td width="130px">

                                        <select name="category" id="" class="category" required>
                                            <?php include "./components/update_options.php"; ?>
                                        </select>

                                    </td>
                                    <td width="130px">
                                        <inp /ut type="date" name="start-date" id="eventDate" required>
                                    </td>
                                    <td width="130px"><input type="date" name="end-date" id="" required></td>
                                    <td class='status'><input type="text" name="status" value="pending" class="status"
                                            required></td>
                            </tr>
                            <button type="submit" id="submit" name='add-task' display='none'>Submit</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="./Assets/js/script.js"></script>
        <!-- Include the JavaScript file for the calendar functionality -->
        <script src="./Assets/js/calendar.js"></script>
        <!--
      - ion-icon link
    -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>