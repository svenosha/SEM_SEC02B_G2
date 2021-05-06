<?php
require_once '../../BusinessLayer/model/managePaymentModel.php';

class managePaymentController{

    function add(){
        $service = new managePaymentModel();
        $service->custID = $_SESSION['custID'];
        $service->serviceID = $_POST['serviceID'];
        $service->itemname = $_POST['itemname'];
        $service->itemprice = $_POST['itemprice'];
        $service->itemquantity = $_POST['itemquantity'];
        $service->subtotal = $_POST['subtotal'];
        if($service->addPayment()){
            $message = "Success Insert!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/managePayment/paymentCheckout.php?custID=".$_SESSION['custID']."';</script>";
        }
    }

    function getAdd(){
        $service1 = new managePaymentModel();
        $service1->custID = $_SESSION['custID'];
        return $service1->getAddress();
    }

    //update order status to send notification to sp
    function update(){
        $notification = new managePaymentModel();
        $notification->custID = $_SESSION['custID'];
        $notification->updateOrderStatus();
    }

    //update the cart status
    function updateCart(){
        $notification = new managePaymentModel();
        $notification->custID = $_SESSION['custID'];
        $notification->updateCartItem();
    }

    function viewOrdered(){
        $payment = new managePaymentModel();
        $payment->custID = $_SESSION['custID'];
        return $payment->viewOrderedList();
    }
}
?>
