<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';

    session_start();

    $serviceID = $_GET['serviceID'];
    
    $service = new manageOrderController();
    $data = $service->viewProductDetail($serviceID);

    
    if(isset($_POST['addtocart'])){
        $service->addCart();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Product Detail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: left;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotocart {
                position: fixed;
                right: 25px;
                bottom: 15px;
                background-color: red;
                border-radius: 50%;
            }

        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">View Product Detail</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="0">
                    <?php foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                        <td></td>
                        <td style="text-align: center;"><img src="<?=$row['itemimage']?>" width="300px" height="300px" style="margin-top: 4px; margin-left: 4px; margin-bottom: 4px; margin-right: 4px;"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: center; width: 80% "><h2><input type="text" name="itemname" value="<?=$row['itemname']?>" class="noborder" style="text-align: center; width: 100%; font-size: 24px;" readonly></h2></td>
                    </tr>
                    <tr>
                        <td><b>Unit Price(RM):</b></td>
                        <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="noborder" readonly></td>
                        
                    <tr>
                        <td><b>Quantity:</b></td>
                        <td><input type="number" name="itemquantity" value="1" style="width: 3em;"></td>
                        <td style="text-align: left;">
                            <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                            &nbsp;<button type="submit" name="addtocart" onclick="return confirm('Confirm add to cart?');"><img src="Image/addtocarticon.png" alt="addtocarticon" width="40px" height="40px"></button>
                        </td>
                    </tr>
                        <tr>
                        <td><b>Description:</b></td>
                        <td><textarea rows="4" cols="50" ><?=$row['itemdesc']?></textarea></td>
                        </tr>
                    </form>
                    <?php } ?>
                    </tr>
                </table>
                <div class="gotocart">
                    <a href="./customerViewCart.php?custID=<?=$_SESSION['custID']?>"><img src="Image/gotocarticon.png" alt="gotocart" width="70px" height="70px"></a>
                </div>
            </div>
    </center> 
    </body>
</html>