<?php
@session_start();

// Function to add a notification
function addNotification($message)
{
    if (!isset($_SESSION['notifications'])) {
        $_SESSION['notifications'] = [];
    }
    $_SESSION['notifications'][] = $message;
}

// Function to fetch notifications and clear them
function fetchNotifications()
{
    $notifications = [];

    if (isset($_SESSION['notifications'])) {
        $notifications = $_SESSION['notifications'];
        clearNotifications();
    }

    return $notifications;
}

// Function to clear notifications
function clearNotifications()
{
    unset($_SESSION['notifications']);
}
?>

<script>
    // JavaScript function to display notifications in a div
    function displayNotifications() {
        var notificationsDiv = document.getElementById('notifications');
        notificationsDiv.innerHTML = ''; // Clear previous notifications
        <?php
        // Fetch notifications
        $notifications = fetchNotifications();
        foreach ($notifications as $notification) {
            ?>
            notificationsDiv.innerHTML += '<p><?php echo $notification; ?></p>';
            <?php
        }
        ?>
    }
    // Call the function when the page loads
    window.onload = function () {
        displayNotifications();
    };
</script>