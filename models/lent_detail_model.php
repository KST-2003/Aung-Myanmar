<?php 
include_once __DIR__."/../includes/db.php";
class LentDetail{
    public function retrieveDetail($id){
        $cont=Database::connect();
        $sql="select employee.name,lent_detail.* from employee join lent_detail on employee.id = lent_detail.emp_id WHERE lent_id=:id";
       $statement=$cont->prepare($sql);
       $statement->bindParam(':id',$id); 
   
       $statement->execute();
       $result=$statement->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}
?>