$('#inv_no').change(function(){
    $.ajax({
        type:'Post',
        url: "deposit_script.php",
        data:{id:$('#inv_no').val()},
        success: function(response){
            $('#deposit').val(response);
        }
    })
})