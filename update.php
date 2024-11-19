<?php
session_start();

include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $oldPassword = $_POST["password"];
    $newPassword = $_POST["newpassword"];

    // Validate the old password before updating
    $validateSql = "SELECT * FROM admin_users WHERE username='$username' AND password='$oldPassword'";
    $validateResult = $conn->query($validateSql);

    if ($validateResult->num_rows == 1) {
        // Old password is correct, proceed with the update
        $updateSql = "UPDATE admin_users SET password='$newPassword' WHERE username='$username'";
        $updateResult = $conn->query($updateSql);

        if ($updateResult === TRUE) {
            // Password updated successfully
            $_SESSION["update_success"] = "Password updated successfully";
            header("Location: login1.php");
            exit();
        } else {
            // Error updating password
            $_SESSION["update_error"] = "Error updating password";
            header("Location: password.php");
            exit();
        }
    } else {
        // Invalid old password
        $_SESSION["update_error"] = "Invalid old password";
        header("Location: password.php");
        exit();
    }
} else {
    // Invalid request method
    $_SESSION["update_error"] = "Invalid request method";
    header("Location: password.php");
    exit();
}

?>
