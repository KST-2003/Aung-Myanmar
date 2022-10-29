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
        $data.= "<td><div  class='' id=''>".$count."</div></td>";
        $data.= "<td><div contentEditable='true' class='detail_edit' id='item_name_".$outcome['id']."'>".$outcome['item_name']."</div></td>";
        $data.= "<td><div contentEditable='true' class='detail_edit' id='item_qty_".$outcome['id']."'>".$outcome['item_qty']."</div></td>";
        $data.= "<td><div contentEditable='true' class='detail_edit' id='unit_price_".$outcome['id']."'>".$outcome['unit_price']."</div></td>";   
        $data.= "<td><div  class='' id=''>".$outcome['name']."</div></td>";   
        $data.="</tr>";
    }
    echo $data;
}
?>
<script>
     $(".detail_edit").focusout(function(){
        $(this).removeClass("editMode");
 
        var id = this.id;
        var id1= this.id;
        var split_id = id.split("_");
        var split_id1=id1.split("_");
        
        if(split_id.length==2)
        {
            var field_name = split_id[0];
            var edit_id = split_id[1];
            console.log(field_name);

            var value = $(this).text();
        
            $.ajax({
                url: 'lent_detail_update.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    if(response == 1){ 
                        console.log('Save successfully'); 
                        
                    }else{ 
                        console.log(response); 
                        
                    }             
                }
            });
        }
        else{
            
            var remove_last=split_id.pop();
         //   console.log(remove_last); // 3
         //   console.log(split);  // item name
            var one =split_id[0];
            var two = split_id[1];
            var field_name = one.concat('_',two);
            var edit_id = split_id1[2];
            console.log(field_name);
            console.log(edit_id);
            
            var value = $(this).text();
        
            $.ajax({
                url: 'lent_detail_update.php',
                type: 'post',
                data: { field:field_name, value:value, id:edit_id },
                success:function(response){
                    if(response == 1){ 
                        console.log('Save successfully'); 
                        
                    }else{ 
                        console.log(response); 
                        
                    }             
                }
            });
        }        
    });

</script>

   