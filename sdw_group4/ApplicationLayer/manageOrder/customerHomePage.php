<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotoreceipt {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./customerHomePage.php?custID=<?=$_SESSION['custID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>

            <div class="topnav-right">
            <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>

        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Customer Home Page</h3>

        <h1 style="text-align: center; margin-top: 5%;">Please select your desired service:</h1>
        <br><br>
        
        <div class="row" style="text-align: center;">
            <div class="col-sm-3"><a href="./customerViewGood.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/goodicon.png" width="120px" height="80px"></a></div>
            <div class="col-sm-3"><a href="./customerViewFood.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/foodicon.png" width="120px" height="80px"></a></div>
            <div class="col-sm-3"><a href="./customerViewPet.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/peticon.png" width="120px" height="80px"></a></div>
            <div class="col-sm-3"><a href="./customerViewMedical.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/medicalicon.png" width="120px" height="80px"></a></div>
        </div>

        <div class="row" style="text-align: center;">
            <div class="col-sm-3"><a href="./customerViewGood.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>GOOD</h4></a></div>
            <div class="col-sm-3"><a href="./customerViewFood.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>FOOD</h4></a></div>
            <div class="col-sm-3"><a href="./customerViewPet.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>PET</h4></a></div>
            <div class="col-sm-3"><a href="./customerViewMedical.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>MEDICAL</h4></a></div>
        </div>
        <br><br><br>
        <div class="row" style="text-align: center;">
            <div class="col-sm-6"><a href="../../ApplicationLayer/manageTracking/customerNotification.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/serviceprovidernotificationno.png" alt="notificationicon" width="70px" height="70px"></a></div>
            <div class="col-sm-6"><a href="../../ApplicationLayer/managePayment/paymentOrderedList.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><img src="Image/reporticon.png" alt="receipticon" width="70px" height="70px"></a></div>
        </div>

        <div class="row" style="text-align: center;">
            <div class="col-sm-6"><a href="../../ApplicationLayer/managePayment/paymentOrderedList.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>NOTIFICATION</h4></a></div>
            <div class="col-sm-6"><a href="../../ApplicationLayer/managePayment/paymentOrderedList.php?custID=<?=$_SESSION['custID']?>" style="color: black; text-decoration: none;"><h4>MY ORDERS</h4></a></div>
        </div>
    </body>
</html>