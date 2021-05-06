<?php
    require_once '../../BusinessLayer/controller/manageServiceController.php';

    session_start();


    $serviceID = $_GET['serviceID'];
    $item = new manageServiceController();
    $data = $item->viewItem($serviceID);

    if(isset($_POST['update'])){
        $item->update();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Good Update</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <script>
            var loadFile = function(event){
                var image = document.getElementById('imageOut');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <style>
             td {
                padding-top: 15px;
                padding-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./serviceProviderHomePage.php"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>

            <div class="topnav-right">
                <a href="./serviceProviderProfile.php"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Service Update</h3>
        <br><br>

        <form name="myForm" action="" method="POST" enctype="multipart/form-data">
            <div style="margin-left: 1.5em;">
            <?php foreach($data as $row){ ?>
            <table>
                <tr>
                    <td>Service Type:&emsp;&emsp;</td>
                    <td>
                        <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                        <select id="servicetype" name="servicetype">
                            <option value="" selected></option>
                            <option value="Good">Good</option>
                            <option value="Food">Food</option>
                            <option value="Pet">Pet</option>
                            <option value="Medical">Medical</option>
                        </select>
                    </td>
                    <td><div style="color: red">&emsp;*Refill</div></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Item Name:</td>
                    <td><input type="text" name="itemname" value="<?=$row['itemname']?>" required></td>
                </tr>
                <tr>
                    <td>Unit Price (RM):&emsp;</td>
                    <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" required></td>
                </tr>
                <tr>
                    <td>Item Image:&emsp;&emsp;</td>
                    <td><img src="<?=$row['itemimage']?>" width="95px" height="95px" border="1px solid black" style="margin-top: 2px;"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right"><button type="submit" name="update" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Update Service</button></td>
                </tr>
            </table>
            <?php } ?>
            </div>
        </form>
      </center>  
    </body>
</html>