<?php
@session_start();
include "db.php";
@$posted_object = $_POST['category'];
@$posted_status = $_POST['status'];
$category = $posted_object;
$status = $posted_status;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    @$date = $_POST["date"];
    //echo $date;
    $sql = "SELECT * FROM tasks WHERE   status= '$status' or category='$category'or `start_date` ='$date'  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data in a table format
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' value=" . $row["id"] . " name='task'/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td></tr>";
        }
    } else {
        addNotification("No task found !");
    }
    @header("location:../index.php");
}


if ($posted_object == 'all' || $posted_status == 'all') {
    // Query data based on the selected category
    $sqlAll = "SELECT * FROM tasks";
    $resultAll = $conn->query($sqlAll);
    if ($resultAll->num_rows > 0) {
        // Output data in a table format
        while ($row = $resultAll->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' name='task' value=" . $row["id"] . "/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td></tr>";
        }
    } else {
        addNotification("No task found !!!");
    }
    @header("location :../index.php");
}