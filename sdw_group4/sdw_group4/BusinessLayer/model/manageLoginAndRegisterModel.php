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
    	$sql = "select * from customer where custusername=:custusername and custpassword=:custpassword";
    	$args = [':custusername'=>$this->custusername, ':custpassword'=>$this->custpassword];
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
    	$sql = "select * from serviceprovider where spusername=:spusername and sppassword=:sppassword";
    	$args = [':spusername'=>$this->spusername, ':sppassword'=>$this->sppassword];
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
    	$sql = "select * from runner where runnerusername=:runnerusername and runnerpassword=:runnerpassword";
    	$args = [':runnerusername'=>$this->runnerusername, ':runnerpassword'=>$this->runnerpassword];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
}
?>
