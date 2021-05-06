<?php
require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';
$user = new manageLoginAndRegisterController();

if(isset($_POST['login'])){
    $user->spLogin();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

            .loginBtn {
                background-color: rgb(140, 140, 175);
                color: white;
                padding: 10px 10px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .loginBtn:hover {
                opacity: 1;
            }

            .showPwd {
                font-size: medium;
                padding-top: 5px;
                text-align: right;
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

    <script>
        function showPassword() {
            var x = document.getElementById("password");
    
            if(x.type === "password"){
                x.type = "text";
            } 
            else{
                x.type = "password";
            }
        }
    </script>

    <body>
        <div class="header">
            <a href="userLogin.php"><img src="Image/logo.jpg" alt="Logo" height="250px"></a>
            <br><label style="font-size: 25px;">Beep Beep</label>
        </div>

        <br>
        <p><strong>Login as Service Provider</strong>:</p>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spusername" placeholder="Username" required>
                    </div>
                    <br>
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="sppassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                    <br>
                    <button type="submit" name="login" class="loginBtn"><label style="font-size: larger;">Log In</label></button>
                </div>  
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: medium;">
            Don't have an account? <a class="register" href="./serviceproviderRegister.php"><u>Register here</u></a>.
        </div>
    </body>
</html>