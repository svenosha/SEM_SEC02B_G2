<?php
require_once '../../BusinessLayer/model/manageUserProfileModel.php';

class manageUserProfileController{
    
    function viewCust($custID){
        $user = new manageUserProfileModel();
        $user->custID = $custID;
        return $user->viewCustomer();
    }

    function updateCust(){
        $user = new manageUserProfileModel();
        $user->custID = $_SESSION['custID'];
        $user->custusername = $_POST['custusername'];
        $user->custhpnumber = $_POST['custhpnumber'];
        $user->custemail = $_POST['custemail'];
        $user->custaddress1 = $_POST['custaddress1'];
        $user->custaddress2 = $_POST['custaddress2'];
        $user->custaddress3 = $_POST['custaddress3'];
        $user->custaddress4 = $_POST['custaddress4'];
        if($user->updateCustomer()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = './customerProfile.php?custID=".$_SESSION['custID']."';</script>";     
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = './customerProfile.php?custID=".$_SESSION['custID']."';</script>";
    }

    function deleteCust($custID){
        $user = new manageUserProfileModel();
        $user->custID = $custID;
        if($user->deleteCustomer()){
            $message = "Success Delete!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
        }
    }

    function viewSP($spID){
        $user = new manageUserProfileModel();
        $user->spID = $spID;
        return $user->viewServiceProvider();
    }

    function updateSP(){
        $user = new manageUserProfileModel();
        $user->spID = $_SESSION['spID'];
        $user->spusername = $_POST['spusername'];
        $user->sphpnumber = $_POST['sphpnumber'];
        $user->spemail = $_POST['spemail'];
        $user->spcompanyname = $_POST['spcompanyname'];
        $user->spaddress1 = $_POST['spaddress1'];
        $user->spaddress2 = $_POST['spaddress2'];
        $user->spaddress3 = $_POST['spaddress3'];
        $user->spaddress4 = $_POST['spaddress4'];
        $user->spbanktype = $_POST['spbanktype'];
        $user->spbankaccountnumber = $_POST['spbankaccountnumber'];
        if($user->updateServiceProvider()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = './serviceproviderProfile.php?spID=".$_SESSION['spID']."';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = './serviceproviderProfile.php?spID=".$_SESSION['spID']."';</script>";
    }
    
    function deleteSP($spID){
        $user = new manageUserProfileModel();
        $user->spID = $spID;
        if($user->deleteServiceProvider()){
            $message = "Success Delete!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
        }
    }

    function viewRun($runnerID){
        $user = new manageUserProfileModel();
        $user->runnerID = $runnerID;
        return $user->viewRunner();
    }

    function updateRun(){
        $user = new manageUserProfileModel();
        $user->runnerID = $_SESSION['runnerID'];
        $user->runnerusername = $_POST['runnerusername'];
        $user->runnerhpnumber = $_POST['runnerhpnumber'];
        $user->runneremail = $_POST['runneremail'];
        $user->runnervehiclemodel = $_POST['runnervehiclemodel'];
        $user->runnervehicleplatenumber = $_POST['runnervehicleplatenumber'];
        $user->runnercity = $_POST['runnercity'];
        $user->runnerbanktype = $_POST['runnerbanktype'];
        $user->runnerbankaccountnumber = $_POST['runnerbankaccountnumber'];
        if($user->updateRunner()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = './runnerProfile.php?runnerID=".$_SESSION['runnerID']."';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = './runnerProfile.php?runnerID=".$_SESSION['runnerID']."';</script>";
    }
    
    function deleteRun($runnerID){
        $user = new manageUserProfileModel();
        $user->runnerID = $runnerID;
        if($user->deleteRunner()){
            $message = "Success Delete!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
        }
    }
}
?>
