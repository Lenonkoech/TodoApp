<?php
@session_start();
//print session details....For dev purposes only
//print_r($_SESSION);
class Get_tasks
{
    public function processTasks()
    {
        include "./../components/db.php";
        @$posted_object = $_POST['category'];
        @$posted_status = $_POST['status'];
        $category = $posted_object;
        $status = $posted_status;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            @$date = $_POST["date"];
            //echo $date;
            //echo @$userState;
            @$sql = "SELECT tasks.* ,users.username FROM tasks inner join users on tasks.user_id=users.id WHERE `category` = ' $category' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data in a table format
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td><input type='checkbox' value=" . $row["id"] . " name='task'/></td><td class='description'>" . $row["description"] . "</td><td>" . $row["username"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                  <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                }
            } else {
                // $this->notify(''); ...dispalys errors
                @header("location:dashboard.php");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                @$date = $_POST["date"];
                //echo $date;
                @$sql = "SELECT tasks.* ,users.username FROM tasks inner join users on tasks.user_id=users.id WHERE start_date= '$date' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' value=" . $row["id"] . " name='task'/></td><td class='description'>" . $row["description"] . "</td><td>" . $row["username"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                  <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    // $this->notify('');
                }
                @header("location:dashboard.php");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //  @$date = $_POST["date"];
                //echo $date;
                @$sql = "SELECT tasks.* ,users.username FROM tasks inner join users on tasks.user_id=users.id WHERE `status` = '$status' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' value=" . $row["id"] . " name='task' /></td><td class='description'>" . $row["description"] . "</td><td>" . $row["username"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                  <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    // $this->notify('');
                }
                @header("location:dashboard.php");
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                @$user = $_POST['user'];
                //echo $user;
                $sql = "SELECT tasks.*,users.username FROM tasks inner join users on tasks.user_id=users.id where `user_id`='$user' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' value= '" . $row["id"] . "' name='task '/></td><td class='description'>" . $row["description"] . "</td><td>" . $row["username"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                  <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    // $this->notify('');
                }
                @header("location:dashboard.php");
            }
            if ($posted_object == 'all' || $posted_status == 'all') {
                // Query data based on the selected category
                @$sqlAll = "SELECT tasks.* ,users.username from tasks INNER JOIN users ON tasks.user_id=users.id ";
                $resultAll = $conn->query($sqlAll);
                if ($resultAll->num_rows > 0) {
                    // Output data in a table format
                    while ($row = $resultAll->fetch_assoc()) {
                        echo "<tr><td><input type='checkbox' name='task' value='" . $row["id"] . "'/></td><td class='description'>" . $row["description"] . "</td><td>" . $row["username"] . "</td><td class='category'>" . $row["category"] . "</td>
                                                <td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td class='status'>" . $row["Status"] . "</td>
                                                  <td><input type='checkbox' id='checkbox' name='taskStatus' onchange='submitBox()' value='" . $row["id"] . "'/></td></tr>";
                    }
                } else {
                    //$this->notify('');
                }
                @header("location :dashboard.php");

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