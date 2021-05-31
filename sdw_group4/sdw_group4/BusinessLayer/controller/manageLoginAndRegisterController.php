<?php
require_once '../../BusinessLayer/model/manageLoginAndRegisterModel.php';

use PHPMailer\PHPMailer\PHPMailer;

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
        $user->custemail = $_POST['custemail'];
        $user->custpassword = $_POST['custpassword'];
        $stmt = $user->customerLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['custID'] = $selected['custID'];
            }
            $_SESSION["custemail"] = $_POST['custemail'];
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
        $user->spemail = $_POST['spemail'];
        $user->sppassword = $_POST['sppassword'];
        $stmt = $user->serviceproviderLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['spID'] = $selected['spID'];
            }
            $_SESSION["spemail"] = $_POST['spemail'];
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
        $user->runneremail = $_POST['runneremail'];
        $user->runnerpassword = $_POST['runnerpassword'];
        $stmt = $user->runnerLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['runnerID'] = $selected['runnerID'];
            }
            $_SESSION["runneremail"] = $_POST['runneremail'];
            echo "<script>alert('Login Succesful! Welcome to Beep Beep Delivery System');
            window.location = '../manageTracking/runnerHomePage.php?runnerID=".$_SESSION['runnerID']."';</script>";  
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'runnerLogin.php';</script>";
        }
    }


    // reset password //
    function custreset(){
        $user = new manageLoginAndRegisterModel();
        $user->custemail = $_POST['custemail'];
        
        if($user->custcheck() > 0){

            $user->user_id = $user->custgetId();
            $getId = $user->user_id;

                require_once "../../PHPMailer/PHPMailer.php";
                require_once "../../PHPMailer/SMTP.php";
                require_once "../../PHPMailer/Exception.php";

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host =  "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "zeqingkoh@gmail.com";
                $mail->Password = "ahqing981128";
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";

                $mail->isHTML(true);
                $mail->addAddress($user->custemail);
                $mail->setFrom("zeqingkoh@gmail.com", "Mr/Mrs/Ms");
                $mail->Subject = "Reset Password";                
                $mail->Body = "Hi, <br><br> 
                               In order to reset your password, please click on the link below: <br> 
                               <a href='http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/custSetPassword.php?custID=$getId'> http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/SetPassword.php?custID=$getId </a> 
                               <br> <br>
                               Kindly Regards,<br> 
                               AskRunner.";

                if($mail->send()){
                    $message = "Please check your email inbox.";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
                }
                else{
                    $message = "Error!";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
                }
        }
        else{
            $message = "Email does not exist.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
        }
    }

    function custsetPw($user_idd){
        $user = new manageLoginAndRegisterModel();
        $user->custID = $user_idd;
       

        if($user->custcheckId() > 0){
            $set_pw = "abcdefghijklmnopqrstuvwyz0123456789";
            $set_pw = str_shuffle($set_pw);
            $set_pw = substr($set_pw, 0, 10);
            $user->set_pw = substr($set_pw, 0, 10);


            if($user->custset_newPw() > 0){
                $message = 'Your new password is '.$set_pw.'. Please change the password after login.';
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/manageLoginAndRegister/customerLogin.php';</script>";
            }
        }
        else{
            $message = "Error! Please try again.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/manageLoginAndRegister/customerLogin.php.php';</script>";
        }
    }


    function runreset(){
        $user = new manageLoginAndRegisterModel();
        $user->runneremail = $_POST['runneremail'];
        
        if($user->runcheck() > 0){

            $user->user_id = $user->rungetId();
            $getId = $user->user_id;

                require_once "../../PHPMailer/PHPMailer.php";
                require_once "../../PHPMailer/SMTP.php";
                require_once "../../PHPMailer/Exception.php";

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host =  "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "zeqingkoh@gmail.com";
                $mail->Password = "ahqing981128";
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";

                $mail->isHTML(true);
                $mail->addAddress($user->runneremail);
                $mail->setFrom("zeqingkoh@gmail.com", "Mr/Mrs/Ms");
                $mail->Subject = "Reset Password";                
                $mail->Body = "Hi, <br><br> 
                               In order to reset your password, please click on the link below: <br> 
                               <a href='http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/runSetPassword.php?runnerID=$getId'> http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/runSetPassword.php?runnerID=$getId </a> 
                               <br> <br>
                               Kindly Regards,<br> 
                               AskRunner.";

                if($mail->send()){
                    $message = "Please check your email inbox.";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
                }
                else{
                    $message = "Error!";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
                }
        }
        else{
            $message = "Email does not exist.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
        }
    }

    function runsetPw($user_idd){
        $user = new manageLoginAndRegisterModel();
        $user->runnerID = $user_idd;
       

        if($user->runcheckId() > 0){
            $set_pw = "abcdefghijklmnopqrstuvwyz0123456789";
            $set_pw = str_shuffle($set_pw);
            $set_pw = substr($set_pw, 0, 10);
            $user->set_pw = substr($set_pw, 0, 10);


            if($user->runset_newPw() > 0){
                $message = 'Your new password is '.$set_pw.'. Please change the password after login.';
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/manageLoginAndRegister/runnerLogin.php';</script>";
            }
        }
        else{
            $message = "Error! Please try again.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/manageLoginAndRegister/runnerLogin.php.php';</script>";
        }
    }

    function spreset(){
        $user = new manageLoginAndRegisterModel();
        $user->spemail = $_POST['spemail'];
        
        if($user->spcheck() > 0){

            $user->user_id = $user->spgetId();
            $getId = $user->user_id;

                require_once "../../PHPMailer/PHPMailer.php";
                require_once "../../PHPMailer/SMTP.php";
                require_once "../../PHPMailer/Exception.php";

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host =  "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "zeqingkoh@gmail.com";
                $mail->Password = "ahqing981128";
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";

                $mail->isHTML(true);
                $mail->addAddress($user->spemail);
                $mail->setFrom("zeqingkoh@gmail.com", "Mr/Mrs/Ms");
                $mail->Subject = "Reset Password";                
                $mail->Body = "Hi, <br><br> 
                               In order to reset your password, please click on the link below: <br> 
                               <a href='http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/spSetPassword.php?spID=$getId'> http://localhost/sdw_group4/sdw_group4/ApplicationLayer/manageLoginAndRegister/spSetPassword.php?spID=$getId </a> 
                               <br> <br>
                               Kindly Regards,<br> 
                               AskRunner.";

                if($mail->send()){
                    $message = "Please check your email inbox.";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/manageLoginAndRegister/userLogin.php';</script>";
                }
                else{
                    $message = "Error!";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
                }
        }
        else{
            $message = "Email does not exist.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/Home/Homepage.php';</script>";
        }
    }

    function spsetPw($user_idd){
        $user = new manageLoginAndRegisterModel();
        $user->spID = $user_idd;
       

        if($user->spcheckId() > 0){
            $set_pw = "abcdefghijklmnopqrstuvwyz0123456789";
            $set_pw = str_shuffle($set_pw);
            $set_pw = substr($set_pw, 0, 10);
            $user->set_pw = substr($set_pw, 0, 10);


            if($user->spset_newPw() > 0){
                $message = 'Your new password is '.$set_pw.'. Please change the password after login.';
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/manageLoginAndRegister/serviceproviderLogin.php';</script>";
            }
        }
        else{
            $message = "Error! Please try again.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/manageLoginAndRegister/serviceproviderLogin.php.php';</script>";
        }
    }

}
?>
    