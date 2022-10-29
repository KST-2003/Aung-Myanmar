<?php 
include_once __DIR__."/../includes/db.php";
class LentDetail{
    public function retrieveDetail($id){
        $cont=Database::connect();
        $sql="select * from lent_detail Where lent_id=:id";
       $statement=$cont->prepare($sql);
       $statement->bindParam(':id',$id); 
   
       $statement->execute();
       $result=$statement->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}
?>