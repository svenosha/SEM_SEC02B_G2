<?php
require_once '../../libs/database.php';
session_start();

class manageUserProfileModel{
    public $custID, $custusername, $custhpnumber, $custemail, $custaddress1, $custaddress2, $custaddress3, $custaddress4;
    public $spID, $spusername, $sphpnumber, $spemail, $spcompanyname, $spaddress1, $spaddress2, $spaddress3, $spaddress4, $spbanktype, $spbankaccountnumber;
    public $runnerID, $runnerusername, $runnerhpnumber, $runneremail, $runnervehiclemodel, $runnervehicleplatenumber, $runnercity, $runnerbanktype, $runnerbankaccountnumber;
    
    function viewCustomer(){
        $sql = "select * from customer where custID = :custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }

    function updateCustomer(){
        $sql = "update customer set custusername=:custusername, custhpnumber=:custhpnumber, custemail=:custemail, custaddress1=:custaddress1, custaddress2=:custaddress2, custaddress3=:custaddress3, custaddress4=:custaddress4 where custID = :custID";
        $args = [':custID'=>$this->custID, ':custusername'=>$this->custusername, ':custhpnumber'=>$this->custhpnumber, ':custemail'=>$this->custemail, ':custaddress1'=>$this->custaddress1, ':custaddress2'=>$this->custaddress2, ':custaddress3'=>$this->custaddress3, ':custaddress4'=>$this->custaddress4];
        return DB::run($sql, $args);
    }

    function deleteCustomer(){
        $sql = "delete from customer where custID=:custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql,$args);
    }

    function viewServiceProvider(){
        $sql = "select * from serviceprovider where spID = :spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }

    function updateServiceProvider(){
        $sql = "update serviceprovider set spusername=:spusername, sphpnumber=:sphpnumber, spemail=:spemail,  spcompanyname=:spcompanyname, spaddress1=:spaddress1, spaddress2=:spaddress2, spaddress3=:spaddress3, spaddress4=:spaddress4, spbanktype=:spbanktype, spbankaccountnumber=:spbankaccountnumber where spID = :spID";
        $args = [':spID'=>$this->spID, ':spusername'=>$this->spusername, ':sphpnumber'=>$this->sphpnumber, ':spemail'=>$this->spemail, ':spcompanyname'=>$this->spcompanyname, ':spaddress1'=>$this->spaddress1, ':spaddress2'=>$this->spaddress2, ':spaddress3'=>$this->spaddress3, ':spaddress4'=>$this->spaddress4, ':spbanktype'=>$this->spbanktype, ':spbankaccountnumber'=>$this->spbankaccountnumber];
        return DB::run($sql, $args);
    }

    function deleteServiceProvider(){
        $sql = "delete from serviceprovider where spID=:spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql,$args);
    }

    function viewRunner(){
        $sql = "select * from runner where runnerID = :runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }

    function updateRunner(){
        $sql = "update runner set runnerusername=:runnerusername, runnerhpnumber=:runnerhpnumber, runneremail=:runneremail,  runnervehiclemodel=:runnervehiclemodel, runnercity=:runnercity, runnerbanktype=:runnerbanktype, runnerbankaccountnumber=:runnerbankaccountnumber where runnerID = :runnerID";
        $args = [':runnerID'=>$this->runnerID, ':runnerusername'=>$this->runnerusername, ':runnerhpnumber'=>$this->runnerhpnumber, ':runneremail'=>$this->runneremail, ':runnervehiclemodel'=>$this->runnervehiclemodel, ':runnercity'=>$this->runnercity, ':runnerbanktype'=>$this->runnerbanktype, ':runnerbankaccountnumber'=>$this->runnerbankaccountnumber];
        return DB::run($sql, $args);
    }

    function deleteRunner(){
        $sql = "delete from runner where runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql,$args);
    }

}