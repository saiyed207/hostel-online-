<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $room = $_POST["room"];
    $bed = $_POST["bed"];
    $price = $_POST["price"];
    $features = $_POST["features"];
    $status = $_POST["status"];

    // Check if the combination of room and bed already exists
    $checkQuery = "SELECT id FROM house WHERE room = ? AND bed = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $room, $bed);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo '<script>alert("Room and bed are already available.");</script>';
    } else {
        // Prepare and execute the SQL query for insertion
        $insertQuery = "INSERT INTO house (room, bed, price, features, status) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sssss", $room, $bed, $price, $features, $status);

        if ($insertStmt->execute()) {
            echo '<script>alert("Data inserted successfully.");</script>';
            header("Location: house1.php");
        } else {
            echo '<script>alert("Error inserting data: ' . $insertStmt->error . '");</script>';
        }

        $insertStmt->close();
    }

    $checkStmt->close();
    $conn->close();
}

// Rest of your existing code...
?>



<head>
<title>House</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>

nav{
  background: #0082e6;
  height: 80px;
  width: 100%;
  font-family: Arial, Helvetica, sans-serif;
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
  margin-top:-7%;
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



        .container12 {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        
        }

        .sign {
    color:darkblue;
    font-size:30px;
    font-weight:bold;
    text-align:center;
}


        .form-group {
            margin-bottom: 15px;
        }

 

        .input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
        }
  

        .form-column {
            width: 100%;
            box-sizing: border-box;
            padding: 0 10px; /* Adjust as needed for spacing */
        }

        @media (min-width: 600px) {
            .form-column {
                width: 48%;
                margin-right: 2%;
            }
        }

        @media (max-width: 600px) {
            .container12 {
                width: 90%;
                margin: 10px auto;
                padding: 10px;
            }

            h1 {
                font-size:18px;
            }

            h2 {
                font-size: 1.4em;
            }

            .input, select, textarea {
                font-size: 14px;
                padding: 8px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            input[type="submit"] {
                padding: 8px 16px;
            }
            .sign {
        font-size:20px;
    }
        }

        .image-container5 {
            width: 100%;
            height: auto; /* Adjust the height as needed */
            /* Grey background color */
             /* Border radius */
            overflow: hidden;
            margin-bottom: 10px;
            padding-top:2%;
           
        }

        .image-container5 img {
            width: 100%;
           
            height: 70%;
            object-fit: cover; /* Maintain aspect ratio and cover container */
        }

        @media (max-width: 576px) {
        h5 {
            font-size: 7px !important;
        }

        h1 {
          margin-top:-25%;
        }

        .small-text {
            font-size: 8px !important;
        }

        .image-container5 {
            width: 140%;
            padding:0%;
             margin-left:-30%;/* Adjust the height as needed */
            
           
        }
        .image-container5 img {
         width:20%;
        }
    }

    .image:hover {
    transform: scale(1.2); /* Adjust the scale factor as needed for your zoom effect */
    transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
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
     
    


      <div class="container12">
        <form action="" method="POST" enctype="multipart/form-data">
        <label class="sign">MANAGE<span style="color: orange"> HOUSE</span></label>

<div style="text-align: center;">
    <hr style="margin-top: 5px; margin-bottom: 10px; width: 15%; height: 2px; background-color: darkblue; display: inline-block;">
    <span style="display: inline-block; width: 1%;"></span>
    <hr style="margin-top: 5px; margin-bottom: 10px; width: 15%; height: 2px; background-color: orange; display: inline-block;">
</div>
           
            <div class="form-container">
                <div class="form-column">
                    <div class="form-group">
                        <label for="room">ROOM NO:</label>
                        <select name="room" class="input" required>
                        <option disabled selected>Select</option>
                        <option>R1</option>
                        <option>R2</option>
                        <option>R3</option>
                        <option>R4</option>
                        <option>R5</option>
                        <option>R6</option>
                        <option>R7</option>
                        <option>R8</option>
                        <option>R9</option>
                        <option>R10</option>
                        <option>R11</option>
                        <option>R12</option>
                        <option>R13</option>
                        <option>R14</option>
                        <option>R15</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bed">BED NO:</label>
                        <select name="bed" class="input" required>
                        <option disabled selected>Select</option>
                        <option>B1</option>
                        <option>B2</option>
                        <option>B3</option>
                        <option>B4</option>
                        <option>B5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">RENT PRICE:</label>
                        <input type="text" name="price" class="input" placeholder="Enter rent amount" required>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <label for="features">FEATURES:</label>
                        <textarea name="features" rows="4" class="input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">STATUS:</label>
                        <select name="status" class="input" required>
    <option disabled selected>Select</option>
    <option>Occupied</option>
    <option>Vacant</option>
</select>

                    </div>

                </div>

                
                
            </div>
            <div class="form-group" >
                    <input type="submit" value="Submit" class="input" style="width:100%">
                </div>
</form>
    </div>


    <br>
    <footer class="text-black" style="background-color: #f2f2f2; box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5); padding-top:3%">
    <div class="container" >
        <div class="row" style="text-align:left">
            <div class="col-3">
                <a class="navbar-brand" href="#">
                    <img src="./buraq/buraqlogo.png" class="img-fluid" alt="Logo" style="position: absolute;">
                </a>
            </div>
            <div class="col-3">
                <div class="image-container5" style="text-align:center">
                    <h5 style="color: black; font-size: 18px; margin-bottom: 10px;">Quick Links</h5>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin-top:10%">
                        <h5 style="color: grey; font-size: 18px; ">Home</h5>
                        <h5 style="color: grey; font-size: 18px; ">Jobs</h5>
                        <h5 style="color: grey; font-size: 18px; ">About</h5>
                        <h5 style="color: grey; font-size: 18px; ">Services</h5>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="image-container5" style="text-align:center">
                    <h5 style="color: black; font-size: 18px; margin-bottom: 10px;">Get In Touch</h5>
                    <div class="text-center">
        <div class="social-icons">
            <img src="vacancies/instagram.jpg"  style="width: 18%;  margin-right: 2%; margin-bottom: 10px;">
            <img src="vacancies/whatsapp.jpg" style="width: 20%;  margin-right: 2%; margin-bottom: 10px;">
            <img src="vacancies/facebook.png" style="width: 18%;  margin-bottom: 10px;">
        </div>
    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="image-container5" style="text-align:center">
                    <h5 style="color: black; font-size: 18px; "><i style="color:black"></i> Contact Us</h5>
                    </div>
                    <h5 style="color: black; font-size: 18px; " class="image-container5"><i style="color:yellow" ></i> #33, 3rd Floor, Satellite Complex, Koppikar Road, HUBLI-580 020. Karnataka, INDIA</h5>
                    <h5 style="color: black; font-size: 18px; " class="image-container5"><i style="color:#FFA500" class="fa fa-envelope"></i> buraq@gmail.com</h5>
                    
                    <h5 style="color: black; font-size: 18px;" class="image-container5"><i style="color:#FFA500" class="fa fa-phone"></i> +919845120154</h5>
                    
            </div>
        </div>
    </div>

    <div class="text-center ">
        <h5 style="font-size: 16px; padding: 10px;"> Copyright Buraq &copy; 2023 | All rights reserved | developed by <span style="color:#FFA500">Orbit technologies</span></h5>
    </div>

    
</footer>
</body>




</html>









