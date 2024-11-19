<?php

session_start();
$_SESSION["registration_success"] = true;

include('header.php');


session_start();
$_SESSION["registration_success"] = true;


header("Location: connect1.php"); 
exit();


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $firstname = $_POST['FirstName'];
  $lastname = $_POST['LastName'];
  $email = $_POST['Email'];
  $phoneNumber = $_POST['PhoneNumber'];

  $resume = $_FILES["uploadfile"]["name"];
  $tempnamea = $_FILES["uploadfile"]["tmp_name"];
  $foldera = "./Resume/" . $resume;
  $photo = $_FILES["uploadfilea"]["name"];
  $tempname = $_FILES["uploadfilea"]["tmp_name"];
  $folder = "./Photo/" . $photo;
  $coverletter = $_POST['Coverletter'];

  $sql = "INSERT INTO career (firstname, Position, Email, PhoneNumber, resume, photo, Coverletter) VALUES ('$firstname', 'Sales Executive', '$email','$phoneNumber','$resume','$photo','$coverletter')";

  move_uploaded_file($tempnamea, $foldera);
  move_uploaded_file($tempname, $folder);

  $conn->exec($sql);
  
  // Redirect to login.php after successful registration
  header("Location: login.php");
  exit();
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
