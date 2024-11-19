<?php

// Check if the request is to get the timer value
if (isset($_GET['get_timer'])) {
    // Simulate getting timer data from a database or any other data source
    $userId = $_GET['user_id'];

    // Connect to your database
   include('header.php');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the user's registration timestamp from the 'users' table
        // Assuming the user identifier column is 'id' (replace it with your actual column name)
        $stmt = $conn->prepare("SELECT registration_timestamp FROM users WHERE id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $registrationTimestamp = strtotime($result['registration_timestamp']);
            // Calculate the elapsed time
            $elapsed_time = max(60 - (time() - $registrationTimestamp) % 60, 0);

            $response = array('elapsed_time' => $elapsed_time);
        } else {
            // Handle the case where the user_id is not found
            $response = array('error' => 'User not found');
        }

        // Respond with the JSON-encoded timer data or error message
        header('Content-Type: application/json');
        echo json_encode($response);

        // Close the database connection
        $conn = null;

        // Exit to stop further execution
        exit;
    } catch (PDOException $e) {
        // Handle database connection errors
        $errorResponse = array('error' => 'Database error: ' . $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($errorResponse);

        // Exit to stop further execution
        exit;
    }
}

// Add any other server-side logic here if needed

?>
