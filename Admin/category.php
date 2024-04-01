<?php
include "./../components/db.php";

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '   <li><button class="btn" id="mybtn" name="category" type="submit" value="' . $row["category"] . '"
                                    onclick="toggleActive(this)">' . $row["category"] . '</button></li>';

    }
} else {
    addNotification("No categories found !!!");
}