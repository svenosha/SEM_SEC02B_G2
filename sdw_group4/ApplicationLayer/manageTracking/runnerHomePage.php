<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $notification = new manageTrackingController();
    $data = $notification->viewRunner();

    if(isset($_POST['accept'])){
        $notification->addRunnerTrack();
        $notification->acceptRunner();
    }
    
    if(isset($_POST['reject'])){
        $notification->rejectRunner();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Runner Home Page</title>
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

            .gotoreport {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageTracking/runnerHomePage.php?runnerID=<?=$_SESSION['runnerID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/runnerProfile.php?runnerID=<?=$_SESSION['runnerID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Runner Notification</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <h4>Pending Order</h4>
                <table border="1">
                    <tr>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Quantity</b></center></td>
                        <td width="250"><center><b>Pick Up Address</b></center></td>
                        <td width="250"><center><b>Drop Off Address</b></center></td>
                        <td width="200"><center><b>Success Delivered?</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemquantity']?></td>
                        <td><?=$row['spcompanyname']?><br><?=$row['spaddress1']?><br><?=$row['spaddress2']?><br><?=$row['spaddress3']?><br><?=$row['spaddress4']?>
                        </td>
                        <td>
                            <?=$row['custusername']?><br><?=$row['custhpnumber']?><br><?=$row['custaddress1']?><br><?=$row['custaddress2']?><br><?=$row['custaddress3']?><br><?=$row['custaddress4']?>
                        </td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                                <input type="hidden" name="orderID" value="<?=$row['orderID']?>">
                                <input type="hidden" name="custID" value="<?=$row['custID']?>">
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                &nbsp;<button type="submit" name="accept" onclick="return confirm('Are you sure successful delivered to customer?');"><i class="fa fa-check" aria-hidden="true"></i></button>&nbsp;
                                &nbsp;<button type="submit" name="reject" onclick="return confirm('Are you sure unsuccessful delivered to customer?');"><i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;
                            </td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
            <div class="gotoreport">
                <a href="./runnerCommission.php?runnerID=<?=$_SESSION['runnerID']?>"><img src="Image/reporticon.png" alt="reporticon" width="70px" height="70px"></a>
            </div>
        </center>
    </body>
</html>