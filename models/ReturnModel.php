<?php
include_once __DIR__."/../includes/db.php";
class Returnn{
    public function createReturn($lent_id,$lentDetail_id,$return_qty,$return_date)
    {
        $cont=Database::connect();
    
        $sql="insert into return_tb(lent_id,LentDetail_id,return_qty,return_date) values (:lent,:LentDetail_id,return_qty,return_date)";
        $statement=$cont->prepare($sql);
    
        $statement->bindParam(':lent',$lent_id);
        $statement->bindParam(':LentDetail_id',$lentDetail_id);
        $statement->bindParam(':return_qty',$return_qty);
        $statement->bindParam(':return_date',$return_date);
    
        //$statement->execute();
        if($statement->execute())
        return true;
        else
        return false;
    }
    public function changeDiscount($id,$discount){
        $cont = Database::connect();
        $sql = "update return_tb set discount=:discount where id=:id";
        $statement = $cont->prepare($sql);

        $statement->bindParam(':discount',$discount);
        $statement->bindParam(':id',$id);
        if($statement->execute())
            return true;
        else
            return false;
    }
    public function changeChecker($id){
        $cont=Database::connect();
        $sql = "update lent set checker = 1 where id=:id";
        $statement=$cont->prepare($sql);

        $statement->bindParam(':id',$id);
        if($statement->execute())
        return true;
        else 
        return false;
    }
}

?>