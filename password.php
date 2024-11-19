<?php
                session_start();
               
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Apply a simple reset to remove default margin and padding */
        body, h4, button, form, label, input {
            margin: 0;
            padding: 0;
        }

        /* Apply a box-sizing border-box to all elements for consistent sizing */
        * {
            box-sizing: border-box;
        }

        /* Style the login container */
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            text-align: center;
            margin-top: 10%;
        }

        /* Style the heading */
        h4 {
            margin-bottom: 20px;
        }

        /* Style the user button */
        button.user {
            background-color: #301934;
            color: #DAA520;
            padding: 10px 15px;
            margin-bottom: 10px;
            border: none;
            border-radius: 0px;
            cursor: pointer;
        }

        /* Style form groups */
        .form-group {
            text-align: left;
        }

        /* Style labels */
        label {
            font-weight: bold;
        }

        /* Style input container with relative positioning */
        .input-container {
            position: relative;
        }

        /* Style input fields */
        input {
            text-align:center;
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            background-color:lightgrey;
            border:1px solid lightgrey;
            left-padding:20px;
        }

        /* Style icons with absolute positioning */
        .input-container i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px; /* Adjust as needed for your design */
        }

        /* Style the login button */
        button[type="submit"] {
            background-color: #301934;
            color: #DAA520;
            padding: 10px 15px;
            border: none;
            border-radius: 0px;
            cursor: pointer;
        }

        /* Style error message */
        .error {
            color: red;
            margin-top: 10px;
        }

        /* Media query for responsiveness */
        @media screen and (max-width: 600px) {
            .login-container {
                max-width: 100%;
            }

            input {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h4>Update</h4>
        <button class="user">User Account</button>
        <br>
        <br>
        <form action="update.php" method="POST">
            <div class="form-group input-container">
                <label for="username"> Email address</label><br><br>
                <div class="input-container">
                    <input type="text" id="username" name="username" required>
                    <i class="fas fa-envelope"></i>
                </div>
            </div><br>
            <div class="form-group input-container">
                <label for="password"> Old Password</label><br><br>
                <div class="input-container">
                    <input type="password" id="password" name="password" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <div class="form-group input-container">
                <label for="password"> New Password</label><br><br>
                <div class="input-container">
                    <input type="password" id="password" name="newpassword" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <button type="submit" class="user">log in</button>

            <p>Back <a href="login1.php" style="text-decoration:none"><span style="color:red"> click here</span></a></p>
<?php
 if (isset($_SESSION["update_success"])) {
    echo '<p class="success">' . $_SESSION["update_success"] . '</p>';
    unset($_SESSION["update_success"]); 
}
if (isset($_SESSION["update_error"])) {
    echo '<p class="error">' . $_SESSION["update_error"] . '</p>';
    unset($_SESSION["update_error"]); 
}
?>
           
        </form>
    </div>
</body>

</html>
