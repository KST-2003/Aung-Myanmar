$('.item_delete').click(function(event){
    var status = confirm("Are you sure you want to delete?");
    event.preventDefault();
    if(status){
        console.log("hello")
        var id = $(this).parents('td').attr('itemid');
        var row =$(this).parents('tr');
        $.ajax({
            type: 'post',
            url: "item_delete.php",
            data:{itemid:id},
            success:function(response){
                alert(response);
                row.fadeOut('slow');
            }
        })
    }
    return false;    
})

$('.item_edit').focusout(function(){
    var id = this.id;
    var split_id = id.split('_');
    var field_name = split_id[0];
    var edit_id = split_id[1];
    var value = $(this).text();
    $.ajax({
        url: 'item_update.php',
        type: 'post',
        data : {field:field_name, value:value, id:edit_id},
        success:function(response){
            if(response == 1){
                console.log('updated successfully');
            }
            else
                console.log('Update failed');
        }
    })
})