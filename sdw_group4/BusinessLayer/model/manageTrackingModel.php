<?php
require_once '../../libs/database.php';

class manageTrackingModel{
    public $serviceID, $spID,$runnerID;
    public $orderID, $custID;
    
    //sql for sql for retrieve data for service provider incoming order notification
    function viewSPNotification(){
        $sql = "select * from order1 inner join service on order1.serviceID = service.serviceID where order1.status=1 and service.spID=:spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }
    //sql for sql for retrieve data for customer order notification
    function viewCustomerNotification(){
        $sql = "select * from order1 inner join service on order1.serviceID = service.serviceID where order1.status=3 and order1.custID=:custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }
    //sql for sql for retrieve data for runner pending deliver order notification
    function viewRunnerNotification(){
        $sql = "select * from order1 inner join service on order1.serviceID = service.serviceID inner join customer on order1.custID = customer.custID inner join serviceprovider on service.spID = serviceprovider.spID where order1.status=2";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }
    //sql for update the order status for accept the order
    function acceptSPNotification(){
        $sql = "update order1 inner join service on order1.serviceID = service.serviceID set status=2 where service.spID = :spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }
    //sql for update the order status for reject the order
    function rejectSPNotification(){
        $sql = "update order1 inner join service on order1.serviceID = service.serviceID set status=7 where service.spID = :spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }
    //sql for update the delivery status for success to delivery
    function acceptRunnerNotification(){
        $sql = "update tracking inner join order1 on tracking.orderID = order1.orderID set status=3 where order1.serviceID = :serviceID and tracking.runnerID = :runnerID";
        $args = [':serviceID'=>$this->serviceID, ':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }
    //sql for update the delivery status for fail to delivery
    function rejectRunnerNotification(){
        $sql = "update order1 set status=7 where serviceID = :serviceID";
        $args = [':serviceID'=>$this->serviceID];
        return DB::run($sql, $args);
    }
    //sql for retrieve the data for commission report
    function viewRunnerPayment(){
        $sql = "select * from order1 inner join tracking on order1.orderID = tracking.orderID where order1.status=3 and tracking.runnerID = :runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }
    //sql for retrieve the data for sales report
    function viewSPPayment(){
        $sql = "select * from order1 inner join service on order1.serviceID = service.serviceID where order1.status=3 and service.spID=:spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }
    //sql for insert the data to database
    function addRunnerTracking(){
        $sql = "insert into tracking (orderID, custID, serviceID, runnerID) values (:orderID, :custID, :serviceID, :runnerID)";
        $args = [':orderID'=>$this->orderID, ':custID'=>$this->custID, ':serviceID'=>$this->serviceID, ':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }

}
?>
