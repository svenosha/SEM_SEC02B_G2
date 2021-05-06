<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';

    session_start();
    
    $service = new manageOrderController();
    $data = $service->viewMedical();

    if(isset($_POST['addtocart'])){
        $service->addCart();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer View Medical</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotocart {
                position: fixed;
                right: 25px;
                bottom: 15px;
                background-color: red;
                border-radius: 50%;
            }

            input {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Customer View Medical Service</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="1">
                    <tr>
                        <td><center><b>Item Image</b></center></td>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="100"><center><b>Quantity</b></center></td>
                        <td width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                        <td><img src="<?=$row['itemimage']?>" width="150px" height="150px" style="margin-top: 4px; margin-left: 4px; margin-bottom: 4px; margin-right: 4px;"></td>
                        <td><input type="text" name="itemname" value="<?=$row['itemname']?>" class="noborder"></td>
                        <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="noborder"></td>
                        <td><input type="number" name="itemquantity" value="1" style="width: 3em;"></td>
                        <td style="text-align: center;">
                            <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                            &nbsp;<button type="submit" name="addtocart" onclick="return confirm('Confirm add to cart?');"><img src="Image/addtocarticon.png" alt="addtocarticon" width="40px" height="40px"></button>
                        </td>
                    </form>
                    <?php } ?>
                    </tr>
                </table>
                <div class="gotocart">
                    <a href="./customerViewCart.php?custID=<?=$_SESSION['custID']?>"><img src="Image/gotocarticon.png" alt="gotocart" width="70px" height="70px"></a>
                </div>
            </div>
    </center>
    </body>
</html>