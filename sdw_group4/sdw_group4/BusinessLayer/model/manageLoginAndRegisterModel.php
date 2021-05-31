<?php
require_once '../../libs/database.php';

class manageLoginAndRegisterModel{

    public $custID, $custusername, $custhpnumber, $custemail, $custaddress1, $custaddress2, $custaddress3, $custaddress4, $custpassword;
    public $spID, $spusername, $sphpnumber, $spemail, $spcompanyname, $spaddress1, $spaddress2, $spaddress3, $spaddress4, $spbanktype, $spbankaccountnumber, $sppassword;
    public $runnerID, $runnerusername, $runnerhpnumber, $runneremail, $runnervehiclemodel, $runnervehicleplatenumber, $runnercity, $runnerbanktype, $runnerbankaccountnumber, $runnerpassword;
    
    function customerRegister(){
        $sql = "insert into customer(custusername, custhpnumber, custemail, custaddress1, custaddress2, custaddress3, custaddress4, custpassword) values(:custusername, :custhpnumber, :custemail, :custaddress1, :custaddress2, :custaddress3, :custaddress4, :custpassword)";
        $args = [':custusername'=>$this->custusername, ':custhpnumber'=>$this->custhpnumber, ':custemail'=>$this->custemail, ':custaddress1'=>$this->custaddress1, ':custaddress2'=>$this->custaddress2, ':custaddress3'=>$this->custaddress3, ':custaddress4'=>$this->custaddress4, ':custpassword'=>$this->custpassword];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function customerLogin(){
    	$sql = "select * from customer where custemail=:custemail and custpassword=:custpassword";
    	$args = [':custemail'=>$this->custemail, ':custpassword'=>$this->custpassword];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
    
    function serviceproviderRegister(){
        $sql = "insert into serviceprovider(spusername, sphpnumber, spemail, spcompanyname, spaddress1, spaddress2, spaddress3, spaddress4, spbanktype, spbankaccountnumber, sppassword) values(:spusername, :sphpnumber, :spemail, :spcompanyname, :spaddress1, :spaddress2, :spaddress3, :spaddress4, :spbanktype, :spbankaccountnumber, :sppassword)";
        $args = [':spusername'=>$this->spusername, ':sphpnumber'=>$this->sphpnumber, ':spemail'=>$this->spemail, ':spcompanyname'=>$this->spcompanyname, ':spaddress1'=>$this->spaddress1, ':spaddress2'=>$this->spaddress2, ':spaddress3'=>$this->spaddress3, ':spaddress4'=>$this->spaddress4, ':spbanktype'=>$this->spbanktype, ':spbankaccountnumber'=>$this->spbankaccountnumber, ':sppassword'=>$this->sppassword];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function serviceproviderLogin(){
    	$sql = "select * from serviceprovider where spemail=:spemail and sppassword=:sppassword";
    	$args = [':spemail'=>$this->spemail, ':sppassword'=>$this->sppassword];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
    
    function runnerRegister(){
        $sql = "insert into runner(runnerusername, runnerhpnumber, runneremail, runnervehiclemodel, runnervehicleplatenumber, runnercity, runnerbanktype, runnerbankaccountnumber, runnerpassword) values(:runnerusername, :runnerhpnumber, :runneremail, :runnervehiclemodel, :runnervehicleplatenumber, :runnercity, :runnerbanktype, :runnerbankaccountnumber, :runnerpassword)";
        $args = [':runnerusername'=>$this->runnerusername, ':runnerhpnumber'=>$this->runnerhpnumber, ':runneremail'=>$this->runneremail, ':runnervehiclemodel'=>$this->runnervehiclemodel, ':runnervehicleplatenumber'=>$this->runnervehicleplatenumber, ':runnercity'=>$this->runnercity, ':runnerbanktype'=>$this->runnerbanktype, ':runnerbankaccountnumber'=>$this->runnerbankaccountnumber, ':runnerpassword'=>$this->runnerpassword];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function runnerLogin(){
    	$sql = "select * from runner where runneremail=:runneremail and runnerpassword=:runnerpassword";
    	$args = [':runneremail'=>$this->runneremail, ':runnerpassword'=>$this->runnerpassword];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }

    function custcheck(){
        $sql = "select * from customer where custemail=:custemail";
        $args = [':custemail'=>$this->custemail];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function custgetId(){
        $sql = "select custID from customer where custemail=:custemail";
        $args = [':custemail'=>$this->custemail];
        $stmt = DB::run($sql, $args);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $getId = $row['custID'];
        return $getId;
    }

    function custcheckId(){
        $sql = "select * from customer where custID=:custID";
        $args = [':custID'=>$this->custID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function custset_newPw(){
        $sql = "update customer set custpassword=:password where custID=:custID";
        $args = [':password'=>$this->set_pw,':custID'=>$this->custID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function runcheck(){
        $sql = "select * from runner where runneremail=:runneremail";
        $args = [':runneremail'=>$this->runneremail];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function rungetId(){
        $sql = "select runnerID from runner where runneremail=:runneremail";
        $args = [':runneremail'=>$this->runneremail];
        $stmt = DB::run($sql, $args);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $getId = $row['runnerID'];
        return $getId;
    }

    function runcheckId(){
        $sql = "select * from runner where runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function runset_newPw(){
        $sql = "update runner set runnerpassword=:password where runnerID=:runnerID";
        $args = [':password'=>$this->set_pw,':runnerID'=>$this->runnerID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

     function spcheck(){
        $sql = "select * from serviceprovider where spemail=:spemail";
        $args = [':spemail'=>$this->spemail];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function spgetId(){
        $sql = "select spID from serviceprovider where spemail=:spemail";
        $args = [':spemail'=>$this->spemail];
        $stmt = DB::run($sql, $args);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $getId = $row['spID'];
        return $getId;
    }

    function spcheckId(){
        $sql = "select * from serviceprovider where spID=:spID";
        $args = [':spID'=>$this->spID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function spset_newPw(){
        $sql = "update serviceprovider set sppassword=:password where spID=:spID";
        $args = [':password'=>$this->set_pw,':spID'=>$this->spID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
}
?>
