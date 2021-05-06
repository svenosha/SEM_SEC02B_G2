<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $notification = new manageTrackingController();
    $data = $notification->viewSP();

    if(isset($_POST['accept'])){
        $notification->acceptSP();
    }
    if(isset($_POST['reject'])){
        $notification->rejectSP();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Notification</title>
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
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/serviceproviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Incoming Order Notification</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="1">
                    <tr>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="130"><center><b>Quantity</b></center></td>
                        <td width="200"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemprice']?></td>
                        <td><?=$row['itemquantity']?></td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                &nbsp;<button type="submit" name="accept" onclick="return confirm('Are you sure to accept?');"><i class="fa fa-check" aria-hidden="true"></i></button>&nbsp;
                                &nbsp;<button type="submit" name="reject" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;
                            </td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
        </center>
    </body>
</html>