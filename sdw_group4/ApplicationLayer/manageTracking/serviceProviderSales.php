<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $spID = $_SESSION['spID'];
    $notification = new manageTrackingController();
    $data = $notification->viewSPP($spID);
    $link = mysqli_connect("localhost", "root", "");
    if (!$link) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    mysqli_select_db($link, "sdw") or die(mysqli_error());
    $sql = "SELECT *, SUM(order1.itemquantity) AS total FROM `order1` inner join service on order1.serviceID = service.serviceID where status = 3 and spID = '$spID' GROUP BY order1.itemname ORDER BY order1.serviceID ASC";
    $count = mysqli_query($link,$sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Sales Report</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
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
            <a href="../../ApplicationLayer/manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Sales</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table>
                    <tr>
                        <td width="130"><center><b>Servie ID</b></center></td>
                        <td width="250"><center><b>Item Name</b></center></td>
                        <td width="200"><center><b>Unit Price (RM)</b></center></td>
                        <td width="230"><center><b>Quantity</b></center></td>
                        <td width="100"><center><b>Subtotal (RM)</b></center></td> 
                    </tr>
                    
                    <?php
                        $totalprice = 0;            
                        while($row = mysqli_fetch_array($count)){

                    ?>
                        <tr>
                        <td><?=$row['serviceID']?></td>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemprice']?></td>
                        <td><?=$row['total'] ?></td>
                    <?php
                        
                        $subtotal =  $row['total'] * $row['itemprice'];
                        echo "<td>$subtotal</td>";
                        echo "</tr>";
                        $totalprice = $totalprice + $subtotal;
                        }
                    ?>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>TOTAL PRICE</b></td>
                        <td><?php echo "$totalprice"; ?></td>
                    </tr>
                </table>
            </div>
            </center>
    </body>
</html>