<?php
require_once '../../libs/database.php';

class manageOrderModel{
    public $serviceID, $spID, $servicetype, $itemname, $itemprice, $itemimage;
    public $orderID, $custID, $itemquantity, $status;
    
    
    function viewAllGood(){
        $sql = "select * from service where servicetype = 'Good'";
        return DB::run($sql);
    }

    function viewAllFood(){
        $sql = "select * from service where servicetype = 'Food'";
        return DB::run($sql);
    }

    function viewAllPet(){
        $sql = "select * from service where servicetype = 'Pet'";
        return DB::run($sql);
    }

    function viewAllMedical(){
        $sql = "select * from service where servicetype = 'Medical'";
        return DB::run($sql);
    }

    //add item to the cart
    function addToCart(){
        
        $sql = "insert into order1(custID, serviceID, itemname, itemprice, itemquantity) values(:custID, :serviceID, :itemname, :itemprice, :itemquantity)";
        $args = [':custID'=>$this->custID, ':serviceID'=>$this->serviceID, ':itemname'=>$this->itemname, ':itemprice'=>$this->itemprice, ':itemquantity'=>$this->itemquantity];
        return DB::run($sql, $args);
    }

    //view cart
    function viewAllOrder(){
        $sql = "select * from (order1 inner join service on order1.serviceID = service.serviceID) where order1.custID = :custID and order1.status=0";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }

    //update quantity after adding same item to cart
    function updateCartQuantity()
    {
        $sql = "update order1 set itemquantity = itemquantity +:itemquantity where serviceID=:serviceID and custID=:custID";
        $args = [':serviceID' => $this->serviceID, ':itemquantity' => $this->itemquantity, ':custID' => $this->custID];
        return DB::run($sql, $args);
    }

    function DuplicateService()
    {
        $sql = "select * from order1 where status=0 and serviceID=:serviceID and custID=:custID";
        $args = [':serviceID' => $this->serviceID, ':custID' => $this->custID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    

    function deleteOrder(){
        $sql = "delete from order1 where serviceID = :serviceID and custID = :custID";
        $args = [':serviceID'=>$this->serviceID, ':custID'=>$this->custID];
        return DB::run($sql,$args);
    }

    function updateOrders(){
        $sql = "update order1 set itemname=:itemname, itemprice=:itemprice, itemquantity=:itemquantity where serviceID = :serviceID and custID = :custID";
        $args = [':serviceID'=>$this->serviceID, ':custID'=>$this->custID, ':itemname'=>$this->itemname, ':itemprice'=>$this->itemprice, ':itemquantity'=>$this->itemquantity];
        return DB::run($sql,$args);
    }
}
?>
