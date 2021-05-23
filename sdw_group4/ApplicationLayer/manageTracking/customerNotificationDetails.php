<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $notification = new manageTrackingController();
    $data = $notification->viewCustomer();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Notification</title>
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
            <a href="../../ApplicationLayer/manageOrder/customerHomePage.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/customerProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Order Notification</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table>
                    <tr>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="130"><center><b>Quantity</b></center></td>
                        <td width="200"><center><b>Status</b></center></td>
                        
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemprice']?></td>
                        <td><?=$row['itemquantity']?></td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                                <?php 
                                    if($row['status'] == 3){
                                        echo "Delivery Successful! Enjoy!";
                                    }
                                    else if($row['status'] == 7){
                                        echo "Delivery Fail! Will be refund ASAP!";
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