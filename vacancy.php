<?php
session_start();
$isLoggedIn = isset($_SESSION['userName']);
?>

<?php


// Check if the 'userName' session variable is set
if (isset($_SESSION['userName'])) {
    // Retrieve the user's name from the session
    $userName = $_SESSION['userName'];
    
   
} else {
    // If 'userName' is not set, redirect to the login page or handle accordingly
    $userName = "Guest";
}
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/phpmailer/Exception.php';
require './phpmailer/phpmailer/PHPMailer.php';
require './phpmailer/phpmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["FirstName"];
    $phone = $_POST["LastName"];
    $from = $_POST["Email"];
    $message = $_POST["Message"];
    $logo = "https://drive.google.com/uc?id=1s-SDw4fgnNTmZDcMLEeFs2_zJJSrOADA";

    // Create an HTML email message using the provided template
    $emailMessage = '
        <html>
        <head>
            <title>Contact Form</title>
            <link href="https://fonts.googleapis.com/css?family=Lato|Poppins:400,700" rel="stylesheet">
            <style>
                body {
                    font-family: \'Lato\', sans-serif;
                    background-color: #f4f4f4;
                }

                #wrapper {
                    max-width: 767px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #ffffff;
                    border: 1px solid #ddd;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }


                h1#title {
                    text-align: center;
                    font-family: \'Poppins\', sans-serif;
                    color: #333;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                #footer {
                    margin-top: 20px;
                    text-align: center;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div id="wrapper">
                <img src="' . $logo . '" width="15%" height="auto" alt="Company Logo">
                <h1 id="title">Contact Us Form</h1>
                <table>
                    <tr>
                        <th>First Name</th>
                        <td>' . $name . '</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>' . $phone . '</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>' . $from . '</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>' . $message . '</td>
                    </tr>
                </table>
            </div>
            <div id="footer">
                <p>Contact us at: buraq@gmail.com | Visit our website: www.buraq.com</p>
            </div>
        </body>
        </html>
    ';

    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'einsteinalbert823@gmail.com'; // Your SMTP username (Gmail email)
        $mail->Password = 'qzhjegehgecjecjo'; // Your SMTP password (Gmail password)
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // TCP port to connect to (465 for SSL)

        // Recipients
        $mail->setFrom('einsteinalbert823@gmail.com', ''); // Your email and name
        $mail->addAddress('einsteinalbert823@gmail.com', 'Recipient Name'); // Recipient email and name

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = $emailMessage;

        if ($mail->send()) {
            echo 'Message has been sent successfully';
            header("Location:conn1.php"); // Redirect to the desired page after sending the email
            exit;
        } else {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
   
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-GLhlTQ8iZS+9Lh8KGDeKnG5QkFF0URgPiWceomFkL5Cv5N2kwwxI1KGPVIUn7Zi6" crossorigin="anonymous">
   
      
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <title>About</title>
  <style>
    body {
      background: white;
      font-family: 'Arial', sans-serif;

    }

    .navbar {
        z-index: 2;
    }

    .navbar-brand img {
        width: 50%;
        max-width: 150px;
    }

    @media (max-width: 768px) {
        .navbar-brand img {
            max-width: 50px;
        }

        .nav-item img {
            max-width: 30px;
        }
    }

    .navbar-toggler {
        background-color:white;
    }

    .navbar-toggler-icon {
        border: none;
        display:block;
    }

    .navbar-nav {
        margin-right: 100px;
    }

    .navbar-nav .nav-link {
        color: transparent;
    background: black;
    -webkit-background-clip: text; /* For Safari/Chrome/iOS */
    background-clip: text;
        margin-right: 50px;
        font-size: 18px;
        text-align:center;
        font-weight:bold;
        
    }

    .navbar-nav .nav-link:hover {
        text-decoration: underline;
        color: white;
    }


    .bg-light-custom {
      border-radius: 40px;
      background-color: darkgrey;
    }

    

    
    .responsive-div {
            width: 90%;
            max-width: 100%; /* Ensures the div doesn't exceed 100% of the parent container */
            margin: 0 auto;  /* Centers the div horizontally */
            background-color: white; /* Optional: Set a background color for visibility */
            overflow:hidden;
            text-align:center;
            margin-top:-2%;
           
            /* Optional: Add padding for content spacing */
        }

        .responsive-div1 {
            width: 90%;
            max-width: 100%; /* Ensures the div doesn't exceed 100% of the parent container */
            margin: 0 auto;  /* Centers the div horizontally */
            background-color: white; /* Optional: Set a background color for visibility */
            padding: 20px;
            margin-top:2%; 
            overflow:hidden;
            text-align:center;
            border-radius:10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            
            /* Optional: Add padding for content spacing */
        }
   
    /* Custom CSS for responsive background */
    .col-12.col-md-8 {
      background-color: #3498db; /* Replace with your desired background color */
      /* You can also use background-image, background-size, etc. for background image */
      padding: 20px; /* Add padding for better visibility */
      color: #fff; /* Set text color to be visible on the background */
    }


    .container12 {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        
        }

        .form-group {
            margin-bottom: 30px;

        }

 

        .input,  textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid darkgrey;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 20px;
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
                width: 100%;
                margin-right: 2%;
            }
        }

        @media (max-width: 600px) {
            .container12 {
                width: 100%;
                margin: 10px auto;
                padding: 5px;
                
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
        }



/*footer*/
    .image-container5 {
            width: 100%;
            height: auto; /* Adjust the height as needed */
            /* Grey background color */
             /* Border radius */
            overflow: hidden;
            margin-bottom: 10px;
            padding-top:2%;
            margin-top:20%;
           
        }

        .image-container5 img {
            width: 100%;
           
            height: 70%;
            object-fit: cover; /* Maintain aspect ratio and cover container */
        }

        @media (max-width: 576px) {
        h5 {
            font-size: 10px !important;
        }

        .small-text {
            font-size: 10px !important;
        }
    }

    .btn {
    font-size: 2vw;
    background-color:darkblue;
    border:1px solid darkblue;
    border-radius:50px;
    padding-left:30px;
    padding-right:30px;
}

h1 {
  margin-top:-3%;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
.h2-responsive,
.h1-responsive {
    margin-top:10%;
    text-align:left;
    margin-left:5%; /* For better language support */
}

.h5-responsive {
    text-align:left;
    margin-left:5%;
    


}

.register-btn {
      display: flex;
      margin-left:10px;
      align-items: center;
      justify-content: center;
      padding: 5px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      color: white;
      background: black; 
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .register-btn:hover {
       background:darkblue;
      color: white;
    }

    .icon {
      margin-right: 10px;
    }

    @media screen and (max-width: 700px) {
    
    .register-btn {
        font-size: 12px;
       width:100px;
       height:30px; /* Adjust the font size for small devices */
    }

}


/* Apply the animation to your images */
.img-fluid {
  animation: fadeIn 1.5s ease-in-out; /* Adjust the duration and timing function as needed */
}

@media (max-width: 576px) {
  h1 {
    font-size: 20px; /* Adjust the font size as needed for h1 on small screens */
  }

  h2 {
    font-size: 20px; /* Adjust the font size as needed for h3 on small screens */
  }

  .h5-responsive {
   font-size:14px;
   margin-top:-5%;


}

.h2-responsive {
    margin-top:-5%;
}


  /* Additional styles for other elements if needed */
}

/* Existing styles */

/* Additional styles for small screens */
@media (max-width: 576px) {
    .col-md-5,
    .col-md-7 {
        width: 100%;
        margin: 0; 
        padding:0;/* Remove default margins */
    }

    .col-md-5 img,
    .col-md-7 {
        order: 2;
        margin-bottom: 10px; /* Adjust the margin as needed */
    }

    .col-md-7 {
        margin-top: -20px; /* Adjust the margin as needed */
    }

    .h1-responsive,
    .h3-responsive {
        margin-bottom: -10px; /* Adjust the margin as needed */
    }
}

.child-div4 {
            width: 80%; /* Three child divs in a horizontal layout, each taking 30% width */
            box-sizing: border-box; /* Include padding and border in the width */
            float: left; /* Float the child divs to create a horizontal layout */
            padding: 10px;
            padding-bottom:1px; /* Optional: Add padding for content spacing */
            background-color: white; /* Optional: Set a background color for visibility */
            margin: 1%; 
            text-align:center;
            margin-left:10%;
            border:1px solid lightgrey;
            border-radius:10px;
            color:  #FFA500;
            /* Optional: Add margin for spacing between child divs */
        }

        .child-div4 img {
            max-width: 95%; 
            height: auto; 
            border-radius: 4%;
            margin-top:2%;
            margin-bottom:2%;
            
        }


        .child-div5 {
    width: 15%; /* Three child divs in a horizontal layout, each taking 20% width */
    box-sizing: border-box; /* Include padding and border in the width */
    float: left; /* Float the child divs to create a horizontal layout */
    padding: 10px;
    padding-bottom: 1px; /* Optional: Add padding for content spacing */
    background-color: white; /* Optional: Set a background color for visibility */
    margin: 2%;
    text-align: center;
    margin-left: 1%;
    border: 1px solid lightgrey;
    border-radius: 10px;
    padding-bottom:1%;
    color: #FFA500;
    height: 100px; /* Fixed height for all child divs, adjust as needed */
    overflow: hidden;
    text-align:center; /* Ensure consistent size and hide overflow if necessary */
}

.child-div5 img {
    width: 100%;
    height: 100%; /* Ensure the image takes up 100% of the container height */
    object-fit: cover; /* Maintain aspect ratio and cover container */
    border-radius: 5px;
    
}

.coverage {
  width:100%;
   margin-left:15%;
   overflow:hidden;
}

@media screen and (max-width: 700px) {
.child-div5  {
  width:23%;
  height:40px;
  padding:0px;
  margin:1%;
  border-radius:5px;

}

.coverage {
  width:100%;
   margin-left:0%
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

.username1 {
    padding:0px;
    position:absolute;
    margin-left:78%;
    width:13%;
    margin-top:0%;
    color:orange;
    display:block;
    overflow:hidden;
}


@media (max-width: 968px) {
.username1 {
    display:none;
    
}

}


 



       

       

  </style>
</head>

<body>
<section id="navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./buraq/buraqlogo.png" class="img-fluid" alt="Logo" style="position:absolute; margin-top:-20px">
                </a>
                <h6 class="username1"><i class="fas fa-user"></i> <?php echo $userName; ?></h6>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-5 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./buraq.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about.php">About Us</a></li>
<li class="nav-item"><a class="nav-link" href="./clients.php">Jobs ▼</a></li>
<li class="nav-item"><a class="nav-link" href="./vacancy.php">Contacts</a></li>

                        
<?php if ($isLoggedIn): ?>
        <!-- If user is logged in, show the logout link -->
        <li class="nav-item">
            <a href="logout1.php" class="register-btn">
                <i class="icon fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
        
    <?php else: ?>
        <!-- If user is not logged in, show the login link -->
        <li class="nav-item">
           


            <select class="register-btn" style="background-color: black" onchange="redirectOnChange(this)">
            <option disabled selected>Login</option>
            <a href="login.php">
    <option data-icon="▼"> User</option></a>
    <a href="login1.php">
    <option data-icon="▼"> Admin</option> </a>
</select>

        </li>
    <?php endif; ?>

  

        <br>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <br>
    <br>
    <br>

    <h1 style="text-decoration: underline; text-align: center; color: darkpurple">CONTACT US</h1>
<br>
<div class="responsive-div">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5 ">
            <h2 class="h2-responsive" style="color:black">Let's talk an something <span style="color:orange">great </span>together
            </h2> 
            <br>
            <p class="h5-responsive" style="color:#444444;"><i style="color:#FFA500" class="fas fa-map-marker-alt"></i> 30, 2nd Floor, Satellite Complex Koppikar Rd J C Nagar, New Hubli Hubballi, Karnataka 580020
            </p>
            <br>
            <p class="h5-responsive" style="color:#444444;"><i style="color:#FFA500" class="fa fa-envelope"></i> Buraq@gmail.com
            </p>
            <br>
            <p class="h5-responsive" style="color:#444444;"><i style="color:#FFA500" class="fa fa-phone"></i> 91-9909289833
             </p>
             <br>
             <h4 style="text-decoration:underline">Locate Us</h4>

 <iframe
  width="400"
  height="200"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3868.935338627864!2d75.10472361484334!3d15.355153489158791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdce4a057e03b2b%3A0x3e0a2a9c37a0d235!2s33%2C%203rd%20floor%2C%20satellite%20complex%20koppikar%20road%2C%20huballi-586020%2C%20Karnataka%2C%20India!5e0!3m2!1sen!2sus!4v1642799542240!5m2!1sen!2sus" allowfullscreen>
</iframe>

            </div>
      
            <div class="col-md-1"></div>

            <div class="col-md-6 ">
                
                    <div class="container12">
                    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      
        <input type="text" name="FirstName" class="input" placeholder="First Name" required>
    </div>

    <div class="form-group">
        <input type="text" name="LastName" class="input" placeholder="Last Name" required>
    </div>

    <div class="form-group">
        <input type="email" name="Email" class="input" placeholder="Email " required>
    </div>

    <div class="form-group">
        <!-- Increase the number of rows for the textarea -->
        <textarea name="Message" class="input" placeholder="Message" rows="5" required></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Submit" style="background-color:darkblue">
    </div>
    
</form>

                    
                </div>
            </div>
        </div>
    </div>
</div>




    
<br>
    <footer class="text-black" style="background-color: #f2f2f2; box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5); ">
    <div class="container" >
        <div class="row" style="text-align:left">
            <div class="col-3">
                <a class="navbar-brand" href="#">
                    <img src="./buraq/buraqlogo.png" class="img-fluid" alt="Logo" style="position: absolute; margin-top:20%">
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
                    <h5 style="color: black; font-size: 18px; margin-top:0% " class="image-container5"><i style="color:yellow" ></i> #33, 3rd Floor, Satellite Complex, Koppikar Road, HUBLI-580 020. Karnataka, INDIA</h5>
                    <h5 style="color: black; font-size: 18px; margin-top:0% " class="image-container5"><i style="color:#FFA500" class="fa fa-envelope"></i> buraq@gmail.com</h5>
                    
                    <h5 style="color: black; font-size: 18px; margin-top:0%" class="image-container5"><i style="color:#FFA500" class="fa fa-phone"></i> +919845120154</h5>
                    
            </div>
        </div>
    </div>

    <div class="text-center ">
        <h5 style="font-size: 16px; padding: 10px;"> Copyright Buraq &copy; 2023 | All rights reserved | developed by <span style="color:#FFA500">Orbit technologies</span></h5>
    </div>

    
</footer>




  



<script>
    function redirectOnChange(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        if (selectedOption === "User") {
            window.location.href = "login.php";
        } else if (selectedOption === "Admin") {
            window.location.href = "login1.php";
        }
    }
</script>


  <!-- Bootstrap JS and Popper.js (optional) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 
</body>

</html>


