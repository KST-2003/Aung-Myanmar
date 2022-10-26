<?php 
include_once __DIR__."/../models/cusmodel.php";
class CustomerController extends Customer{
    public function addCustomer($name,$nrc,$add,$ph,$work_add){
        $result= $this->createCustomer($name,$nrc,$add,$ph,$work_add);
        return $result;
    }
    public function getCustomer(){
        $customers=$this->retrieveCustomer();
        return $customers;
    }  
    public function deleteCustomer($id){
        $result=$this->delete($id);
        return $result;
    }
    public function addWork($work_add){
        $result = $this -> createWork($work_add);
        return $result;
    }
}
?>