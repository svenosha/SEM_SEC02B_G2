<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style> 
            p {
                font-size: 20px;
                text-align: center;
            } 

            a {
                color: inherit; 
            }

            a:hover {
                color : lightskyblue;
                text-decoration: none; 
                cursor: pointer;  
            }

            .register {
                color: blue;
            }

            .register:hover {
                color : rgb(0, 81, 255);
                text-decoration: none; 
                cursor: pointer;
                opacity: 0.9;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="Image/logo.jpg" alt="Logo" height="250px">
            <br><label style="font-size: 25px;">Beep Beep</label>
        </div>

        <br><br>
        <p>Please select your user type to <strong>LOGIN</strong>:</p>
        <br><br><br>

        <div class="row">
            <div class="col-sm-4"><center><a href="./customerLogin.php"><button class="noBtn"><i class='fas fa-user' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Customer</label></button></a></center></div>
            <div class="col-sm-4"><center><a href="./serviceproviderLogin.php"><button class="noBtn"><i class='fas fa-house-user' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Service Provider</label></button></a></center></div>
            <div class="col-sm-4"><center><a href="./runnerLogin.php" ><button class="noBtn"><i class='fas fa-motorcycle' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Runner</label></button></a></center></div>
        </div>

        <br><br>
        <div style="text-align: center; font-size: medium;">
            Don't have an account? <a class="register" href="./userRegister.php"><u>Register here</u></a>.
        </div>
    </body>
</html>