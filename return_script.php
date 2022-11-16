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
    $query = "SELECT item.item_name,lent_detail.* FROM item inner join lent_detail on lent_detail.item_id=item.id 
    WHERE lent_detail.give_back=0 and lent_detail.lent_id=".$id;
    $result = mysqli_query($con,$query);
    $option="<option>Choose Return Item</option>";
    while($outcome=mysqli_fetch_array($result,MYSQLI_ASSOC)):;
        $option.="<option value = ".$outcome['id'].">".$outcome['item_name']."</option>";
    endwhile;
    echo $option; 
}

//item_qty,unit price
if(!empty($_POST['ld_id']) && !empty($_POST['l_id'])){
    $ld_id=$_POST['ld_id'];
    $sent_id=$_POST['l_id'];
    $explode_id=explode('_',$sent_id);
    $lent_id=$explode_id[1];
    $query= "Select count(lent_id) from return_detail where return_detail.lent_id=".$lent_id;
    $query_execute=mysqli_query($con,$query);
    while($outcome=mysqli_fetch_array($query_execute)){
        $check=$outcome['count(lent_id)'];
        if($check == 0){
            $query2 = "SELECT item.item_name,lent_detail.* FROM item INNER JOIN lent_detail on 
            lent_detail.item_id=item.id WHERE lent_detail.id=".$ld_id;
            $result=mysqli_query($con,$query2);
            while($outcome2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $qty=$outcome2['item_qty'];
                $price=$outcome2['unit_price'];
            }

        }
        else{
            $query2="Select lent_detail.*,return_detail.*,sum(return_qty) from lent_detail inner join return_detail on
            lent_detail.id=return_detail.LentDetail_id where return_detail.LentDetail_id=".$ld_id;
            $result=mysqli_query($con,$query2);
            while($outcome2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $lent_qty= $outcome2['item_qty'];
                $return_qty=intval($outcome2['sum(return_qty)']);
                $qty=$lent_qty-$return_qty;
                $price=$outcome2['unit_price'];
            }
        }
        echo $qty."_".$price;
    }
}
?>