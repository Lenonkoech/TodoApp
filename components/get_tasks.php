<?php
@session_start();
//print session details....For dev purposes only
//print_r($_SESSION);
class Get_tasks
{
    public function processTasks()
    {
        include "db.php";
        @$posted_object = $_POST['category'];
        @$posted_status = $_POST['status'];
        $category = $posted_object;
        $status = $posted_status;

        if (isset($_SESSION['userId'])) {
            $userState = $_SESSION['userId'];
            //echo $userState;
            // echo $category;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //echo $date;
            //echo @$userState;
            @$sql3 = "SELECT * FROM tasks WHERE  `category` = ' $category' and user_id='$userState' ";
            $result = $conn->query($sql3);
            if ($result->num_rows > 0) {
                // Output data in a table format
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td><input type='checkbox' value=" . $row["id"] . " name='task'/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                 <td><input type='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                }
            } else {
                $this->notify('No Task found'); //.dispalys errors
                @header("location:../index.php");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                @$date = $_POST["date"];
                //echo $date;
                @$sql = "SELECT * FROM tasks WHERE `start_date` ='$date' and user_id= '$userState'  ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' value='" . $row["id"] . "' name='task'/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                 <td><input type='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    // $this->notify('');
                }
                @header("location:../index.php");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                @$date = $_POST["date"];
                //echo $date;
                @$sql = "SELECT * FROM tasks WHERE status= '$status'  and user_id= '$userState'  ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' value='" . $row["id"] . "' name='task'/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                 <td><input type='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    // $this->notify('');
                }
                @header("location:../index.php");
            }
            if ($posted_object == 'all' || $posted_status == 'all') {
                // Query data based on the selected category
                @$sqlAll = "SELECT * FROM tasks where user_id= '$userState'";
                $resultAll = $conn->query($sqlAll);
                if ($resultAll->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $resultAll->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' name='task' value='" . $row["id"] . "'/></td><td class='description'>" . $row["description"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    //$this->notify('');
                }
                @header("location :../index.php");

            }

        }
    }
    //A private function to retrieve notifications generated by code
    private function notify($message)
    {
        addNotification($message);
    }
}

$tasks = new Get_tasks();
$tasks->processTasks();
?>