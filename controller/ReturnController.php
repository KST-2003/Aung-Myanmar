<?php
include_once __DIR__."/../models/Return.php";
class ReturnController extends Returnn{
    public function addReturn($lent_Id,$lentDetail_id,$return_qty,$return_date)
    {
        $result = $this->createReturn($lent_Id,$lentDetail_id,$return_qty,$return_date);
        return $result;
    }
}
?>