<?php
    require_once '../../BusinessLayer/controller/managePaymentController.php';
    require_once '../../BusinessLayer/controller/manageOrderController.php';
    session_start();
    
    $payment = new managePaymentController();
    $service = new manageOrderController();
    $data = $payment->viewOrdered();

    if(isset($_POST['reorder'])){
        $service->addCart();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Past Orders</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            tr {
                background-color: snow;
            }

            td {
                text-align: center;
                padding-top: 15px;
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
            <a href="../../ApplicationLayer/manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Past Orders</h3>
        <br><br>
        <div style="margin-left: 1.5em; margin-right: 1.5em;">

            <table>
                <tr>
                    <td width="150"><center><b>Item Name</b></center></td>
                    <td width="150"><center><b>Unit Price</b></center></td>
                    <td width="150"><center><b>Payment Time</b></center></td>
                    <td width="150"><center><b></b></center></td>
                </tr>
                    <?php 
                        foreach($data as $row){ 
                    ?>
                    <form action="" method="POST">
                    
                        <tr>
                            <td><input type="hidden" name="itemname" value="<?=$row['itemname']?>" class="noborder" readonly><?=$row['itemname']?></td>
                            <td><input type="hidden" name="itemprice" value="<?=$row['itemprice']?>" class="noborder" readonly><?=$row['itemprice']?></td>
                            <td><?=$row['time']?></td>
                            <td>
                                <input type="hidden" name="itemquantity" value="1">
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                <button type="submit" name="reorder" class="btn-info" onclick="return confirm('Confirm Reorder?');">REORDER</button>
                            </td>
                        </tr>
                    
                    </form>
                    <?php } ?>
            </table>
        </div>  
        </center>     
    </body>
</html>

