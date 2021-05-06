<?php
    require_once '../../BusinessLayer/controller/manageServiceController.php';
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $item = new manageServiceController();
    $data = $item->viewAll();

    if(isset($_POST['delete'])){
        $item->delete();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Service View</title>
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

            .gotonotification {
                position: fixed;
                right: 125px;
                bottom: 15px;
                border-radius: 50%;
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
            <a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/serviceproviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Service View</h3>
        <br><br>

            <div style="margin-left: 1.5em;">
                Do you want to add Service? &emsp; <a href="./serviceProviderServiceAdd.php?spID=<?=$_SESSION['spID']?>">Click Here</a>
                <br><br>

                <table border="1">
                    <tr>
                        <td><center><b>Item Image</b></center></td>
                        <td width="150"><center><b>Item Name</b></center></td>
                        <td width="130"><center><b>Unit Price (RM)</b></center></td>
                        <td width="130"><center><b>Service Type</b></center></td>
                        <td width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td><img src="<?=$row['itemimage']?>" width="150px" height="150px" style="margin-top: 4px; margin-left: 4px; margin-bottom: 4px; margin-right: 4px;"></td>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemprice']?></td>
                        <td><?=$row['servicetype']?></td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                                &nbsp;<button type="button" onclick="location.href='./serviceProviderServiceUpdate.php?serviceID=<?=$row['serviceID']?>'"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size: large;"></i></button>
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                &nbsp;<button type="submit" name="delete" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash" aria-hidden="true" style="font-size: large; color: red;"></i></button>&nbsp;
                            </td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
            <div class="gotonotification">
                <a href="../../ApplicationLayer/manageTracking/serviceProviderNotification.php?spID=<?=$_SESSION['spID']?>"><img src="Image/serviceprovidernotificationno.png" alt="gotocart" width="70px" height="70px"></a>
            </div>
            <div class="gotoreport">
                <a href="../../ApplicationLayer/manageTracking/serviceProviderSales.php?spID=<?=$_SESSION['spID']?>"><img src="Image/reporticon.png" alt="reporticon" width="70px" height="70px"></a>
            </div>
        </center>
    </body>
</html>