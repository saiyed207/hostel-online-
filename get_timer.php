<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amogh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_GET['user_id'];

    $getTimerSQL = "SELECT timer FROM user_timers WHERE user_id = $userId";
    $result = $conn->query($getTimerSQL);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $timer = $row['timer'];

        echo json_encode(['timer' => $timer]);
    } else {
        echo json_encode(['timer' => null]);
    }
}
?>
