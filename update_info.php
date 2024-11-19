<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form data

    // Fetch the user id from the URL
    $userId = $_GET['Id'];

    // Get form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $address = $_POST['address'];
    $entryDate = $_POST['entry'];

    // Handle file uploads
    $documentFile = $_FILES['uploadfile']['name'];
    $photoFile = $_FILES['uploadfilea']['name'];

    // Assuming you have a database connection
   include('header.php'); // Change this to your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update user information in the database
    $updateQuery = "UPDATE users SET 
                    Name='$name', 
                    Email='$email', 
                    PhoneNumber='$phoneNumber', 
                    address='$address', 
                    entry='$entryDate', 
                    document_file='$documentFile', 
                    photo_file='$photoFile' 
                    WHERE id=$userId";

    if ($conn->query($updateQuery) === TRUE) {
        echo "User information updated successfully!";
    } else {
        echo "Error updating user information: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
