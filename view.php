<?php
session_start();

include('header.php');

// Fetch user details including image, email, resume address, and entry date
$userId = isset($_GET['id']) ? $_GET['id'] : null;

if ($userId) {
    $userSql = "SELECT * FROM users WHERE Id = $userId";
    $userResult = $conn->query($userSql);

    // Fetch and display payment information based on user ID
    $paymentSql = "SELECT * FROM payments WHERE user_id = $userId";
    $paymentResult = $conn->query($paymentSql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        main {
            margin-right: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <?php
            if (isset($userResult) && $userResult->num_rows > 0) {
                $userDetails = $userResult->fetch_assoc();
                echo "<h2>User Information for ID: $userId</h2>";

                echo "<p><strong>Name:</strong> " . $userDetails["Name"] . "</p>";
                echo "<p><strong>Room:</strong> " . $userDetails["Room"] . "</p>";
                echo "<p><strong>Bed:</strong> " . $userDetails["Bed"] . "</p>";
                echo "<p><strong>Mobile Number:</strong> " . $userDetails["PhoneNumber"] . "</p>";
                echo "<p><strong>Email:</strong> " . $userDetails["Email"] . "</p>";

                echo "<p><strong>Address:</strong> " . $userDetails["Address"] . "</p>";
                echo "<p><strong>Entry Date:</strong> " . $userDetails["entry"] . "</p>";
                echo "<img src='Photo/" . $userDetails["Photo"] . "' alt='User Photo' style='max-width: 200px; max-height: 200px; float:right; margin-top:-35%'>";

                if (isset($paymentResult) && $paymentResult->num_rows > 0) {
                    echo "<h2>Payment Information</h2>";
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Rent Price</th>
                                    <th>Paid Amount</th>
                                    <th>Remaining Balance</th>
                                    <th>Date of Payment</th>
                                </tr>
                            </thead>
                            <tbody>";

                    while ($paymentRow = $paymentResult->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $paymentRow["price"] . "</td>
                                <td>" . $paymentRow["paid"] . "</td>
                                <td>" . $paymentRow["remaining"] . "</td>
                                <td>" . $paymentRow["balance_date"] . "</td>
                            </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p>No payment information available for User ID: $userId</p>";
                }
            } else {
                echo "<p>No user information available for ID: $userId</p>";
            }
            ?>
        </main>

        <button id="downloadBtn" style="padding:10px; background-color:blue;border:1px solid blue; color:white; border-radius:2px">Download as PDF</button>

        <script>
            document.getElementById("downloadBtn").addEventListener("click", function() {
                var element = document.querySelector('.container');

                // Create HTML2PDF instance
                html2pdf(element);
            });
        </script>
    </div>
</body>
</html>
