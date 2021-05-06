<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $spID = $_GET['spID'];

    $user = new manageUserProfileController();
    $data = $user->viewSP($spID); 

    if(isset($_POST['update'])){
        $user->updateSP();
    }

    if(isset($_POST['delete'])){
        $user->deleteSP($spID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Profile</title>
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
            <a href="../manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Service Provider Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                    $_SESSION['spID']=$row['spID'];
                ?>
                <table>
                    <tr>
                        <td>Username:&emsp;</td>
                        <td><input type="text" name="spusername" value="<?=$row['spusername']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Phone Number:&emsp;&emsp;</td>
                        <td><input type="text" name="sphpnumber" value="<?=$row['sphpnumber']?>"required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="spemail" value="<?=$row['spemail']?>"required></td>
                    </tr>
                    <tr>
                        <td>Company Name:</td>
                        <td><input type="text" name="spcompanyname" value="<?=$row['spcompanyname']?>"required></td>
                    </tr>
                    <tr>
                        <td>Address Line 1:</td>
                        <td><input type="text" name="spaddress1" value="<?=$row['spaddress1']?>"required></td>
                    </tr>
                    <tr>
                        <td>Address Line 2:</td>
                        <td><input type="text" name="spaddress2" value="<?=$row['spaddress2']?>"required></td>
                    </tr>
                    <tr>
                        <td>Address Line 3:</td>
                        <td><input type="text" name="spaddress3" value="<?=$row['spaddress3']?>"required></td>
                    </tr>
                    <tr>
                        <td>Address Line 4:</td>
                        <td><input type="text" name="spaddress4" value="<?=$row['spaddress4']?>"required></td>
                    </tr>
                    <tr>
                        <td>Bank Type:</td>
                        <td><input type="text" name="spbanktype" value="<?=$row['spbanktype']?>"required></td>
                    </tr>
                    <tr>
                        <td>Bank Account Number:</td>
                        <td><input type="text" name="spbankaccountnumber" value="<?=$row['spbankaccountnumber']?>"required></td>
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