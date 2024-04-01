<?php
include "./../components/db.php";
//include "notifications.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"] . "<button  type='button' id='delete-btn' value=" . $row["id"] . "  name='user'><input type='checkbox'value=" . $row["id"] . " name='user'></button></td></tr>";

    }
} else {
    //addNotification("No category found !!!");
}