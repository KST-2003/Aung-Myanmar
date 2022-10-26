<?php 
include_once __DIR__."/../includes/db.php";
class Customer{

public function createCustomer($name,$nrc,$add,$ph,$work_add)
{
    $cont=Database::connect();

    $sql="insert into customer(name,NRC,address,phone_number) values(:name,:nrc,:add,:ph)";


    $statement=$cont->prepare($sql);

    $statement->bindParam(':name',$name);
    $statement->bindParam(':nrc',$nrc);
    $statement->bindParam(':add',$add);
    $statement->bindParam(':ph',$ph);
    


    if($statement->execute())
    return true;
    else
    return false;
}
 public function retrieveCustomer(){
   $cont=Database::connect();
     $sql="select * from customer";
    $statement=$cont->prepare($sql);

   $statement->execute();
    $results=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
public function delete($id){
  $cont=Database::connect();
  $sql="delete from customer where id=:id";
  $statement=$cont->prepare($sql);
  $statement->bindParam(':id',$id); 
  if($statement->execute())
  {
      return true;
  }
  else
  {
      return false;
  }
}
public function createWork($work_add){
  $cont=Database::connect();
  $sql="insert into workaddress(work_address) values(:work_add)";
  $statement=$cont->prepare($sql);
  $statement -> bindParam(':work_add',$work_add);
  $statement->execute();
}


    
} 


?>