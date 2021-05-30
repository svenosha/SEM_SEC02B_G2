<?php
require_once '../../libs/database.php';

class manageServiceModel{

    public $serviceID, $spID, $servicetype, $itemname, $itemprice, $itemimage, $itemdesc, $itemstock;

    function addItem(){
        $sql = "insert into service(spID, servicetype, itemname, itemprice, itemimage, itemdesc, itemstock) values(:spID, :servicetype, :itemname, :itemprice, :itemimage, :itemdesc, :itemstock)";
        $args = [':spID'=>$this->spID, ':servicetype'=>$this->servicetype, ':itemname'=>$this->itemname, ':itemprice'=>$this->itemprice, ':itemimage'=>$this->itemimage, ':itemdesc'=>$this->itemdesc, ':itemstock'=>$this->itemstock];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function deleteItem(){
        $sql = "delete from service where serviceID=:serviceID";
        $args = [':serviceID'=>$this->serviceID];
        return DB::run($sql,$args);
    }

    function viewAllItem(){
        $sql = "select * from service where spID=:spID ORDER BY servicetype";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }

    function viewPerItem(){
        $sql = "select * from service where serviceID=:serviceID";
        $args = [':serviceID'=>$this->serviceID];
        return DB::run($sql,$args);
    }
    
    function updateItem(){
        $sql = "update service set itemname=:itemname, itemprice=:itemprice, itemdesc=:itemdesc, itemstock=:itemstock, servicetype=:servicetype where serviceID=:serviceID";
        $args = [':serviceID'=>$this->serviceID, ':itemname'=>$this->itemname, ':itemprice'=>$this->itemprice,':itemdesc'=>$this->itemdesc, ':itemstock'=>$this->itemstock, ':servicetype'=>$this->servicetype];
        return DB::run($sql,$args);
    }
}
?>
