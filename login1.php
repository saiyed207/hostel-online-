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
  <title>Hostel</title>
  <style>
    body {
      background: white;
      font-family: 'Arial', sans-serif;

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
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align:center;
        
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
            background-color: darkblue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width:90%;
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

.sign {
    color:darkblue;
    font-size:30px;
    font-weight:bold;
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

    .sign {
        font-size:20px;
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

footer {
    background-color: #f2f2f2;
     box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5); 
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
            footer {
                margin-top:17%;
            }
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
             margin-left:-30%;
             /* Adjust the height as needed */
            
           
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

@keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .buraqimg img {
            width: 100%;
            animation: slideIn 1.5s ease-out; /* Adjust the duration and timing function as needed */
        }

@media (max-width: 968px) {
.username1 {
    display:none;
    
}
.buraqimg {
    display:none;
}

}

.signup-section {
            background-color: #e0f7fa; /* Set your desired background color */
            padding: 1%;
            border-radius: 8px;
            text-align: center;
            width:90%;
            margin-left:5%;
        }



 



       

       

  </style>
</head>

<body>

 <BR>
 <BR>

<div class="responsive-div">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5 ">
    <div class="buraqimg" style="margin-top:-7%" >      
<img src="buraq/amogh2.png" width="100%"/>
    </div>
            </div>
      
            <div class="col-md-1"></div>
            <div class="col-md-6 ">
                    <div class="container12">

                    <form action="login_main.php" method="POST" enctype="multipart/form-data">
    <label class="sign">SIGN <span style="color: orange">IN</span></label>

    <div style="text-align: center;">
        <hr style="margin-top: 10px; margin-bottom: 10px; width: 15%; height: 2px; background-color: darkblue; display: inline-block;">
        <span style="display: inline-block; width: 1%;"></span>
        <hr style="margin-top: 10px; margin-bottom: 10px; width: 15%; height: 2px; background-color: orange; display: inline-block;">
    </div>

    <div class="form-group">
        <input type="email" name="username" class="input" placeholder="Email Address" required>
    </div>

    <div class="form-group">
        <input type="text" name="password" class="input" placeholder="Password" required>
    </div>

    <div class="form-group" style="display: flex; justify-content: space-between; align-items: center; padding:5%; padding-top:1%; padding-bottom:1%;">
        <label for="staySignedIn">
            <input type="checkbox" id="staySignedIn" name="staySignedIn"> Stay Signed In
        </label>

        <a href="forgot_password.html">Forgot Password?</a>
    </div>

    <div class="form-group">
        <input type="submit" value="Log In">
    </div>
</form>

<div class="signup-section">
    <p>Login to Hostel Management System</p>
</div>

                    
                </div>
            </div>
        </div>
    </div>
</div>




    





  



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


