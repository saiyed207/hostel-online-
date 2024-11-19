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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-GLhlTQ8iZS+9Lh8KGDeKnG5QkFF0URgPiWceomFkL5Cv5N2kwwxI1KGPVIUn7Zi6" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Home</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;

        background: rgb(233, 222, 222);
        position: relative;
        color: white;
        font-size: 40px;
    }

    @media (max-width: 768px) {
    body {
        font-size: 12px;
    }
}

    .navbar {
        z-index: 2;
    }

    .navbar-brand img {
        width: 50%;
        max-width: 150px;
    }

    .navbar-toggler {
        background-color:white;
    }

    .navbar-toggler-icon {
        border: none;
    }

    .navbar-nav {
        margin-right: 100px;
    }

    .navbar-nav .nav-link {
        color: transparent;
    background: white;
    -webkit-background-clip: text; /* For Safari/Chrome/iOS */
    background-clip: text;
        margin-right: 50px;
        font-size: 18px;
        font-weight: 400;
        text-align:center;
        font-weight:bold;
        
    }

    .navbar-nav .nav-link:hover {
        text-decoration: underline;
        color: white;
    }

    .content h3 {
        color: #4f6268;
        text-align: center;
        padding: 3%;
        font-size: 4vw;
        font-style: normal;
        font-weight: 500;
        line-height: 150%;
        margin-right: 50%;
        margin-top: -40%;
        border-radius: 20px;
        margin-left: 5%;
        background: rgba(255, 255, 255, 0.69);
        box-shadow: 4px 3px 9px 0px #2d2d2d;
    }

    .tech {
        color: #4f6268;
        text-align: center;
        font-family: Roboto Condensed;
        font-size: 5vw;
        font-style: normal;
        font-weight: 700;
        line-height: 100%;
    }

    #hero {
        position: relative;
        z-index: 1;
        margin-top: -18%;
    }

    #hero img {
        width: 100%;
        height: auto;
        
    }

    #hero::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     background: rgba(0, 20, 70, 0.7) url('buraq/buraqlogo.png') center/30% no-repeat;/* Blue transparent color */
     background-position: center 50%;
     animation: fadeIn 1.5s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

#hero-text {
    position: absolute;
    bottom: 18%; /* Adjust the distance from the bottom as needed, using a percentage */
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    font-size: 2vw; /* Responsive font size based on viewport width */
    z-index:2;
}

    .image-container {
        position: absolute;
        top: 65%;
        left: 80%;
        transform: translate(-50%, -50%);
        z-index: 3;
        display: flex;
        flex-direction: row; 
        justify-content:space-between;
        align-items: center;
        margin-top: 15%;
       /* Center the images horizontally */
    }

   

   .image-wrapper {
    flex: 1;
    text-align: center;
      margin-left:15%;

}

    .image-wrapper img {
        width: 50px; /* Adjust the size as needed */
        height: auto;
        border-radius: 50%;
        margin-bottom: 10px;
        cursor: pointer;
        opacity:0;
        transition: transform 0.3s ease-in-out;
        position: relative;
        animation: zoomIn 0.5s ease-out 1s forwards;
    }
    @keyframes zoomIn {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
        opacity:1;
    }
}

    .popup-message {
        position: absolute;
        color:black;
        background: rgba(255, 255, 255, 0.8);
        padding: 10px;
        border-radius: 20px;
        display: none;
        z-index: 999;
        white-space: nowrap;
        top: 0;
        left: 0;
        transform: translate(-100%, -50%);
    }

    .image-wrapper img:hover {
        transform: scale(1.2); /* Increase size on hover */
    }

    .image-wrapper img:hover + .popup-message {
        display: block;
    }

    @keyframes popUpAndDown {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-10px);
        }
    }

    @media (max-width: 768px) {
        .navbar-brand img {
            max-width: 50px;
        }

        .nav-item img {
            max-width: 30px;
        }
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


.responsive-div {
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

     

        .child-div {
    width: 27%;
    box-sizing: border-box;
    float: left;
    padding: 10px;
    background-color: white;
    margin: 1%;
    text-align: center;
    margin-left: 4%;
    border: 1px solid #FFA500;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    color: #FFA500;
    font-weight: bold;
   /* Initially set opacity to 0 */
   transition: transform 0.3s ease-in-out; /* Animation for fade-in effect */
}

.child-div:hover {
    transform: scale(1.1); /* Increase size on hover */
}


        .child-div img {
            max-width: 20%; 
            height: auto; 
            border-radius: 50%;
            margin-top:10%;
            margin-bottom:10%;
            
        }

        .child-div1 {
    display: flex; /* Use flexbox to create a horizontal layout */
    align-items: center; /* Center items vertically within the container */
    width: 40%; /* Adjust width as needed */
    box-sizing: border-box;
    margin: 5% auto; /* Center the container horizontally */
    padding: 10px;
    padding-right:15%;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    color: #FFA500;
    font-weight: bold;
    float:right;
    margin-right:13%;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.text-container {
    flex: 1; /* Allow the text container to take up the available space */
    text-align: left;
}


.child-div1 img {
    width: 20%;
    position: absolute; /* Position the image absolutely within the .child-div1 */
    right: 5%; /* Adjust this value based on how much you want the image to overflow */
    z-index: 1; /* Set a higher z-index for the image */
}


.child-div2 {
    display: flex; /* Use flexbox to create a horizontal layout */
    align-items: center; /* Center items vertically within the container */
    width: 40%; /* Adjust width as needed */
    box-sizing: border-box; /* Center the container horizontally */
    padding: 10px;
    padding-left:15%;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    color: #FFA500;
    font-weight: bold;
    float:left;
    margin-left:13%;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    
}

.text-container1 {
    flex: 1; /* Allow the text container to take up the available space */
    text-align:left;
}

.child-div2 img {
    width: 20%;
    position: absolute; /* Position the image absolutely within the .child-div1 */
    left: 5%; /* Adjust this value based on how much you want the image to overflow */
    z-index: 1; /* Set a higher z-index for the image */
}

h6 {
    padding:5%;
}
h4 {
    margin-top:3%;
}

.child-div1:hover,
.child-div2:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

.responsive-div1 {
           
            width: 100%;
            max-width: 100%; 
            background-color: white; 
            padding: 20px; 
            
            overflow:hidden;
            text-align:center;
            border-radius:10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top:35%;
            /* Optional: Add padding for content spacing */
        }


        @media screen and (max-width: 700px) {
            .responsive-div1 {
                margin-top:45%;
            }
            h2 {
                font-size: 1rem; /* Adjusted font size for h2 on smaller screens */
            }

            h4 {
                font-size: 0.5rem; 
                padding:0;
                margin-top:0%;/* Adjusted font size for h4 on smaller screens */
            }

            h6 {
                font-size: 0.3rem;
                padding:0;
                margin-top:0%; /* Adjusted font size for h6 on smaller screens */
            }

            .child-div {
            width: 30%;
            margin-left:1%;
            padding:0; 
        }

        .child-div1 {
            width: 50%;
            margin-right:8%;
            padding:2%;
            padding-right:20%;


        }

      

        .child-div2 {
            width: 50%;
            margin-left:10%;
            padding:2%;
            padding-left:20%;
            
        }

        

          
        }

        .child-div4 {
            width: 22%; /* Three child divs in a horizontal layout, each taking 30% width */
            box-sizing: border-box; /* Include padding and border in the width */
            float: left; /* Float the child divs to create a horizontal layout */
            padding: 10px;
            padding-bottom:1px; /* Optional: Add padding for content spacing */
            background-color: white; /* Optional: Set a background color for visibility */
            margin: 1%; 
            text-align:center;
            margin-left:2%;
            border:1px solid lightgrey;
            border-radius:10px;
            color:  #FFA500;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            
            /* Optional: Add margin for spacing between child divs */
        }

        .child-div4 img {
            max-width: 95%; 
            height: auto; 
            border-radius: 4%;
            margin-top:10%;
            margin-bottom:10%;
            border:1px solid lightgrey;
            height:150px;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            
        }

        @media screen and (max-width: 700px) {
           
            .child-div4 {
                width: 23%;
                padding:0px;
                margin-left:1%;
                
            }
            .child-div4 img {
            max-width: 100%;
            height:40px;
            }

            .child-div4 h4 {
            font-size:7px;
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

    @media (max-width: 768px) {

 
        
    .navbar-nav .nav-link {
        color: black !important;
        -webkit-background-clip: text; /* For Safari/Chrome/iOS */
        background-clip: text;
    }

    .navbar-nav .nav-link:hover {
        text-decoration: underline;
        color: black !important;
    }

   
}


.child-div4:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

.child-div4:hover img {
    transform: scale(1.1);
}

@keyframes slideIn {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
    }
}

#hero p {
    animation: slideIn 1s ease-out;
}

.username {
    padding:0px;
    position:absolute;
    margin-left:78%;
    width:13%;
    margin-top:-1%;
    color:orange;
    display:block;
    overflow:hidden;
}

.username1 {
   display:none;
}

@media (max-width: 968px) {
.username {
    display:none;
    
}


#hero-text {
    margin-bottom:-3%;
}


}

@media (max-width: 568px) {
.username1 {
    display:block;
    font-size:10px;
    
}
}
        


        

</style>

<body >
     <section id="navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./buraq/buraqlogo.png" class="img-fluid" alt="Logo" style="position:absolute; margin-top:-20px">
                </a>
                <h2 class="username1" ><i class="fas fa-user"></i> <?php echo $userName; ?></h2>
                <h6 class="username"><i class="fas fa-user"></i> <?php echo $userName; ?></h6>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-5 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./buraq.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about.php">About Us</a></li>
<li class="nav-item"><a class="nav-link" href="./clients.php">Jobs ▼</a></li>
<li class="nav-item"><a class="nav-link" href="./vacancy.php">Contacts</a></li>
<li class="nav-item"><a class="nav-link" href="./login1.php">Login</a></li>

                        


  

        <br>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


   

    <section id="hero">
        <div class="hey">
            <div class="row">
                <img src="./buraq/buraq.png" class="img-fluid" alt="Hero Image">
                
            </div>
             <div id="hero-text">
            <p class="govt">Approved by Govt of India Ministry of External Affairs</p>
        </div>

            <div class="image-container" style="width:20%">
                
               
                <div class="image-wrapper">
                    <img src="vacancies/instagram.jpg" alt="Image 2" class="img-fluid">
                    <div class="popup-message"></div>
                </div>
                <div class="image-wrapper">
                    <img src="vacancies/whatsapp.jpg" alt="Image 3" class="img-fluid">
                    <div class="popup-message"></div>
                </div>
                <div class="image-wrapper">
                    <img src="vacancies/facebook.png" alt="Image 4" class="img-fluid">
                    <div class="popup-message">
                   </div>
                </div>
            </div>

        </div>
    </section>

   
   
    <div class="responsive-div">
        <h2 style="color:black; font-weight:bold">We are human resources</h2>
            <h2 style="color:black; font-weight:bold;">consultancy service</h2>
            
            <h6 style="color:black; ">This is afak text please change it . This is developer afak text. Change according to your requirement</h6>
            
        <div class="child-div">
            <img src="buraq/message.png"/>
            <br>
            
            <h4 style="font-weight:bold">Our agency</h4>
            <h6 style="color:black; padding:5%">Our agency was found in .please write your self all these contents. if you want to write this name is here my name is afak. this is the great business</h6>
        </div>
        <div class="child-div">
            <img src="buraq/message.png"/>
            <br>
            <h4 style="font-weight:bold">Our services</h4>
            <h6 style="color:black; padding:5%">Our agency was found in .please write your self all these contents. if you want to write this name is here my name is afak. this is the great business</h6>
        </div>
        <div class="child-div">
            <img src="buraq/message.png"/>
            <br>
            <h4 style="font-weight:bold">Our comultants</h4>
            <h6 style="color:black; padding:5%">Our agency was found in .please write your self all these contents. if you want to write this name is here my name is afak. this is the great business</h6>
        </div>
        
    </div>


    <section>
    <div class="child-div1">
        <div class="text-container">
            <h4 style=" font-weight: bold">OUR VISION</h4>
            <h6 style="color: black;">Please write your self all these contents. If you want to write this name is here my name is afak. This is the great business</h6>
        </div>
        <img src="buraq/message.png" />
    </div>
</section>

<section>
    <div class="child-div2">
        <div class="text-container1">
            <h4 style=" font-weight: bold">OUR VISION</h4>
            <h6 style="color: black;">Please write your self all these contents. If you want to write this name is here my name is afak. This is the great business</h6>
        </div>
        <img src="buraq/message.png" />
    </div>
</section>
<br>
<br>

<div class="responsive-div1"  >
     <h2 style="color:#FFA500;text-align:left; margin-left:3%">TRUSTED BY</h2>
        <div class="child-div4">
            <img src="buraq/k.png" class="image"/>
            
            
            <h4 style="color:black">SAUDI ARAB</h4>
            
        </div>
        <div class="child-div4">
            <img src="buraq/qu.png " class="image"/>
            
            <h4 style="color:black">QATAR</h4>
            
        </div>
        <div class="child-div4">
            <img src="buraq/s.png" class="image"/>
            
            <h4 style=" color:black">OMAN</h4>
            
        </div>

        <div class="child-div4">
            <img src="buraq/o.png" class="image"/>
           
            <h4 style="color:black;">KUWAIT</h4>
            
        </div>
        
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



   
    

    <!-- Additional Sections -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
