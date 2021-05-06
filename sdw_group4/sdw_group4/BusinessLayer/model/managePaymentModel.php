<?php
require_once '../../libs/database.php';

class managePaymentModel{

    public $paymentID, $custID, $itemname, $itemprice, $itemquantity, $subtotal, $deliveryfee, $time, $staus;

    function addPayment(){
        $sql = "insert into payment(custID, serviceID, itemname, itemprice, itemquantity, subtotal) values(:custID, :serviceID, :itemname, :itemprice, :itemquantity, :subtotal)";
        $args = [':custID'=>$this->custID, ':serviceID'=>$this->serviceID, ':itemname'=>$this->itemname, ':itemprice'=>$this->itemprice, ':itemquantity'=>$this->itemquantity, ':subtotal'=>$this->subtotal];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    //retrieve address from customer
    function getAddress(){
        $sql = "select * from customer where custID = :custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }

    //update order status to send notification to sp
    public function updateOrderStatus(){
        $sql = "update tracking set orderstatus=1 where custID = :custID";
        $args = [':custID' => $this->custID];
        return DB::run($sql, $args);
    }

    //clear the cart
    public function updateCartItem(){
        $sql = "update order1 set status=1 where custID = :custID";
        $args = [':custID' => $this->custID];
        return DB::run($sql, $args);
    }

    public function viewOrderedList(){
        $sql = "select * from payment where custID = :custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }

}