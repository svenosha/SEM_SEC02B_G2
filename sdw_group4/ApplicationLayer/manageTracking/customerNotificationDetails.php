<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $orderID = $_GET['orderID'];
    $notification = new manageTrackingController();
    $data = $notification->viewCustomerOrderDetails($orderID);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Delivery Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
                padding-top: 5px;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageOrder/customerHomePage.php?spID=<?=$_SESSION['custID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/customerProfile.php?spID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Delivery Details</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table>
                    <tr>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <?php foreach($data as $row){ ?>
                        <td><?=$row['itemname']?></td>
                        
                    </tr>
                    <tr>
                        <td width="150"><center><b>Delivery Status</b></center></td>
                        
                            <td style="text-align: center;" >
                                <?php 
                                    if($row['status'] == 2){
                                        echo "Order has been accepted by service provider";
                                        echo "<br />";
                                        echo "Order has been pickup by runner";
                                    }
                                    else if($row['status'] == 3){
                                        echo "Order has been accepted by service provider";
                                        echo "<br />";
                                        echo "Order has been pickup by runner";
                                        echo "<br />";
                                        echo "Delivery Successful! Enjoy!";
                                    }
                                    else if($row['status'] == 4){
                                        echo "Order has been rejected by service provider";
                                        echo "<br />";
                                        echo "Will be refund ASAP!";
                                    }
                                    else if($row['status'] == 7){
                                        echo "Order has been accepted by service provider";
                                        echo "<br />";
                                        echo "Order has been pickuped by runner";
                                        echo "<br />";
                                        echo "Delivery Fail! Will be refund ASAP!";
                                    }
                                    else if($row['status'] == 1){
                                        echo "Order pending accept by service provider.";
                                    }
                                ?>
                            </td>
                        </form>
                        <?php } ?>
                    </tr>
                </table>
            </div>
    </center>
    </body>
</html>