<?php
// Enable error reporting for debugging purposes

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login1.php");
    exit();
}

include('header.php');
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    // Get room and bed information before deletion
    $getRoomBedSQL = "SELECT room, bed FROM users WHERE Id = $deleteId";
    $getRoomBedResult = $conn->query($getRoomBedSQL);
    if ($getRoomBedResult->num_rows > 0) {
        $row = $getRoomBedResult->fetch_assoc();
        $roomToDelete = $row['room'];
        $bedToDelete = $row['bed'];

        // Update room and bed status to 'vacant' before deleting the user
        $updateRoomSQL = "UPDATE house SET status = 'Vacant' WHERE room = '$roomToDelete' AND bed = '$bedToDelete'";
        $conn->query($updateRoomSQL);
    }

    $deleteSql = "DELETE FROM users WHERE Id = $deleteId";

    if ($conn->query($deleteSql) === TRUE) {
        $resetAutoIncrementSql = "ALTER TABLE users AUTO_INCREMENT = 1";
        $conn->query($resetAutoIncrementSql);

        echo '<script>alert("Record deleted successfully.");</script>';
        header("Location: admin.php");
    } else {
        echo '<script>alert("Error deleting record: ' . $conn->error . '");</script>';
    }
}

if (isset($_POST['submit_payment'])) {
    // Collect user's basic information
    $userId = $_POST['user_id'];
    $name = $_POST['user_name'];
    $room = $_POST['user_room'];
    $bed = $_POST['user_bed'];
    $mobileNumber = $_POST['user_phone'];

    // Collect payment information
    $price = $_POST['user_price'];
    $paid = $_POST['paid'];
    $remaining = $_POST['remaining'];
    $balanceDate = $_POST['balance'];

    // Insert payment information into the payments table
    $insertPaymentSQL = "INSERT INTO payments (user_id, name, room, bed, mobile_number, price, paid, remaining, balance_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtPayment = $conn->prepare($insertPaymentSQL);
    $stmtPayment->bind_param("isssiddss", $userId, $name, $room, $bed, $mobileNumber, $price, $paid, $remaining, $balanceDate);

    if ($stmtPayment->execute()) {
        echo '<script>alert("Payment information submitted successfully.");</script>';
        header("Location: payment.php");
        $stmtPayment->close();
    } else {
        echo '<script>alert("Error submitting payment information: ' . $stmtPayment->error . '");</script>';
    }
}
?>
