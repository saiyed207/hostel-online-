<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Amogh PG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f2f5;
        }

        nav {
            background: #0082e6;
            height: 80px;
            width: 100%;
        }

        label.logo {
            color: white;
            font-size: 35px;
            line-height: 80px;
            padding: 0 100px;
            font-weight: bold;
        }

        nav ul {
            float: right;
            margin-right: 20px;
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }

        nav ul li a {
            color: white;
            font-size: 17px;
            padding: 7px 13px;
            border-radius: 3px;
            text-transform: uppercase;
        }

        a.active, a:hover {
            background: #1b9bff;
            transition: .5s;
        }

        .checkbtn {
            font-size: 30px;
            color: white;
            float: right;
            line-height: 80px;
            margin-right: 40px;
            cursor: pointer;
            display: none;
        }

        #check {
            display: none;
        }

        @media (max-width: 952px) {
            label.logo {
                font-size: 30px;
                padding-left: 50px;
            }

            nav ul li a {
                font-size: 16px;
            }
        }

        @media (max-width: 858px) {
            .checkbtn {
                display: block;
            }

            ul {
                position: fixed;
                width: 100%;
                height: 100vh;
                background: #2c3e50;
                top: 80px;
                left: -100%;
                text-align: center;
                transition: all .5s;
            }

            nav ul li {
                display: block;
                margin: 50px 0;
                line-height: 30px;
            }

            nav ul li a {
                font-size: 20px;
            }

            a:hover, a.active {
                background: none;
                color: #0082e6;
            }

            #check:checked ~ ul {
                left: 0;
            }
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 20px;
            padding: 0 20px;
        }

        .block {
            width: 250px;
            height: 150px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 10px;
            transition: transform 0.3s;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .block:hover {
            transform: scale(1.05);
        }

        .block-1 {
            background-color: #3498db;
        }

        .block-2 {
            background-color: #e74c3c;
        }

        .block-3 {
            background-color: #2ecc71;
        }

        .notice-board {
            width: 90%;
            margin: 20px auto;
            border: 3px solid #3498db;
            border-radius: 10px;
            background-color: #f9f9f9;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .notice-board h2 {
            color: #3498db;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .notice {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f0f2f5;
            border-radius: 5px;
            margin: 10px 0;
        }

        .notice.green {
            background-color: #2ecc71;
            color: white;
        }

        .notice .info {
            flex: 1;
            text-align: left;
        }

        .notice .label {
            font-weight: bold;
            color: #555;
        }

        .notice .value {
            color: #333;
        }
    </style>
</head>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Hostel</label>
    <ul>
        <li><a href="./dashboard.php">DASHBOARD</a></li>
        <li><a href="./admin.php">USERS</a></li>
        <li><a href="./house1.php">ROOM MANAGE</a></li>
        <li><a href="./payment.php">PAYMENT</a></li>
    </ul>
</nav>

<div class="dashboard">
    <?php
    // Assuming database connection is successful

    // Query to count vacant rooms
    $sql = "SELECT COUNT(*) as vacant_count FROM house WHERE status = 'Vacant'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $vacantCount = $row['vacant_count'];

        echo '<div class="block block-1">
                <i class="fas fa-building fa-3x"></i>
                <div>VACANT ROOM</div>
                <div>' . $vacantCount . '</div>
              </div>';
    }

    // Query to count total users
    $sql = "SELECT COUNT(*) as total_users FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalUsers = $row['total_users'];

        echo '<div class="block block-2">
                <i class="fas fa-users fa-3x"></i>
                <div>TOTAL USERS</div>
                <div>' . $totalUsers . '</div>
              </div>';
    }

    // Query to count users with remaining balance
    $sql = "SELECT COUNT(DISTINCT user_id) AS users_with_remaining_balance
            FROM payments
            WHERE remaining <> 0
              AND (user_id, created_at) IN (
                SELECT user_id, MAX(created_at) AS max_created_at
                FROM payments
                GROUP BY user_id
              )";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $usersWithRemainingBalance = $row['users_with_remaining_balance'];

        echo '<div class="block block-3">
                <i class="fas fa-exclamation-triangle fa-3x"></i>
                <div>REMAINING BALANCE</div>
                <div>' . $usersWithRemainingBalance . '</div>
              </div>';
    }
    ?>
</div>

<div class="notice-board">
    <h2><i class="fas fa-bullhorn"></i> Notice Board</h2>
    <?php
    $sql = "SELECT user_id, name, MAX(created_at) AS last_payment_date,
                   SUBSTRING_INDEX(GROUP_CONCAT(remaining ORDER BY created_at DESC), ',', 1) AS last_remaining
            FROM payments
            GROUP BY user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $lastPaymentDate = $row['last_payment_date'];
            $lastRemainingBalance = $row['last_remaining'];
            $noticeClass = $lastRemainingBalance > 0 ? 'green' : '';

            echo '<div class="notice ' . $noticeClass . '">
                    <div class="info">
                        <span class="label">User:</span> ' . $name . ' 
                        <span class="label">Last Payment Date:</span> ' . $lastPaymentDate . '
                    </div>
                    <div class="value">Remaining Balance: ' . $lastRemainingBalance . '</div>
                  </div>';
        }
    }
    ?>
</div>
</body>
</html>
