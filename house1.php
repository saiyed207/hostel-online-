<head>
<title>House</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
                * {
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
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

        section {
            background-size: cover;
            height: calc(50vh - 80px);
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

     
      
body, h1, ul, li {
    margin: 0;
    padding: 0;
}


body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    line-height: 1.6;
    color: #333;
}

h1, h2, h3 {
    font-weight: bold;
}

h1 {
    font-size: 24px;
}

h2 {
    font-size: 20px;
}

h3 {
    font-size: 18px;
}


.content {
    margin-left: 0;
    padding: 20px;
    text-align:center;
    transition: margin-left 0.3s;
}


.table {
    width: 80%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align:center;
    margin-left:10%;
}

.table th, .table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Add these styles to your existing CSS */
.table td.occupied {
    color: red; /* Set the text color for occupied status */
}

.table td.vacant {
    color: green; /* Set the text color for vacant status */
}


.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table thead {
    background-color: #333;
    color: #fff;
}


.table tbody tr:hover {
    background-color: #f5f5f5;
}

.btn {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Button hover effect */
.btn:hover {
    background-color: #0056b3;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

/* Animation */
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.content {
    animation: fadeIn 0.5s ease-in-out;
}


.download-button {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-align: center;
    line-height: 1.4;
    font-weight: bold;
    margin-right: 10px;
}

.download-button i {
    margin-right: 5px;
}

.download-button:hover {
    background-color:green;
}
    /* Style for the search box */
    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end !important;
        margin-right:5%;
      
       
    }

    .search-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
        flex-grow: 1;
    }

    .search-button {
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .refresh-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #007BFF;
        margin-left: 10px;
    }

    .refresh-icon {
        margin-right: 5px;
    }




    </style>
</head>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Amogh PG</label>
    <ul>
        <li><a  href="./dashboard.php">DASHBOARD</a></li>
        <li><a href="./admin.php">USERS</a></li>
        <li><a href="./house1.php">ROOM MANAGE</a></li>
        <li><a href="./payment.php">PAYMENT</a></li>
        
    </ul>
</nav>
<br>
<div class="search-container">
    <form method="get" action="">
        <input type="text" id="search" name="search" class="search-input" placeholder="search" value="" autocomplete="off">
        <button type="submit" class="search-button">Search</button>
    </form>
    <a href="house1.php" class="refresh-link">
        <i class="fa fa-refresh refresh-icon"></i>
        Refresh
    </a>
</div>

<div style="margin:2%">
<a href='./house.php' class='download-button' style='background-color: green;'>
  <i class='fa fa-building'></i><i class='fa fa-plus'></i> ADD NEW ROOM
</a>
</div>

<?php
include('header.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectQuery = "SELECT * FROM house";
$result = $conn->query($selectQuery);


if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $searchSql = "SELECT * FROM house WHERE room LIKE '%$search%' OR bed LIKE '%$search%' OR price LIKE '%$search%' OR features LIKE '%$search%' OR status LIKE '%$search%'";
    $result = $conn->query($searchSql);
}

// Display the records in a table
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light"><tr><th>Room</th><th>Bed</th><th>Price</th><th>Features</th><th>Status</th><th>Action</th></tr></thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        // Add a class based on the status for styling
        $statusClass = $row["status"] == 'Occupied' ? 'occupied' : 'vacant';

        echo '<tr>';
        echo '<td>' . $row["room"] . '</td>';
        echo '<td>' . $row["bed"] . '</td>';
        echo '<td>' . $row["price"] . '</td>';
        echo '<td>' . $row["features"] . '</td>';
        echo '<td class="' . $statusClass . '">' . $row["status"] . '</td>';
        
        // Add Edit and Delete buttons with appropriate links
       // Add Edit and Delete buttons with appropriate links
echo '<td>';
echo '<a href="./edithouse.php?id=' . $row["id"] . '" class="btn btn-warning" style="margin-right: 5px;">Edit</a>';
echo '<a href="./deleteroom.php?id=' . $row["id"] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this room?\')">Delete</a>';
echo '</td>';

        
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="no-records">No records found.</p>';
}

$result->close();
$conn->close();
?>



