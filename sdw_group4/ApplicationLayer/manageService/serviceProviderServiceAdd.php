<?php
    require_once '../../BusinessLayer/controller/manageServiceController.php';

    session_start();

    $item = new manageServiceController();

    if(isset($_POST['add'])){
        $item->add();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Service Add</title>
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

            function displayFile(){
                var x = document.getElementById("itemimage").files[0];
                var y = x.name;

                document.myForm.imagename.value = y;
            }
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
            <a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>

            <div class="topnav-right">
                <a href="../manageUserProfile/serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Service Provider Service Add</h3>
        <br><br>

        <form name="myForm" action="" method="POST" enctype="multipart/form-data">
            <div style="margin-left: 1.5em;">
            <table>
                <tr>
                    <td>Service Type:</td>
                    <td>
                        <select id="servicetype" name="servicetype">
                            <option value="" selected></option>
                            <option value="Good">Good</option>
                            <option value="Food">Food</option>
                            <option value="Pet">Pet</option>
                            <option value="Medical">Medical</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Item Name:</td>
                    <td><input type="text" name="itemname" required></td>
                </tr>
                <tr>
                    <td>Unit Price (RM):</td>
                    <td><input type="text" name="itemprice" required></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Item Image:&emsp;&emsp;</td>
                    <td><image id="imageOut" width="95px" height="95px" border="1px solid black" style="margin-top: 2px;"></image></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="button" value="Select File" onclick="document.getElementById('itemimage').click()">
                        <input type="file" id="itemimage" name="itemimage" accept="image/*" onchange="loadFile(event)" style="display: none">
                        &emsp;&emsp;
                    </td>
                    <td><input type="text" name="imagename" placeholder="Photo.png" size="15">&emsp;&emsp;</td>
                    <td><input type="button" value="Upload Photo" accept="image/*" onclick="displayFile()" onchange="loadFile(event)"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right"><button type="submit" name="add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add</button></td>
            </table>
            </div>
        </form>
    </center> 
    </body>
</html>