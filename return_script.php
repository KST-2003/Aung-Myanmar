<?php
include_once "includes/config.php";
include_once "controller/ReturnController.php";
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    mysqli_select_db($con,"return_tb");
    $query = "SELECT customer.name FROM customer JOIN lent ON customer.id=".$id;
    $result = mysqli_query($con,$query);
    $outcome = mysqli_fetch_row($result);
    echo $outcome[0];
}
if(!empty($_POST['lentdetail'])){
    $id = $_POST['lentdetail'];
    $query = "SELECT lent_detail.id,lent_detail.item_name FROM lent_detail WHERE lent_detail.lent_id=".$id;
    $result = mysqli_query($con,$query);
    $option="<option>Choose Return Item</option>";
    while($outcome=mysqli_fetch_array($result,MYSQLI_ASSOC)):;
        $option.="<option value = ".$outcome['id'].">".$outcome['item_name']."</option>";
    endwhile;
    echo $option; 
}
if(!empty($_POST['ld_id'])){
    $ld_id=$_POST['ld_id'];
    $query = "Select lent_detail.item_qty, lent_detail.unit_price from lent_detail where lent_detail.id=".$ld_id;
    $result=mysqli_query($con,$query);
    while($outcome=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $qty=$outcome['item_qty'];
        $price=$outcome['unit_price'];
    }
    echo $qty."_".$price;
}
?>