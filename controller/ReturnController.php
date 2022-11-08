<?php
include_once __DIR__."/../models/ReturnModel.php";
class ReturnController extends Returnn{
    public function addReturn($lent_id,$lentDetail_id,$return_qty,$return_date)
    {
        $result = $this->createReturn($lent_id,$lentDetail_id,$return_qty,$return_date);
        return $result;
    }
    public function updateDiscount($id,$discount){
        $response = $this->changeDiscount($id,$discount);
        return $response;
    }
    public function updateChecker($id){
        $response = $this->changeChecker($id);
        return $response;
    }
}
?>