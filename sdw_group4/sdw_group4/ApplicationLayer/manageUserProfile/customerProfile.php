<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $custID = $_GET['custID'];

    $user = new manageUserProfileController();
    $data = $user->viewCust($custID); 

    if(isset($_POST['update'])){
        $user->updateCust();
    }

    if(isset($_POST['delete'])){
        $user->deleteCust($custID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Profile</title>
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
            <a href="../manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Customer Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                    $_SESSION['custID']=$row['custID'];
                ?>
                <table>
                    <tr>
                        <td>Username:&emsp;</td>
                        <td><input type="text" name="custusername" value="<?=$row['custusername']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Phone Number:&emsp;&emsp;</td>
                        <td><input type="text" name="custhpnumber" value="<?=$row['custhpnumber']?>" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="custemail" value="<?=$row['custemail']?>" required></td>
                    </tr>
                    <tr>
                        <td>Delivery Line 1:</td>
                        <td><input type="text" name="custaddress1" value="<?=$row['custaddress1']?>" required></td>
                    </tr>
                    <tr>
                        <td>Delivery Line 2:</td>
                        <td><input type="text" name="custaddress2" value="<?=$row['custaddress2']?>" required></td>
                    </tr>
                    <tr>
                        <td>Delivery Line 3:</td>
                        <td><input type="text" name="custaddress3" value="<?=$row['custaddress3']?>" required></td>
                    </tr>
                    <tr>
                        <td>Delivery Line 4:</td>
                        <td><input type="text" name="custaddress4" value="<?=$row['custaddress4']?>" required></td>
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