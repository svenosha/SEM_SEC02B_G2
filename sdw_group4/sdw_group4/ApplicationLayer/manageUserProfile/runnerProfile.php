<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $runnerID = $_GET['runnerID'];

    $user = new manageUserProfileController();
    $data = $user->viewRun($runnerID); 

    if(isset($_POST['update'])){
        $user->updateRun();
    }

    if(isset($_POST['delete'])){
        $user->deleteRun($runnerID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Runner Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                padding-top: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../manageTracking/runnerHomePage.php?runnerID=<?=$_SESSION['runnerID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./runnerProfile.php?runnerID=<?=$_SESSION['runnerID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Runner Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                    $_SESSION['runnerID']=$row['runnerID'];
                ?>
                <table>
                    <tr>
                        <td>Username:&emsp;</td>
                        <td><input type="text" name="runnerusername" value="<?=$row['runnerusername']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Phone Number:&emsp;&emsp;</td>
                        <td><input type="text" name="runnerhpnumber" value="<?=$row['runnerhpnumber']?>" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="runneremail" value="<?=$row['runneremail']?>" required></td>
                    </tr>
                    <tr>
                        <td>Vehicle Model:</td>
                        <td><input type="text" name="runnervehiclemodel" value="<?=$row['runnervehiclemodel']?>" required></td>
                    </tr>
                    <tr>
                        <td>Vehicle Plate Number:</td>
                        <td><input type="text" name="runnervehicleplatenumber" value="<?=$row['runnervehicleplatenumber']?>"required></td>
                    </tr>
                    <tr>
                        <td>Delivery City:</td>
                        <td><input type="text" name="runnercity" value="<?=$row['runnercity']?>"required></td>
                    </tr>
                    <tr>
                        <td>Bank Type:</td>
                        <td><input type="text" name="runnerbanktype" value="<?=$row['runnerbanktype']?>"required></td>
                    </tr>
                    <tr>
                        <td>Bank Account Number:</td>
                        <td><input type="text" name="runnerbankaccountnumber" value="<?=$row['runnerbankaccountnumber']?>"required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                        <br>
                            <button type="submit" class="btn btn-danger" name="delete">Delete Profile</button>&emsp;
                            <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
                        </td>
                    </tr>
                </table>
                <?php } ?>             
            </form>
        </div>
        </center>
    </body>
</html>