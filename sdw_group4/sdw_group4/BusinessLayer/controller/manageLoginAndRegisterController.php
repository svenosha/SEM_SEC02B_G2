<?php
require_once '../../BusinessLayer/model/manageLoginAndRegisterModel.php';

class manageLoginAndRegisterController{
    
    function custRegister(){
        $user = new manageLoginAndRegisterModel();
        $user->custusername = $_POST['custusername'];
        $user->custhpnumber = $_POST['custhpnumber'];
        $user->custemail = $_POST['custemail'];
        $user->custaddress1 = $_POST['custaddress1'];
        $user->custaddress2 = $_POST['custaddress2'];
        $user->custaddress3 = $_POST['custaddress3'];
        $user->custaddress4 = $_POST['custaddress4'];
        $user->custpassword = $_POST['custpassword'];
        if($user->customerRegister() > 0){
            $message = "Your registration is SUCCESSFULLY!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = 'customerLogin.php';</script>";
        }
    }

    function custLogin(){
        $user = new manageLoginAndRegisterModel();
        $user->custusername = $_POST['custusername'];
        $user->custpassword = $_POST['custpassword'];
        $stmt = $user->customerLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['custID'] = $selected['custID'];
            }
            $_SESSION["custusername"] = $_POST['custusername'];
            echo "<script>alert('Login Succesful! Welcome to Beep Beep Delivery System');
            window.location = '../manageOrder/customerHomePage.php?custID=".$_SESSION['custID']."';</script>"; 
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'customerLogin.php';</script>";
        }
    }

    function spRegister(){
        $user = new manageLoginAndRegisterModel();
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
        $user->sppassword = $_POST['sppassword'];
        if($user->serviceproviderRegister() > 0){
            $message = "Your registration is SUCCESSFULLY!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = 'serviceproviderLogin.php';</script>";
        }
    }

    function spLogin(){
        $user = new manageLoginAndRegisterModel();
        $user->spusername = $_POST['spusername'];
        $user->sppassword = $_POST['sppassword'];
        $stmt = $user->serviceproviderLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['spID'] = $selected['spID'];
            }
            $_SESSION["spusername"] = $_POST['spusername'];
            echo "<script>alert('Login Succesful! Welcome to Beep Beep Delivery System');
            window.location = '../manageService/serviceProviderServiceView.php?spID=".$_SESSION['spID']."';</script>"; 
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'serviceproviderLogin.php';</script>";
        }
    }

    function runnerRegister(){
        $user = new manageLoginAndRegisterModel();
        $user->runnerusername = $_POST['runnerusername'];
        $user->runnerhpnumber = $_POST['runnerhpnumber'];
        $user->runneremail = $_POST['runneremail'];
        $user->runnervehiclemodel = $_POST['runnervehiclemodel'];
        $user->runnervehicleplatenumber = $_POST['runnervehicleplatenumber'];
        $user->runnercity = $_POST['runnercity'];
        $user->runnerbanktype = $_POST['runnerbanktype'];
        $user->runnerbankaccountnumber = $_POST['runnerbankaccountnumber'];
        $user->runnerpassword = $_POST['runnerpassword'];
        if($user->runnerRegister() > 0){
            $message = "Your registration is SUCCESSFULLY!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = 'runnerLogin.php';</script>";
        }
    }

    function runnerLogin(){
        $user = new manageLoginAndRegisterModel();
        $user->runnerusername = $_POST['runnerusername'];
        $user->runnerpassword = $_POST['runnerpassword'];
        $stmt = $user->runnerLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['runnerID'] = $selected['runnerID'];
            }
            $_SESSION["runnerusername"] = $_POST['runnerusername'];
            echo "<script>alert('Login Succesful! Welcome to Beep Beep Delivery System');
            window.location = '../manageTracking/runnerHomePage.php?runnerID=".$_SESSION['runnerID']."';</script>";  
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'runnerLogin.php';</script>";
        }
    }
}

?>
    