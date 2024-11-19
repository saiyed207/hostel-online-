<?php


session_start();

include('header.php');

// Existing SQL query
$sql = "SELECT * FROM users ORDER BY Id DESC";
$result = $conn->query($sql);

// Check if a search query is present
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM users WHERE Name LIKE '%$search%' ORDER BY Id DESC";
    $result = $conn->query($sql);
    header("Location: admin.php");
}
?>
