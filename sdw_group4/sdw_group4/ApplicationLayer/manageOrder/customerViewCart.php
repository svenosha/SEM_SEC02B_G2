<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';

    session_start();

    $service = new manageOrderController();
    $data = $service->viewOrder();

    if(isset($_POST['delete'])){
        $service->delete();
    }

    if (isset($_POST['update'])) {
        $service->updateOrder();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer View Cart</title>
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
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Customer View Cart</h3>
        <br><br>

            <div style="margin-left: 1.5em;">
                
                <table border="1">
                    <tr>
                        
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="100"><center><b>Quantity</b></center></td>
                        <td width="100"><center><b>Subtotal (RM)</b></center></td>
                        <td width="200"><center><b>Action</b></center></td>
                    </tr>
        
                        <?php foreach($data as $row){ 
                            $subtotal = $row["itemquantity"]*$row["itemprice"]; ?>
                            
                        <form action="" method="POST">
                            <tr>
                                <td><input type="text" name="itemname" value="<?=$row['itemname']?>" class="noborder" readonly></td>
                                <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="noborder" readonly></td>
                                <td><input type="number" name="itemquantity" value="<?=$row['itemquantity']?>" class="noborder" style="width: 3em;"></td>
                                
                                <td>
                                    <input type="text" name="subtotal" value="<?=number_format($subtotal,2); ?>" id="subtotal" style="width: 5em;" class="noborder" readonly>
                                </td>
                                <td style="text-align: center;">
                                    <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                    &nbsp;<button type="submit" name="delete" onclick="return confirm('Are you sure to delete?');"><img src="Image/deleteicon.png" alt="deleteicon" width="40px" height="40px"></button>
                                    &nbsp;<button type="submit" name="update" onclick="return confirm('Do you want to update the selected row data.');"><img src="Image/updateicon.png" alt="updateicon" width="40px" height="40px"></button>
                                </td>
                            </tr>
                        </form>
                        <?php } ?>
                </table>
            </div>
        <form action="" method="POST">
            <div style="text-align: center;">
                <br><br>
                <button name="checkout" class="btn btn-primary"><a href="../managePayment/paymentCheckout.php?custID=<?=$_SESSION['custID']?>" style="text-decoration: none; color: white;">Check Out</a></button>
            </div>
        </form> 
        </center>      
    </body>
</html>