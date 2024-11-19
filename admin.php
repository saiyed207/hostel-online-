<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login1.php");
    exit();
}

include('header.php');
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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





?>






<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
    <style>
        *{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}

nav{
  background: #0082e6;
  height: 80px;
  width: 100%;
}
label.logo{
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;
}
nav ul{
  float: right;
  margin-right: 20px;
}
nav ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #1b9bff;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 952px){
  label.logo{
    font-size: 30px;
    padding-left: 50px;
  }
  nav ul li a{
    font-size: 16px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
  }
  ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #2c3e50;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a{
    font-size: 20px;
  }
  a:hover,a.active{
    background: none;
    color: #0082e6;
  }
  #check:checked ~ ul{
    left: 0;
  }
}
section{
  background: url(bg1.jpg) no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
}

.logout-button {
    background-color: #ff0000;
    color: #ffffff;
    border: 1px solid #ff0000;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    float:left;
    transition: background-color 0.3s, color 0.3s;

}

.logout-button i {
    margin-right: 5px;
}

.logout-button:hover {
    background-color: darkblue;
    border:darkblue;
    color: #ffffff;
}

.admin-panel {
   color:darkblue;
    font-size:50px;
     margin-top:-30px; 
     position:absolute;
}

@media (max-width: 776px) {
       .admin-panel {
        font-size:30px;
       }
    }

    @media (max-width: 576px) {
       .admin-panel {
        display:none;
       }
    }

  
    /* Style for the search box */
    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end !important;
      
       
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
<body>
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

<form method="post" action="logout.php">
    <button type="submit" class="logout-button">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>


    <main class="content">
     <div style="text-align:center; margin-left:20%">
        <h2 class="admin-panel"></h2>
</div>

<br>

<div>
<a href='./conn.php' class='download-button' style='background-color: green;'>
  <i class='fa fa-user'></i><i class='fa fa-plus'></i> ADD NEW USER
</a>

</div>
<!-- Add the following code above the <table> tag -->
<div class="search-container">
    <form method="get" action="">
        <input type="text" id="search" name="search" class="search-input" placeholder="search" value="" autocomplete="off">
        <button type="submit" class="search-button">Search</button>
    </form>
    <a href="admin.php" class="refresh-link">
        <i class="fa fa-refresh refresh-icon"></i>
        Refresh
    </a>
</div>





 <br>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Room No</th>
                    <th>Bed No</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Rent</th>
                    <th>Adhar Card/ Passport</th>
                    <th>Photo</th>
                    <th>Address</th>
                    <th>Entry</th>
                    <th>Delete</th>
                   
                    <th>View</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
        

// Check if a search query is present

$sql = "SELECT * FROM users ORDER BY Id DESC";
$result = $conn->query($sql);



// Check if a search query is present
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $searchSql = "SELECT * FROM users WHERE 
                  Name LIKE '%$search%' OR 
                  Room LIKE '%$search%' OR 
                  Bed LIKE '%$search%' OR 
                  Email LIKE '%$search%' OR 
                  PhoneNumber LIKE '%$search%' OR 
                  Address LIKE '%$search%' OR 
                  entry LIKE '%$search%'
                  ORDER BY Id DESC";
    $result = $conn->query($searchSql);
}

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["Id"] . "</td>
                            <td>" . $row["Name"] . "</td>
                            <td>" . $row["Room"] . "</td>
                            <td>" . $row["Bed"] . "</td>
                            <td>" . $row["Email"] . "</td>
                            <td>" . $row["PhoneNumber"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td>
                                <a href='download.php?file=Resume/" . $row["Resume"] . "' class='download-button'>
                                    <i class='fa fa-download'></i>  Adharcard
                                </a>
                            </td>
                            <td>
                                <div style='display: flex; align-items: center;'>
                                    <img width='90px' height='80px' src='Photo/" . $row["Photo"] . "' alt='Photo' style='max-width: 100px; max-height: 100px; margin-right: 10px;'>
                                    <a  href='download.php?file=Photo/" . $row["Photo"] . "' class='download-button'>
                                        <i class='fa fa-download'></i>  Photo
                                    </a>
                                </div>
                            </td>
                            <td>" . $row["Address"] . "</td>
                            <td>" . $row["entry"] . "</td>
                            
                            <td>
                                <form method='post' action=''>
                                    <input type='hidden' name='delete_id' value='" . $row["Id"] . "'>
                                    <button type='submit' style='color: red;' class='delete-button'>
                                    <i class='fa fa-trash' style='font-size: 20px; text-align:center'></i>
                                </button>
                                
                                </form>
                            </td>
                          
<td>
    <a href='view.php?id=" . $row["Id"] . "' class='view-button'>
        <i class='fa fa-eye'></i> View
    </a>
</td>

<td>
    <a href='edit.php?id=" . $row["Id"] . "' class='edit-button'>
        <i class='fa fa-pencil'></i> Edit
    </a>
</td>

                        </tr>";
                    }
                   
                } else {
                    echo "<tr><td colspan='9'>No data available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

  
</body>
</html>
