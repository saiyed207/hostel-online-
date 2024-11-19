<?php
session_start();
$_SESSION["registration_success"] = true;

include('header.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $room = $_POST['room'];

    $resume = $_FILES["uploadfile"]["name"];
    $tempnamea = $_FILES["uploadfile"]["tmp_name"];
    $foldera = "./Resume/" . $resume;
    $photo = $_FILES["uploadfilea"]["name"];
    $tempname = $_FILES["uploadfilea"]["tmp_name"];
    $folder = "./Photo/" . $photo;
    $address = $_POST['address'];
    $entry = $_POST['entry'];
    $price = $_POST['price'];

    $roomInfo = explode(" - ", $_POST["room"]); // Split room and bed
    $room = $roomInfo[0];
    $bed = $roomInfo[1];

    // Using prepared statement to prevent SQL injection
    $sql = "INSERT INTO users (Name, room, bed, Email, PhoneNumber, resume, photo, address, entry, price, registration_timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $room, $bed, $email, $phoneNumber, $resume, $photo, $address, $entry, $price]);

    // Update room status to 'occupied'
    $updateHouseSQL = "UPDATE house SET status = 'Occupied' WHERE room = :room AND bed = :bed";
    $updateHouseStmt = $conn->prepare($updateHouseSQL);
    $updateHouseStmt->bindParam(":room", $room);
    $updateHouseStmt->bindParam(":bed", $bed);
    $updateHouseStmt->execute();

    move_uploaded_file($tempnamea, $foldera);
    move_uploaded_file($tempname, $folder);

    // Redirect to admin.php after successful registration
    header("Location: admin.php");
    exit();
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
