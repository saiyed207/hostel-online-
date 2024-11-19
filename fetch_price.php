<?php
// fetch_price.php

// Database connection parameters
include('header.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the selected room from the AJAX request
    $selectedRoom = $_POST['selectedRoom'];

    // Fetch the price from the 'house' table based on the selected room
    $sql = "SELECT price FROM house WHERE CONCAT(room, ' - ', bed) = :selectedRoom";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':selectedRoom', $selectedRoom);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo $result['price'];
    } else {
        echo "Price not available";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
