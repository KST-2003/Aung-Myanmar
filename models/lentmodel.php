<?php 
include_once __DIR__."/../includes/db.php";

class Lent{
    public function createLent($inv_number,$lent_date,$cus_name,$deposit,$total_qty)
    {
        $cont=Database::connect();
    
        $sql="insert into lent(invoice_number,customer_id,lent_date,total_qty,deposit) values(:invoice_number,:customer_id,:lent_date,:total_qty,:deposit)";
        $statement=$cont->prepare($sql);
    
        $statement->bindParam(':invoice_number',$inv_number);
        $statement->bindParam(':customer_id',$cus_name);
        $statement->bindParam(':lent_date',$lent_date);
        $statement->bindParam(':deposit',$deposit);
        $statement->bindParam(':total_qty',$total_qty);
    
    
        if($statement->execute())
        return true;
        else
        return false;
    }
}


?>