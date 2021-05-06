<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';
    require_once '../../BusinessLayer/controller/managePaymentController.php';
    session_start();

    $service = new manageOrderController();
    $data = $service->viewOrder();

    $service1 = new managePaymentController();
    if(isset($_POST['add'])){
        $service1->add();
    }
    $addressData = $service1->getAdd();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AZsNRTgEFaaoseMgYqd3BMUsEb9OTeFkkTX8ZmNYC5652wjkbSFfbUUwVN-KkLckK6GZMAuXoHImnfnR&currency=MYR">
            // Required. Replace SB_CLIENT_ID with your sandbox client ID.
        </script>
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

            input {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>

        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Payment Checkout</h3>
        <br><br>
        <div style="margin-left: 1.5em; margin-right: 1.5em;">

            <table border="1" class="table">
                <tr>
                    <td width="150"><center><b>Item Name</b></center></td>
                    <td width="130"><center><b>Unit Price (RM)</b></center></td>
                    <td width="100"><center><b>Quantity</b></center></td>
                    <td width="100"><center><b>Subtotal (RM)</b></center></td>
                    <td width="100"><center><b>Action</b></center></td>
                </tr>
    
                    <?php 
                        $totalprice=0;
                        $totalquantity=0;
                        $deliveryfee=3;
                        foreach($data as $row){ 
                        $subtotal = $row["itemquantity"]*$row["itemprice"]; 
                    ?>
                    <form action="" method="POST">
                        <tr>
                            <td><input type="text" name="itemname" value="<?=$row['itemname']?>" class="noborder" readonly></td>
                            <td><input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="noborder" readonly></td>
                            <td><input type="text" name="itemquantity" value="<?=$row['itemquantity']?>" style="width: 3em;" class="noborder"></td>
                            <td>
                                <input type="text" name="subtotal" value="<?=number_format($subtotal,2); ?>" id="subtotal" style="width: 5em;"  class="noborder" readonly>
                                <?php
                                    $totalquantity = $totalquantity + $row["itemquantity"];
                                    $totaldeliveryfee = $totalquantity * $deliveryfee;
                                    $totalprice = $totalprice + $subtotal;
                                    $totalpricedelivery = $totalprice + $totaldeliveryfee;
                                ?>
                                <input type="hidden" name="totalprice" value="<?=number_format($totalprice,2); ?>">
                            </td>
                            <td>
                                <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                <button type="submit" name="add"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Confirm </button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold; font-size: larger"><?php echo "Delivery Fee";?></td>
                        <td style="font-weight: bold; font-size: larger"><?php echo number_format((float)$totaldeliveryfee, 2, '.', ''); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold; font-size: larger"><?php echo "TOTAL PRICE";?></td>
                        <td style="font-weight: bold; font-size: larger"><?php echo number_format((float)$totalpricedelivery, 2, '.', ''); ?></td>
                    </tr>
            </table>
            <div style="text-align: right;">
            <label style="color: red">***</label>Click the CONFIRM button(s) before PAY.<br>
                <label style="color: red">***</label>Delivery Fee: Each quantity is charged for RM3.
            </div>
            <div style="text-align: left; background-color: #FFFAFA;">
                <?php foreach ($addressData as $address) { ?>
                    <p><b>Delivery Address</b></p>
                    <p>
                        <?= $address['custaddress1'] . '<br>' . $address['custaddress2'] . '<br>' . $address['custaddress3'] . '<br>' . $address['custaddress4']?>
                    </p>
                    <button type="button" class="btn btn-primary"><a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>" style="color: white;">Change Address</a></button>
                <?php } ?>
            </div>
        
        <br><br>
        <p>Pay By:</p>
        <div id="paypal-button-container"></div>
        </div>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'MYR',
                                value: '<?= $totalpricedelivery ?>',
                            },
                            shipping: {
                                name: {
                                    full_name: '<?= $address["custusername"]; ?>'
                                },
                                address: {
                                    address_line_1: '<?= $address["custaddress1"]; ?>',
                                    address_line_2: '<?= $address["custaddress2"]; ?>',
                                    admin_area_2: '<?= $address["custaddress3"]; ?>',
                                    admin_area_1: '<?= $address["custaddress4"]; ?>',
                                    postal_code: '',
                                    country_code: 'MY'
                                }
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction Successful!');
                        window.location.href = "./paymentSuccessful.php?custID=<?=$_SESSION['custID']?>";


                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
        </script>
    </body>
</html>

