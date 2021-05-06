<?php
require_once '../../BusinessLayer/model/manageOrderModel.php';

class manageOrderController{
    
    function viewGood(){
        $service = new manageOrderModel();
        return $service->viewAllGood();
    }

    function viewFood(){
        $service = new manageOrderModel();
        return $service->viewAllFood();
    }

    function viewPet(){
        $service = new manageOrderModel();
        return $service->viewAllPet();
    }

    function viewMedical(){
        $service = new manageOrderModel();
        return $service->viewAllMedical();
    }

    //add item to the cart
    function addCart(){
        $service = new manageOrderModel();
        $service->custID = $_SESSION['custID'];
        $service->serviceID = $_POST['serviceID'];
        $service->itemname = $_POST['itemname'];
        $service->itemprice = $_POST['itemprice'];
        $service->itemquantity = $_POST['itemquantity'];
        return $service->addToCart();
    }

    //to view the cart
    function viewOrder(){
        $service = new manageOrderModel();
        $service->custID = $_SESSION['custID'];
        return $service->viewAllOrder();
    }

    function delete() {
        $service = new manageOrderModel();
        $service->custID = $_SESSION['custID'];
        $service->serviceID = $_POST['serviceID'];
        if($service->deleteOrder()){
            $message = "Delete Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = './customerViewCart.php?custID=".$_SESSION['custID']."';</script>";
        }
    }

    function updateOrder(){
        $service = new manageOrderModel();
        $service->custID = $_SESSION['custID'];
        $service->serviceID = $_POST['serviceID'];
        $service->itemname = $_POST['itemname'];
        $service->itemprice = $_POST['itemprice'];
        $service->itemquantity = $_POST['itemquantity'];

        if($service->updateOrders()){
            $message = "Success Update!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = './customerViewCart.php?custID=".$_SESSION['custID']."';</script>";
        }
    }
}
?>
