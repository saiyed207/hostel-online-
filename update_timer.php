<?php
include('header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $timer = $_POST['timer'];

    // Update the database with the new timer value for the user
    $updateTimerSQL = "UPDATE user_timers SET timer = $timer WHERE user_id = $userId";
    $conn->query($updateTimerSQL);
}
?>
