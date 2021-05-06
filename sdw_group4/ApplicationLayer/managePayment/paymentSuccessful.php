<?php
require_once '../../BusinessLayer/controller/managePaymentController.php';


session_start();


$notification1 = new managePaymentController();


//clear cust cart
$notification1->updateCart();

?>
<html>
    <head>
        <title>Payment Success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            body {
                text-align: center;
                margin-top: 20%;
            }
        </style>
    </head>
<body>
    <h1>Payment Success!</h1>
    <br><br><br>
    <h3>Click OK<h3>
    <button class="btn btn-primary"><a href="../../ApplicationLayer/manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>" style="color: white;">OK</a></button>
</body>
</html>