<?php 
include_once __DIR__."/controller/lent_detail_controller.php";
$id=$_POST['cid'];
$lent_detail_controller = new Detail();
$outcomes=$lent_detail_controller->getDetail($id);
$data="";
$count=0;
if($outcomes){
    foreach($outcomes as $outcome){
        $count++;
        $data.="<tr>";
        $data.= "<td><div contentEditable='true' class='' id=''>".$count."</div></td>";
        $data.= "<td><div contentEditable='true' class='' id=''>".$outcome['item_name']."</div></td>";
        $data.= "<td><div contentEditable='true' class='' id=''>".$outcome['item_qty']."</div></td>";
        $data.= "<td><div contentEditable='true' class='' id=''>".$outcome['unit_price']."</div></td>";   
        $data.= "<td><div contentEditable='true' class='' id=''>".$outcome['emp_id']."</div></td>";   
        $data.="<td><a href='' class='btn btn-danger m-2'> Delete </a></td>";
        $data.="</tr>";
    }
    echo $data;
}
?>
<script>
    
</script>