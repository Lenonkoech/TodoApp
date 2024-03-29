<!--code to update changes to options in the table incase of add or delete -->
<?php
include "db.php";
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value=" ' . $row["category"] . '">' . $row["category"] . '</option>';
    }
}