<?php
include "./../components/db.php";
//include "notifications.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "  <option value=' " . $row["id"] . "'>" . $row["username"] . "</option>";

    }
} else {
    addNotification("No Users found !!!");
}