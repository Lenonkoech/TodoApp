<?php
include "db.php";
include "notifications.php";
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["category"] . "<button  type='button' id='delete-btn' value=" . $row["id"] . "  name='category'><input type='checkbox'value=" . $row["id"] . " name='category'></button></td></tr>";

    }
} else {
    addNotification("No category found !!!");
}