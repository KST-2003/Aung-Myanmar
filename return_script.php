<?php
include_once "includes/config.php";
include_once "controller/ReturnController.php";

//customer name
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    mysqli_select_db($con,"return_tb");
    $query = "SELECT customer.cus_name FROM customer JOIN lent ON customer.id=".$id;
    $result = mysqli_query($con,$query);
    $outcome = mysqli_fetch_row($result);
    echo $outcome[0];
}

//item name and option value in selectbox
if(!empty($_POST['lentdetail'])){
    $id = $_POST['lentdetail'];
    $query = "SELECT lent_detail.item_id as i,item.item_name FROM item inner join lent_detail on lent_detail.item_id=item.id 
    WHERE lent_detail.lent_id=".$id;
    $result = mysqli_query($con,$query);
    $option="<option>Choose Return Item</option>";
    while($outcome=mysqli_fetch_array($result,MYSQLI_ASSOC)):;
        $option.="<option value = ".$outcome['i'].">".$outcome['item_name']."</option>";
    endwhile;
    echo $option; 
}

//item_qty,unit price
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