<?php
require_once '../../BusinessLayer/model/manageTrackingModel.php';

class manageTrackingController{
    //to retrieve the customer order to service provider
    function viewSP(){
        $service = new manageTrackingModel();
        $service->spID = $_SESSION['spID'];
        return $service->viewSPNotification();
    }
    //to retrieve the customer order to runner
    function viewRunner(){
        $service = new manageTrackingModel();
        $service->runnerID = $_SESSION['runnerID'];
        return $service->viewRunnerNotification();
    }
    //to retrieve the customer order
    function viewCustomer(){
        $service = new manageTrackingModel();
        $service->custID = $_SESSION['custID'];
        return $service->viewCustomerNotification();
    }
    //to display the accept message
    function acceptSP(){
        $service = new manageTrackingModel();
        $service->spID = $_SESSION['spID'];
        if($service->acceptSPNotification()){
            $message = "Success Accept!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = './serviceProviderNotification.php?=".$_SESSION['spID']."';</script>";
        }
    }
    //to display the reject message
    function rejectSP(){
        $service = new manageTrackingModel();
        $service->spID = $_SESSION['spID'];
        if($service->rejectSPNotification()){
            $message = "Success Reject!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = './serviceProviderNotification.php?=".$_SESSION['spID']."';</script>";
        }
    }
    //to display the success update the delivery message for success delivery
    function acceptRunner(){
        $service = new manageTrackingModel();
        $service->runnerID = $_SESSION['runnerID'];
        $service->serviceID = $_POST['serviceID'];
        if($service->acceptRunnerNotification()){
            $message = "Success Delivered to Customer!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = './runnerHomePage.php?=".$_SESSION['runnerID']."';</script>";
        }
    }
    //to display the success update the delivery message for fail to delivery
    function rejectRunner(){
        $service = new manageTrackingModel();
        $service->runnerID = $_SESSION['runnerID'];
        if($service->rejectRunnerNotification()){
            $message = "Unsuccessful Delivered to Customer!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = './runnerHomePage.php?=".$_SESSION['runnerID']."';</script>";
        }
    }

    //retrieve from payment table for commission report
    function viewRunnerP(){
        $service = new manageTrackingModel();
        $service->runnerID = $_SESSION['runnerID'];
        return $service->viewRunnerPayment();
    }
    //retrieve from payment table for sales report
    function viewSPP(){
        $service = new manageTrackingModel();
        $service->spID = $_SESSION['spID'];
        return $service->viewSPPayment();
    }
    //to add the data into the database
    function addRunnerTrack(){
        $service = new manageTrackingModel();
        $service->runnerID = $_SESSION['runnerID'];
        $service->orderID = $_POST['orderID'];
        $service->custID = $_POST['custID'];
        $service->serviceID = $_POST['serviceID'];
        return $service->addRunnerTracking();
    }
    
}
?>
